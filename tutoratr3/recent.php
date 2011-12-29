<?php

/**
 * Project: Tutoratr3
 * Author: Benji Orozco <benoror@gmail.com>
 * Date: November 29th, 2007
 * Version: 0.6
 */
 
// include the setup script
include('libs/setup.php');

// create tutoratr object
$tutoratr =& new Tutoratr;

if(!isset($_REQUEST['pag']) or intval($_REQUEST['pag'])<0) {
	$start = 0;
	$_REQUEST['pag'] = 0;
} else
	$start = $_REQUEST['pag'];

$tutoratr->displayRecent($tutoratr->getRecentEntries($start));

?>
