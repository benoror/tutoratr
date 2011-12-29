<?php
include('header.php');
include('sform.php');
?>

<span class="title">Enviar</span>
<br><br>
<div class="comments">

<?php

if ($_POST['enviar']) {

	//$HumanVerifyId=$HTTP_POST_VARS["HumanVerifyID"];
	//$html = join(file("http://www.humanverify.com/a2zverify/a2zcheck.asp?u=benoror&id=$HumanVerifyId"),''); 

	//if ($html=="True"){
		if(empty($_POST['comment']) or empty($_POST['rating']) ) {
			printForm();
			echo "<span class=\"warning\">Faltan datos.</span><br><br>";
		} else {
			if(empty($_POST['sender'])) {
			    $quien = "NA";
			} else {
				$quien = $_POST['sender'];
			}
			$result = mysql_query("INSERT INTO `itesm-mty` ( `id` , `tutor` , `class` , `comment` , `rating` , `ip` , `sender` ) VALUES ( NULL , '".$_POST['sss_tut'][0]."', '".$_POST['sss_cla'][0]."', '".$_POST['comment']."', '".$_POST['rating']."', '".$_SERVER['REMOTE_ADDR']."', '".$quien."'  );", $link);
			echo "Added. Thanks for your comment.<br>Please wait a few minutes until the comment is posted.";
		}
	/*} else {
	    printForm();
		echo "<span class=\"warning\">No. de seguridad incorrecto.</span><br><br>";
	}*/

}else{
	printForm();
}
?> 

</div>

<?php include('footer.php') ?>
