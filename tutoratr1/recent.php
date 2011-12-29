<?php
include('header.php');
include("single_comment.php");

function print_nav() {
	print_r('
	<div align="center" style="background-color: #DDFDDD;">
	<h3>');

	if(intval($_GET['pg'])>0)
		echo '<a href="recent.php?pg='.(intval($_GET['pg'])-1).'">Anterior</a>';
	else
		echo 'Anterior';
		
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	
	echo '<a href="recent.php?pg='.(intval($_GET['pg'])+1).'">Siguiente</a></h3></div>';
}

?>

<span class="title">Nuevos</span>
<br><br>

<div class="comments">

<?php

print_nav();

if(!empty($_GET['pg'])) {
	$start = intval($_GET['pg']) * 10;
	printComments("SELECT * FROM `itesm-mty` ORDER BY date DESC LIMIT ".$start.",10",NULL);
}
else {
	printComments("SELECT * FROM `itesm-mty` ORDER BY date DESC LIMIT 10",NULL);
}

?>

</div>

<?php
	print_nav();
?>

<?php include('footer.php') ?>
