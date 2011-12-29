<?php

require('_config-rating.php');

echo '<p align="center"><b>Ultimos profesores</b></p><br />';
$last = mysql_query('SELECT id,name FROM tutoratr_t2.`tutors` ORDER BY id DESC LIMIT 10');
while($i=mysql_fetch_array($last)) {
	echo '<a onclick="openAjax(\'profile.php?t=p&id='.$i[0].'\',\'search_text=\'+document.search_form.search_text.value)" href="#">'.$i[1].'</a><br />';
}

echo '<br /><p align="center"><b>Ultimas materias</b></p><br />';
$last = mysql_query('SELECT id,name FROM tutoratr_t2.`classes` ORDER BY id DESC LIMIT 5');
while($i=mysql_fetch_array($last)) {
	echo '<a onclick="openAjax(\'profile.php?t=m&id='.$i[0].'\',\'search_text=\'+document.search_form.search_text.value)" href="#">'.$i[1].'</a><br />';
}

?>

<br />
