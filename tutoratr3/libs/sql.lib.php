<?php

/**
 * Project: Tutoratr3
 * Author: Benji Orozco <benoror@gmail.com>
 * Date: November 29th, 2007
 * Version: 0.6
 */
 
// define the query types
define('SQL_NONE', 1);
define('SQL_ALL', 2);
define('SQL_INIT', 3);

// define the query formats
define('SQL_ASSOC', MYSQL_ASSOC);
define('SQL_INDEX', MYSQL_NUM);

class SQL {
    
    var $db = null;
    var $result = null;
    var $error = null;
    var $record = null;
    
    /**
     * class constructor
     */
    function SQL() { }
    
    /**
     * connect to the database
     *
     * @param string $dbhost $dbuser $dbpass $dbname
     */
    function connect($dbhost, $dbuser, $dbpass, $dbname) {
    
        $succesful = true;
    
    	$this->db = mysql_connect($dbhost, $dbuser, $dbpass) || $succesful = false;
    	mysql_select_db($dbname) || $succesful = false;

        return $succesful;
    }
    
    /**
     * disconnect from the database
     */
    function disconnect() {
        mysql_close($this->db);
    }
    
    /**
     * query the database
     *
     * @param string $query the SQL query
     * @param string $type the type of query
     * @param string $format the query format
     */
    function query($query, $type = SQL_NONE, $format = SQL_INDEX) {

        $this->record = array();
        $_data = array();
        
        $this->result = mysql_query($query);
        
        switch ($type) {
            case SQL_ALL:
                // get all the records
                while($_row = mysql_fetch_array($this->result, $format)) {
                    $_data[] = $_row;   
                }
                mysql_free_result($this->result);            
                $this->record = $_data;
                break;
            case SQL_INIT:
                // get the first record
                $this->record = mysql_fetch_array($this->result, $format);
                break;
            case SQL_NONE:
            default:
                // records will be looped over with next()
                break;   
        }
        return true;
    }
    
}
    
