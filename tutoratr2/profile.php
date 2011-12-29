<?php

require('_drawrating.php');
require('_config-rating.php');

if(!empty($_GET['t']) and !empty($_GET['id'])) {
	switch($_GET['t']) {
	/*** PROFESOR ***/
	case "p":
		echo '<div style="background: url(images/profile_t.png) no-repeat;" class="title_sec">Perfil</div>';
		$name = mysql_fetch_array(mysql_query('SELECT name,pic FROM tutoratr_t2.`tutors` WHERE id='.$_GET['id'].' LIMIT 1'));
		echo '<br /><h1>Profesor: <strong>'.$name[0].'</strong></h1><br />';
		$img = empty($name[1])?'images/nophoto.jpg':'http://www.mty.itesm.mx/profesores/images/'.$name[1];
		echo '<img src="'.$img.'" /><br /><br />';
		echo rating_bar($_GET['id'],'10','static').'<br />';
		
		print_r('<p class="options" align="center">
					<a href="index.php?s=c&id='.$_GET['id'].'" style="font-size:24pt;">Califica este profesor</a>
				 </p>');
		
		echo '<br /><h1>Materias impartidas:</h1><br />';
		$query = mysql_query("SELECT DISTINCT id_class FROM tutoratr_t2.`comments`
								WHERE id_tutor=".$_GET['id']);
		if($p_id = mysql_fetch_array($query)) {
			do {
				$m_id = mysql_fetch_array(mysql_query('SELECT name FROM tutoratr_t2.`classes`
														WHERE id='.$p_id['id_class']));
				echo '<a href="index.php?s=p&t=m&id='.$p_id['id_class'].'">'.$m_id[0].'</a><br/>';
			} while ($p_id = mysql_fetch_array($query));
		} else {
			echo "<br /><p>No hay resultados.</p>";
		}
		
		echo '<br /><h1>Calificaciones:</h1><br />';
		$query = mysql_query("SELECT rating,date,sender,comment FROM tutoratr_t2.`comments` WHERE id_tutor=".$_GET['id']." ORDER BY date DESC");
		if($p_id = mysql_fetch_array($query)) {
			do {
				print_r('	<div style="padding: 5px;">
						 	   <h2>Calificacion: '.$p_id['rating'].'</h2>
						 	   <h4>'.$p_id['date'].', '.$p_id['sender'].'</h4>
						 		<p>
						 		'.$p_id['comment'].'
						 		</p>
						 	</div>
						');	
			} while ($p_id = mysql_fetch_array($query));
		} else {
			echo "<p><h1>No hay resultados.</h1></p>";
		}	
		
		break;
	/*** MATERIA ***/
	case "m":
		echo '<div style="background: url(images/profile_m.png) no-repeat;" class="title_sec">Perfil</div>';
		$name = mysql_fetch_array(mysql_query('SELECT name FROM tutoratr_t2.`classes`
												WHERE id='.$_GET['id'].' LIMIT 1'));
		echo '<br /><h1>Materia: <strong>'.$name[0].'</strong></h1>';
		
		echo '<br /><h2>Profesores que la imparten:</h2><br />';
		$query = mysql_query("SELECT DISTINCT id_tutor FROM tutoratr_t2.`comments`
								WHERE id_class=".$_GET['id']);
		if($m_id = mysql_fetch_array($query)) {
			do {
				$p_id = mysql_fetch_array(mysql_query('SELECT name FROM tutoratr_t2.`tutors`
														WHERE id='.$m_id['id_tutor'].' LIMIT 1'));
				$r_id = mysql_fetch_array(mysql_query('SELECT total_value,total_votes FROM tutoratr_t2.`ratings`
														WHERE id='.$m_id['id_tutor'].' LIMIT 1'));
				$calif = number_format(intval($r_id[0])/intval($r_id[1]),1);
				echo '<strong>'.$calif.'</strong> <a href="index.php?s=p&t=p&id='.$m_id['id_tutor'].'">'.$p_id[0].'</a><br/>';
			} while ($m_id = mysql_fetch_array($query));
		} else {
			echo "<br /><p>No hay resultados.</p>";
		}
		
		break;
	}
}

?>
