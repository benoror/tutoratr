<?php

/**
 * Project: Tutoratr3
 * Author: Benji Orozco <benoror@gmail.com>
 * Date: November 29th, 2007
 * Version: 0.6
 */

class Tutoratr {

    var $sql = null;
    var $tpl = null;
    var $error = null;
    
    function Tutoratr() {

        $this->sql =& new Tutoratr_SQL;
        $this->tpl =& new Tutoratr_Smarty;

    }
    
    /********************
     * INDEX
     *******************/
    function displayIndex() {

        $this->tpl->display('index.tpl');        

    } 
    
    /********************
     * RECENT
     *******************/
    function getRecentEntries($start) {

        $this->sql->query("
                    SELECT comments.id, id_tutor, tutors.name as tutor_name, id_class,
                    classes.name as class_name, rating, comment, sender, date
                FROM comments, tutors, classes
                WHERE comments.id_tutor = tutors.id
                AND comments.id_class = classes.id
                ORDER BY date DESC LIMIT $start,10
                ", SQL_ALL, SQL_ASSOC);

        return $this->sql->record;   
    }
    
    function displayRecent($recent = array()) {

        $this->tpl->assign('recent', $recent);
        $this->tpl->display('recent.tpl');        

    }
    
    function getRecentTutors() {
    
        $this->sql->query("
        		SELECT id,name 
        		FROM tutors 
        		ORDER BY id DESC
        		LIMIT 10", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }

    function getRecentClasses() {
    
        $this->sql->query("
        		SELECT id,name 
        		FROM classes 
        		ORDER BY id DESC
        		LIMIT 10", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function displayRecentLeft($tutors = array(), $classes = array()) {

        $this->tpl->assign('tutors', $tutors);
        $this->tpl->assign('classes', $classes);
        $this->tpl->display('recent_left.tpl');        

    }
    
    /********************
     * TUTOR
     *******************/
    function getTutor($id) {
    
        $this->sql->query("
                SELECT name,pic
                FROM tutors
                WHERE id=$id
                LIMIT 1
                ", SQL_INIT, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function getTutorComments($id) {
    
        $this->sql->query("
                SELECT id_class, classes.name as class_name,
                	rating, comment, sender, date
                FROM comments, classes
                WHERE comments.id_tutor = $id
                AND comments.id_class = classes.id
                ORDER BY date DESC
                ", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function displayTutor($tutor = array(), $comments = array()) {

        $this->tpl->assign('tutor', $tutor);
        $this->tpl->assign('comments', $comments);
        $this->tpl->display('tutor.tpl');        

    }
    
    function getTutorLeft($id) {
    
        $this->sql->query("
                SELECT id
                FROM tutors
                WHERE id=$id
                LIMIT 1
                ", SQL_INIT, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function getTutorAverage($id) {
    
        $this->sql->query("
                SELECT round(avg(rating),1) AS average
                FROM comments
                WHERE id_tutor=$id
                ", SQL_INIT, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function getTutorClassesLeft($id) {
    
    	$this->sql->query("
    			SELECT DISTINCT id_class, name
    			FROM comments, classes
				WHERE classes.id=id_class
				AND id_tutor=$id
                ", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function displayTutorLeft($tutor = array(), $classes = array(), $average = array()) {

        $this->tpl->assign('tutor', $tutor);
        $this->tpl->assign('classes', $classes);
        $this->tpl->assign('average', $average);
        $this->tpl->display('tutor_left.tpl');        

    }

    /********************
     * CLASS
     *******************/
    function getClass($id) {
    
        $this->sql->query("
                SELECT name
                FROM classes
                WHERE id=$id
                LIMIT 1
                ", SQL_INIT, SQL_ASSOC);
        return $this->sql->record;
    }

    function getClassTutors($id) {
    
        $this->sql->query("
				SELECT name, id_tutor, round(total_value/total_votes,1) AS average
				FROM tutors, comments, ratings
				WHERE id_class=$id
				AND ratings.id=id_tutor
				AND tutors.id=id_tutor
				GROUP BY id_tutor
				ORDER BY average DESC
				", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function displayClass($class = array(), $tutors = array()) {
    	$this->tpl->assign('class', $class);
    	$this->tpl->assign('tutors', $tutors);
        $this->tpl->display('class.tpl');    
    }
    
    function displayClassLeft() {
        $this->tpl->display('class_left.tpl');    
    }
    
    /********************
     * SUGGEST
     *******************/
    function getSuggestTutors($text) {
    
        $this->sql->query("
        		SELECT id,name 
        		FROM tutors 
        		WHERE name LIKE '%$text%'", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function getSuggestClasses($text) {
    
        $this->sql->query("
        		SELECT id,name 
        		FROM classes 
        		WHERE name LIKE '%$text%'", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function displaySuggest($suggestTutors = array(), $suggestClasses = array()) {

        $this->tpl->assign('suggestTutors', $suggestTutors);
        $this->tpl->assign('suggestClasses', $suggestClasses);
        $this->tpl->display('suggest.tpl');        

    }
    
    function displaySearch($tutors = array(), $classes = array()) {

        $this->tpl->assign('tutors', $tutors);
        $this->tpl->assign('classes', $classes);
        $this->tpl->display('search.tpl');        

    }
    
    /********************
     * TOP 10
     *******************/    
     
     function getTop10() {
    
        $this->sql->query("
        		SELECT ratings.id, total_votes, round((total_value/total_votes),1) AS rating, name, pic
				FROM ratings, tutors 
				WHERE ratings.id=tutors.id
				ORDER BY rating DESC, total_votes DESC
				LIMIT 10
				", SQL_ALL, SQL_ASSOC);
        return $this->sql->record;
    }
    
    function displayTop10($tutors = array()) {

        $this->tpl->assign('tutors', $tutors);
        $this->tpl->display('top10.tpl');        

    }

    function fetchTop10_fbprofile($tutors = array()) {

        $this->tpl->assign('tutors', $tutors);
        return $this->tpl->fetch('top10.tpl');        

    }
    
    /********************
     * RSS
     *******************/  
    
    function displayRSS($rss = array()) {

        $this->tpl->assign('rss', $rss);
        $this->tpl->display('rss.tpl');        

    }
    
}
