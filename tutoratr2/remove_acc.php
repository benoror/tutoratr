<?php

require('_config-rating.php');

function replace_accents($str) {
  $str = htmlentities($str, ENT_COMPAT, "UTF-8");
  $str = preg_replace(
'/&([a-zA-Z])(uml|acute|grave|circ|tilde);/',
'$1',$str);
  return html_entity_decode($str);
}

$tutors = mysql_query('SELECT id,name FROM tutoratr_t2.`tutors`');
while($i=mysql_fetch_array($tutors)) {
	mysql_query("UPDATE tutoratr_t2.`tutors` SET name='".replace_accents($i['name'])."' WHERE id='".$i['id']."'");
}

$classes = mysql_query('SELECT id,name FROM tutoratr_t2.`classes`');
while($j=mysql_fetch_array($classes)) {
	mysql_query("UPDATE tutoratr_t2.`classes` SET name='".replace_accents($j['name'])."' WHERE id='".$j['id']."'");
}

echo "Acentos removidos!";

?>
