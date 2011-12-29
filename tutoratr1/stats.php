<?php include('header.php') ?>

<?php
if(!empty($_GET['tutor'])) {
	$title = $_GET['tutor'];
	$field = "tutor";
} else if(!empty($_GET['class'])) {
	$title = $_GET['class'];
	$field = "class";
}
?>

<span class="title">Estadísticas para:</span>
<p class="comm_tut"><?php echo $title ?></a></p><br>
<br><br>
<div class="comments">

<?php

$result = mysql_query("SELECT ROUND(AVG(rating),1) FROM `itesm-mty` WHERE `".$field."` = '".$title."'");

while ($row = mysql_fetch_array($result)) {
	echo "<p>Calificación Promedio: ";
	$red = (10 - $row[0]) * 10;
	$gre = $row[0] * 8;
	echo "<b><span style=\"color: rgb(".$red."%,".$gre."%,0%)\">";
	echo $row[0]."</b></p>";

echo "<table><tr>";

	if($field!="class") {
	echo "<td valign=top>";
	echo "<p>Clases:<br>";
	$clss = mysql_query("SELECT DISTINCT class FROM `itesm-mty` WHERE `tutor`= '".$title."' ORDER by class");
	while($clss_r = mysql_fetch_array($clss)) {
		echo "<a href=\"stats.php?class=".$clss_r['class']."\">".$clss_r['class']."</a><br>";
	}
	echo "</td>";
	}

	if($field!="tutor") {
	echo "<td valign=top>";
	echo "<p>Tutores:<br>";
	$clss = mysql_query("SELECT DISTINCT tutor FROM `itesm-mty` WHERE `class`= '".$title."' ORDER by tutor");
	while($clss_r = mysql_fetch_array($clss)) {
		echo "<a href=\"stats.php?tutor=".$clss_r['tutor']."\">".$clss_r['tutor']."</a><br>";
	}
	echo "</td>";
	}

echo "</tr></table>";

}

?>

</div>

<?php include('footer.php') ?>
