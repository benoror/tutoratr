
<?php

require('_drawrating.php');
require('_config-rating.php');

function printSingleComment($row) {

	$tuts = mysql_fetch_array(mysql_query("SELECT id,name FROM tutoratr_t2.`tutors` WHERE id=".$row['id_tutor']));
	$mats = mysql_fetch_array(mysql_query("SELECT id,name FROM tutoratr_t2.`classes` WHERE id=".$row['id_class']));
	
	print_r('	<div class="comment_block">
			 	   <div class="rating">'.$row['rating'].'</div>
			 	   <h1><a href="index.php?s=p&t=p&id='.$tuts['id'].'">'.$tuts['name'].'</a></h1>
			 	   <h2><a href="index.php?s=p&t=m&id='.$mats['id'].'">'.$mats['name'].'</a></h2>
			 	   '.static_rating_bar($row['id_tutor'],'10',$row['rating']).'
			 		<div class="comment" id="comm'.$row['id'].'">
			 		'.$row['comment'].'
			 		
			 	   	<div style="margin-top: 8px; text-align: right;"><i>'.$row['date'].', '.$row['sender'].'</i></div>
			 		</div>
			 	   	<p class="options" align="right">
		       		<a href="index.php?s=c&id='.$tuts['id'].'">Calificar</a>
		       		<a href="index.php?s=p&t=p&id='.$tuts['id'].'">Perfil del profesor</a>
		       		<a href="index.php?s=p&t=m&id='.$mats['id'].'">Perfil de materia</a>
			 	   	</p>
			 	 </div>
			');
}

function printComments($mysql_query) {
    $result = mysql_query($mysql_query);
	if($row = mysql_fetch_array($result)) {
		do { printSingleComment($row); } while ($row = mysql_fetch_array($result));
	} else {
		echo "<p><h1>No hay resultados.</h1></p>";
	}
}

if(!empty($_GET['pg'])) {
	$start = intval($_GET['pg']) * 10;
	printComments("SELECT * FROM tutoratr_t2.`comments` ORDER BY date DESC LIMIT ".$start.",10");
}
else {
	printComments("SELECT * FROM tutoratr_t2.`comments` ORDER BY date DESC LIMIT 10");
}
