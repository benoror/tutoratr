<?php
include("db.php");

    
    $i = 0;
    while($row = mysql_fetch_array($result)) {
        $aCountries[$i]=$row['class'];
        $i++;
    }
    $result = mysql_query("SELECT DISTINCT tutor FROM `itesm-mty_tutors` ORDER BY tutor");

    while($row = mysql_fetch_array($result)) {
        $aCountries[$i]=$row['tutor'];
        $i++;
    }