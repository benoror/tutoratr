<?php

mysql_connect('localhost', 'root', 'g8ag8g') or die  ('Error connecting to mysql');

$result = mysql_query("SELECT * FROM tutoratr3.classes");
$i = 1;
while($CLASS = mysql_fetch_array($result)) {
	echo "\n[".$i."/1166] ".$CLASS['name']."\n";
	
	$q2 = "SELECT * FROM tutoratr4.classes WHERE";
	foreach(explode(' ',htmlentities($CLASS['name'])) as $w) {
		if(strlen($w)>2)
			$q2 .= " name LIKE '%".$w."%' OR";
	}
	$q2 = substr($q2,0,strlen($q2)-3)." ORDER BY name";
	
	$result2 = mysql_query($q2);
	while($CLASS_2 = mysql_fetch_array($result2)) {
		echo "\n\t[".$CLASS_2['id']."][".$CLASS_2['name']."]";
	}
	
	echo "\n\n\t\tINSERTAR(i),ACTUALIZAR([id]): ";
	$action = fgets(fopen('php://stdin','r'));
	
	if($action == 'i') {
		echo "INSERTA\n";
	}
	
	$i++;
}

?>
