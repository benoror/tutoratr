<?php
include("db.php");

    
    $i = 0;
    while($row = mysql_fetch_array($result)) {
        $aCountries[$i]=$row['class'];
        $i++;
    }