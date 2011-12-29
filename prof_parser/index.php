<?php
header('Content-type: text/html; charset=utf-8');

$dir = opendir("htmls/a/");

$i = 0;

echo "<small><table border=1><tr>";

while (($archivo = readdir($dir)) !== false) {
	$i++;
	
	echo "<td>";
	echo '<a href="prof_parser.php?html='.$archivo.'">'.$archivo.'</a>';
	echo "</td>";
	if($i%4==0) echo "</tr><tr>";
}

echo "</tr></table></small><h1>$i</h1>";

?>
