<?php

require_once 'facebook.php';

$appapikey = '4ba14807f76b6a844c0ad9c430ea1328';
$appsecret = 'f40a7e04fdbf6ed6a3fdd5a49816b9b3';
$facebook = new Facebook($appapikey, $appsecret);

mysql_connect('localhost:8889', 'root', 'root') or die  ('Error connecting to mysql');
mysql_select_db('tutoratr_t2');

$count = mysql_fetch_array(mysql_query("SELECT count(fb_sig_user) FROM fb_users;"));

echo '<h1>'.$count[0].' Usuarios:</h1>'

?>

<table>
<?php

$user_list = mysql_query("SELECT fb_sig_user FROM fb_users;");

while($item = mysql_fetch_array($user_list)) {
	echo '<tr>';
	echo '<td><fb:profile-pic uid="'.$item[0].'" size="square" linked="true" /></td>';
	echo '<td><fb:name uid="'.$item[0].'" linked="true" shownetwork="true" /></td>';
	echo '</tr>';
}
?>
</table>
