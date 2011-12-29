<?php

mysql_connect('localhost:8889', 'root', 'root') or die  ('Error connecting to mysql');
mysql_select_db('tutoratr_t2');

if(isset($_REQUEST['si'])) {
	if(empty($_POST['classes'][0]) || empty($_POST['comment']) || empty($_POST['rates'][0]) )
		echo '<br />Faltan datos. <a href="javascript: history.go(-1)">Regresar</a>.';
	else {
		if(mysql_query("UPDATE tutoratr_t2.`ratings`
						SET `total_votes` = `total_votes`+1, `total_value` = `total_value`+".$_POST['rates'][0]."
						WHERE tutoratr_t2.`ratings`.`id` = ".$_REQUEST['si']." LIMIT 1;"))
			echo '<br/>Calificación y';
			
		$sender = empty($_POST['sender'])?'NA':$_POST['sender'];
		$fb_sig_user = '0';
		if(isset($_COOKIE['fb_sig_user']))
			$fb_sig_user = $_COOKIE['fb_sig_user'];
		if(mysql_query("INSERT INTO tutoratr_t2.`comments` ( `id` , `id_tutor` , `id_class` , `rating` , `comment` , `sender` , `ip` , `date` , `fb_sig_user` ) VALUES ( NULL , '".strip_tags($_REQUEST['si'])."', '".strip_tags($_POST['classes'][0])."', '".strip_tags($_POST['rates'][0])."', '".strip_tags($_POST['comment'])."', '".strip_tags($sender)."', '".strip_tags($ip)."', NOW( ), ".$fb_sig_user.");"))
			echo ' comentario enviados con éxito. <a href="index.php">Regresar</a><br/>';
		
	}
}

?>
