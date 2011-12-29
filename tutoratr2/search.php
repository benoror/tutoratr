<div style="background: url(images/search.png) no-repeat;" class="title_sec">
Búsqueda
</div>
<br />

<?php

require('_config-rating.php');

function replace_accents($str) {
  $str = htmlentities($str, ENT_COMPAT, "UTF-8");
  $str = preg_replace(
'/&([a-zA-Z])(uml|acute|grave|circ|tilde);/',
'$1',$str);
  return html_entity_decode($str);
}

if(!empty($_POST['search_text'])) {

    //Quitamos acentos
    $_POST['search_text'] = replace_accents($_POST['search_text']);

	echo '<h2>Búsqueda ';
	switch($_GET['t']) {
	/*** PROFESOR ***/
	case "p":
		echo 'por profesor...</h2><br />';
		$query = mysql_query("SELECT name,id FROM tutoratr_t2.`tutors` WHERE name LIKE '%".$_POST['search_text']."%'");
		if($p_id = mysql_fetch_array($query)) {
			do {
				$r_id = mysql_fetch_array(mysql_query('SELECT total_value,total_votes FROM tutoratr_t2.`ratings`
														WHERE id='.$p_id['id'].' LIMIT 1'));
				if($r_id[1])
					$calif = number_format(intval($r_id[0])/intval($r_id[1]),1);
				else
					$calif = 0.0;
				echo '<strong>'.$calif.'</strong> <a href="index.php?s=p&t=p&id='.$p_id['id'].'">'.$p_id['name'].'</a><br/>';
			} while ($p_id = mysql_fetch_array($query));
		} else {
			echo "<br /><p>No hay resultados.</p>";
		}
		break;
	/*** MATERIA ***/
	case "m":
		echo 'por materia...</h2><br />';
		$query = mysql_query("SELECT name,id FROM tutoratr_t2.`classes` WHERE name LIKE '%".$_POST['search_text']."%'");
		if($p_id = mysql_fetch_array($query)) {
			do {
				echo '<a href="index.php?s=p&t=m&id='.$p_id['id'].'">'.$p_id['name'].'</a><br/>';
			} while ($p_id = mysql_fetch_array($query));
		} else {
			echo "<br /><p>No hay resultados.</p>";
		}
		break;
	}
} else {
	echo 'Intenta escribir en el campo de búsqueda.';
}
?>
