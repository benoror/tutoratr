<div style="background: url(images/add_big.png) no-repeat;" class="title_sec">
Agregar
</div>
<br />

<?php

echo '<span id="addbar">';
echo '<form method="POST" action="index.php?s=a&a=t" name="add_form">';
echo '<h2>Nombre completo del profesor o materia:</h2>';
echo 'Una vez enviado será sometido a revisión en el lapso de un día.<br /><br />';
echo '<input type="text" class="inputtext" value="';
if($_POST['add_text']!='Buscar...')
    echo $_POST['add_text'];
else
    echo '';
echo '" name="add_text" size="35%" />&nbsp;&nbsp;';
echo '<br /><br /><a style="cursor: hand; cursor: pointer" onclick="document.add_form.action=\'index.php?s=a&a=t\';document.add_form.submit()">&nbsp;Agregar Profesor</a>&nbsp;&nbsp;';
echo '<a style="cursor: hand; cursor: pointer" onclick="document.add_form.action=\'index.php?s=a&a=c\';document.add_form.submit()">&nbsp;Agregar Materia</a>';
echo '</form>';
echo '</span>';

if(!empty($_GET['a']) and !empty($_POST['add_text'])) {	
	
	switch ($_GET['a']) {
	case 't':
		$fd = fopen('add_t.txt', 'a');
		fwrite($fd,$_POST['add_text']."\n");
		echo '<br />Profesor <strong>'.$_POST['add_text'].'</strong> enviado.';
		break;
	case 'c':
		$fd = fopen('add_c.txt', 'a');
		fwrite($fd,$_POST['add_text']."\n");
		echo '<br />Materia <strong>'.$_POST['add_text'].'</strong> enviada.';
		break;
	}
	
	fclose($fd);
	
} else if($_GET['x']=='x') {
	
	echo '<form method="POST" action="add_db.php" name="adddb_form">';
	
	$fd = fopen('add_t.txt', 'r');
	echo '<br />Profesores:<br />';
	$id=0;
	while($ln=fgets($fd)) {
	    echo '<input type="text" value="'.trim($ln).'" id="tut'.$id.'" \>';
	    echo '<input type="button" value="Agregar" onclick="document.adddb_form.action=\'add_db.php?a=t&t=\' + document.getElementById(\'tut'.$id.'\').value;document.adddb_form.submit()" \><br />';
	    $id++;
	}
	fclose($fd);

	$fd = fopen('add_c.txt', 'r');
	echo '<br />Materias:<br /><br />';
	$id=0;
	while($ln=fgets($fd)) {
	    echo '<input type="text" value="'.trim($ln).'" id="cla'.$id.'" \>';
	    echo '<input type="button" value="Agregar" onclick="document.adddb_form.action=\'add_db.php?a=c&t=\' + document.getElementById(\'cla'.$id.'\').value;document.adddb_form.submit()" \><br />';
	    $id++;
	}
	fclose($fd);
	
	
	echo '</form>';
	
}

?>
