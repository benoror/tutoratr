<?php

/**
 * Project: Tutoratr3
 * Author: Benji Orozco <benoror@gmail.com>
 * Date: November 29th, 2007
 * Version: 0.6
 */
 
require('sql.lib.php');
require('tutoratr.lib.php');
require('Smarty/Smarty.class.php');

// database configuration
class Tutoratr_SQL extends SQL {
    function Tutoratr_SQL() {
    	$dbhost = 'localhost:8889';
    	$dbuser = 'root';
    	$dbpass = 'root';
    	$dbname = 'tutoratr_t2';
    	$this->connect($dbhost, $dbuser, $dbpass, $dbname) || die('could not connect to database');
    }       
}

// smarty configuration
class Tutoratr_Smarty extends Smarty { 
    function Tutoratr_Smarty() {
        $this->template_dir = 'templates';
        $this->compile_dir = 'templates_c';
        $this->config_dir = 'configs';
        $this->cache_dir = 'cache';
    }
}
      
?>
