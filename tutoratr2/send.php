<div style="background: url(images/send.png) no-repeat;" class="title_sec">
Califica
</div>

<?php

require('_config-rating.php');

$ip = $_SERVER['REMOTE_ADDR'];
$voted=mysql_num_rows(mysql_query("SELECT used_ips FROM $rating_dbname.$rating_tableName WHERE used_ips LIKE '%".$ip."%' AND id='".$_GET['id']."' ")); 

if(!empty($_GET['id'])) {
	$name = mysql_fetch_array(mysql_query('SELECT name FROM tutoratr_t2.`tutors` WHERE id='.$_GET['id'].' LIMIT 1'));
	echo '<br /><h1>Profesor: '.$name[0].'</h1>';
	echo '<form method="POST" action="index.php?s=c&si='.$_GET['id'].'" name="send_form">';
	echo '<br /><h1>Clase:</h1> ';
	echo '<select name="classes[]" style="width: 100%;">';
		echo '<option value =""></option>';
	$query = mysql_query('SELECT id,name FROM tutoratr_t2.`classes`');
	while ($classes = mysql_fetch_array($query))
		echo '<option value ="'.$classes[0].'">'.$classes[1].'</option>';
	echo '</select>';
	echo '<br /><br /><h1>Comentario:</h1><textarea cols="50" rows="10" name="comment" STYLE="width: 98%"></textarea>';
	
	echo '<br /><br /><h1>Calificación:</h1>';
	/*echo rating_bar($_GET['id'],'10');*/
	echo '<select name="rates[]" style="font-size: 14px; width: 100%;">';
	echo '<option value=""></option>';
	for ($i=1;$i<=10;$i++)
		echo '<option value="'.$i.'">'.$i.'</option>';
	echo '</select>';
	
	echo '<br /><br /><h1>Tu nombre (opcional): </h1><input type="text" class="inputtext" value="" name="sender" style="width: 98%; />';
	
	echo '<p style="text-align: center"><input style="cursor: pointer; margin-top: 16px;" type="submit" class="inputbutton" value="Calificar"/></p>';
	echo '</form>';
} else if(!empty($_GET['si'])) {
	if(empty($_POST['classes'][0]) || empty($_POST['comment']) || empty($_POST['rates'][0]) )
		echo '<br />Faltan datos. <a href="javascript: history.go(-1)">Regresar</a>.';
	else {
		if(mysql_query("UPDATE tutoratr_t2.`ratings`
						SET `total_votes` = `total_votes`+1, `total_value` = `total_value`+".$_POST['rates'][0]."
						WHERE tutoratr_t2.`ratings`.`id` = ".$_GET['si']." LIMIT 1;"))
			echo '<br/>Calificación y';
			
		$sender = empty($_POST['sender'])?'NA':$_POST['sender'];
		if(mysql_query("INSERT INTO tutoratr_t2.`comments` ( `id` , `id_tutor` , `id_class` , `rating` , `comment` , `sender` , `ip` , `date` ) VALUES ( NULL , '".strip_tags($_GET['si'])."', '".strip_tags($_POST['classes'][0])."', '".strip_tags($_POST['rates'][0])."', '".strip_tags($_POST['comment'])."', '".strip_tags($sender)."', '".strip_tags($ip)."', NOW( ));"))
			echo ' comentario enviados con éxito. <a href="index.php?s=p&t=p&id='.$_GET['si'].'">Regresar al perfil del profesor</a><br/>';
		
	}
}

?>
