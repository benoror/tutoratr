<?php

require_once 'fblib/client/facebook.php';

$appapikey = '1056320db2d5a335a0d72c282404a433';
$appsecret = '887e8d9c60a9a393b7e10293310f81da';
$facebook = new Facebook($appapikey, $appsecret);
$user_id = $facebook->require_login();

?>

<fb:tabs>
	<fb:tab-item href='http://apps.facebook.com/tutoratrfbml/recent.php' title='Nuevos' selected='true'/>
	<fb:tab-item href='http://apps.facebook.com/tutoratrfbml/add.php' title='Agregar' />
	<fb:tab-item href='http://apps.facebook.com/tutoratrfbml/top10.php' title='Top10' />
	<fb:tab-item href='http://apps.facebook.com/tutoratrfbml/forum.php' title='Foro' />
	<fb:tab-item href='http://apps.facebook.com/tutoratrfbml/help.php' title='Ayuda' />
</fb:tabs>

<fb:header icon="false">Nuevos</fb:header>

<fb:explanation>
	<fb:message>
	Nombre del Tutor
	</fb:message>
	<h2>Nombre de la Materia</h2>
	<h3>Fecha, etc</h3>
	<hr>
	<h4>Comentario</h4>
</fb:explanation>
