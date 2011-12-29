<?php

mysql_connect('localhost', 'root', 'g8ag8g') or die  ('Error connecting to mysql');

$result = mysql_query("SELECT c.name AS c_name,t.name AS t_name,r.* FROM tutoratr3.comments r JOIN tutoratr3.classes c ON r.id_class = c.id JOIN tutoratr3.tutors t ON r.id_tutor = t.id");

$count = 1;
$total = mysql_num_rows($result);

while($C = mysql_fetch_array($result)) {
	
	echo "\n$count/$total\n";
	
	//New Class
	echo $C['c_name'].": ";
	$NEW_C = fgets(fopen('php://stdin','r'));
	
	//New Tutor
	echo $C['t_name'].": ";
	$NEW_T = fgets(fopen('php://stdin','r'));

	//Match Imparte
	if($IM = mysql_fetch_array(mysql_query("SELECT id FROM tutoratr4.imparte
					WHERE tutor_id = $NEW_T
					AND class_id = $NEW_C"))) {

	mysql_query("INSERT INTO tutoratr4.ratings (imparte_id, rating, comment, sender, ip, date, fb_user) VALUES (".$IM['id'].",".$C['rating'].",".$C['comment'].",".$C['sender'].",".$C['ip'].",".$C['date'].",".$C['fb_sig_user'].")");
	}
	
	$count++;
	
}

?>
