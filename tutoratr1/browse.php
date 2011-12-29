<?php
include('header.php');
include("single_comment.php");
?>

<span class="title">Buscar</span>
<br><br>
<div class="comments">

<?php
	echo '<form method="POST" action="browse.php" name="bformu">';
	echo "<td><select name=\"bbb_tut[]\">";
	$query = mysql_query("SELECT tutor FROM `itesm-mty_tutors` ORDER BY tutor");
	while ($row = mysql_fetch_array($query)) {
		echo '<option value ="'.$row['tutor'].'">'.$row['tutor'].'</option>';
	}
	echo "</select></td>";

	echo "<td><br /><select name=\"bbb_cla[]\">";
	$query = mysql_query("SELECT class FROM `itesm-mty_classes` ORDER BY class");
	while ($row = mysql_fetch_array($query)) {
		echo '<option value ="'.$row['class'].'">'.$row['class'].'</option>';
	}
	echo "</select></td>";
	echo '<br /><input type="Submit" name="enviar" value="Buscar">';
	
	echo '</form>';
?>

<br>
<?php
if ($_POST['enviar']) {

	if(empty($_POST['bbb_tut'][0]) && empty($_POST['bbb_cla'][0]) ) {
		echo "<span class=\"warning\">Usa tu cabeza.</span>";
	} else {
	    if(empty($_POST['bbb_tut'][0]) || empty($_POST['bbb_cla'][0]) ) {
	        echo "<script>document.bformu.tutor.value='".$_POST['bbb_tut'][0]."';</script>";
	        echo "<script>document.bformu.class.value='".$_POST['bbb_cla'][0]."';</script>";
		    printComments("SELECT * FROM `itesm-mty` WHERE `tutor` = '".$_POST['bbb_tut'][0]."' OR `class` = '".$_POST['bbb_cla'][0]."' ORDER BY rating DESC",NULL);
		} else {
		    printComments("SELECT * FROM `itesm-mty` WHERE `tutor` = '".$_POST['bbb_tut'][0]."' AND `class` = '".$_POST['bbb_cla'][0]."' ORDER BY rating DESC",NULL);
		}
	}
} else if ($_POST['term']) {
	
	echo "<span class=\"warning\">Resultados para <FONT style=\"BACKGROUND-COLOR: yellow\">".$_POST['term']."</FONT></span><br><br>";

	printComments("SELECT * FROM `itesm-mty` WHERE `tutor` LIKE '%".$_POST['term']."%' OR `class` LIKE '%".$_POST['term']."%' OR `comment` LIKE '%".$_POST['term']."%' ORDER BY rating DESC",$_POST['term']);
} else if ($_GET['id']) {
    printComments("SELECT * FROM `itesm-mty` WHERE `id` = ".$_GET['id'],NULL);
}
?>
</div>

<script type="text/javascript" src="js/bsn.Ajax.js"></script><script type="text/javascript" src="js/bsn.DOM.js"></script><script type="text/javascript" src="js/bsn.AutoSuggest.js"></script>
<script type="text/javascript">	var options1 = {		script:"xml_tutors.php?",		varname:"input",		minchars:1	};	var as1 = new AutoSuggest('testinput1', options1);			var options2 = {		script:"xml_classes.php?",		varname:"input",		minchars:1	};	var as2 = new AutoSuggest('testinput2', options2);</script>

<?php include('footer.php') ?>
