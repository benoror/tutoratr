<div style="background: url(images/send.png) no-repeat;" class="title_sec">
Califica

</div>

<form method="POST" action="send_comment_db.php?si=<?=$_REQUEST['id']?>" name="send_form">

<?php

mysql_connect('localhost:8889', 'root', 'root') or die  ('Error connecting to mysql');
mysql_select_db('tutoratr_t2');

$ip = $_SERVER['REMOTE_ADDR'];

if(isset($_REQUEST['id'])) {
	$name = mysql_fetch_array(mysql_query('SELECT name FROM tutoratr_t2.`tutors` WHERE id='.$_REQUEST['id'].' LIMIT 1'));
	echo '<br /><h1>Profesor: '.$name[0].'</h1>';
	echo '<br /><h1>Clase:</h1> ';
	echo '<select name="classes[]" style="width: 100%;">';
		echo '<option value =""></option>';
	$query = mysql_query('SELECT id,name FROM tutoratr_t2.`classes`');
	while ($classes = mysql_fetch_array($query))
		echo '<option value ="'.$classes[0].'">'.$classes[1].'</option>';
	echo '</select>';
	echo '<br /><br /><h1>Comentario:</h1><textarea cols="50" rows="10" name="comment" STYLE="width: 98%"></textarea>';
	
	echo '<br /><br /><h1>Calificación:</h1>';
	echo '<select name="rates[]" style="font-size: 14px; width: 100%;">';
	echo '<option value=""></option>';
	for ($i=1;$i<=10;$i++)
		echo '<option value="'.$i.'">'.$i.'</option>';
	echo '</select>';
	
	echo '<br /><br /><h1>Tu nombre (opcional): </h1><input type="text" class="inputtext" value="" name="sender" style="width: 98%; />';
	
	echo '<p style="text-align: center"><input style="cursor: pointer; margin-top: 16px;" type="submit" class="inputbutton" value="Calificar"/></p>';
}

?>

</form>
