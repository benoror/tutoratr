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

$id = $_REQUEST['tutor_id'];

$tutoratr->displayTutorLeft($tutoratr->getTutorLeft($id),
							$tutoratr->getTutorClassesLeft($id),
							$tutoratr->getTutorAverage($id));

?>
