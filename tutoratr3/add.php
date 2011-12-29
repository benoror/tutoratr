<div style="background: url(images/add_big.png) no-repeat;" class="title_sec">
Agregar
</div>
<br />

<p>Si no encontraste el profesor o la materia que buscabas aqui podras pedir que se agregue a nuestra base de datos. Una vez enviado será sometido a revisión y se agregara en el lapso de un día.</p>
<br />

<div style="text-align: center" >
	<h2>Nombre completo del profesor o materia:</h2>
	<br />
	<input type="text" class="inputtext" value="" id="add_text" 
			style="font-size: 20px; width: 80%;" 
			onkeypress="this.value=stripVowelAccent(this.value);"
			onchange="this.value=stripVowelAccent(this.value);"/>
	<br /><br />
	<span style="margin: 16px">
		<a href="javascript:;"
		onclick="openAjax('add.php','addtutor='+$('#add_text').val())">Agregar Profesor</a>
	</span>
	<span style="margin: 16px">
		<a href="javascript:;"
		onclick="openAjax('add.php','addclass='+$('#add_text').val())">Agregar Materia</a>
	</span>
</div>

<br /><br />

<?php

if(isset($_REQUEST['addtutor'])) {

	$fd = fopen('add_t.txt', 'a');
	fwrite($fd,$_POST['addtutor']."\n");
	echo '<h2>Se agrego el profesor: </h2><br /><h1>'.$_REQUEST['addtutor'].'</h1>';
	fclose($fd);
	
} else if(isset($_REQUEST['addclass'])) {

	$fd = fopen('add_c.txt', 'a');
	fwrite($fd,$_POST['addclass']."\n");
	echo '<h2>Se agrego la clase: </h2><br /><h1>'.$_REQUEST['addclass'].'</h1>';
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
