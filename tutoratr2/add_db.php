<?php

require('_config-rating.php');

if(isset($_GET['a']) and isset($_GET['t']))
	switch ($_GET['a']) {
	case 't':
		if(mysql_query("INSERT INTO tutoratr_t2.`tutors` ( `name` ) VALUES ( '".$_GET['t']."' )"))
			echo 'Profesor <strong>'.$_GET['t'].'</strong> agregado.'; break;
	case 'c':
		if(mysql_query("INSERT INTO tutoratr_t2.`classes` ( `name` ) VALUES ( '".$_GET['t']."' )"))
			echo 'Clase <strong>'.$_GET['t'].'</strong> agergada.'; break;
	default:
		break;
	}
?>
