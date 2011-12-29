<?php

include('header.php');

if(!empty($_POST['cm_comm'])) {
	if(empty($_POST['cm_name']))
		$_POST['cm_name']=$_SERVER['REMOTE_ADDR'];
	if(!mysql_query("INSERT INTO `comments` ( `sender` , `comm` , `ip` , `date` ) VALUES ( '".$_POST['cm_name']."', '".$_POST['cm_comm']."', '".$_SERVER['REMOTE_ADDR']."', '".date("c")."' )"))
		echo '<h1>Error</h2>';
}

print_r('
	<form method="POST" action="comm.php">
	Nombre (opcional): <input type="text" size="25" name="cm_name" value="mengano" ><br />
	Comentario: <textarea cols="50" rows="3" name="cm_comm" STYLE="width: 100%"></textarea><br />
	<input type="Submit" value="Enviar">
	</form>
');

$query = mysql_query("SELECT * FROM `comments` ORDER BY date DESC LIMIT 10");
while ($row = mysql_fetch_array($query)) {
	echo '<h3>'.$row['sender'].':</h3>';
	echo '<p>'.$row['comm'].'</p>';
	echo '<hr>';
}

include('footer.php');

?>
