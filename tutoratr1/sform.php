<?php
function printForm() {
	echo "<form method=\"POST\" action=\"submit.php\" name=\"subformu\">";
	echo "<table>";
	echo "<tr>";
	
	echo "<td>Tutor</td>";
	echo "<td><select name=\"sss_tut[]\">";
	$query = mysql_query("SELECT tutor FROM `itesm-mty_tutors` ORDER BY tutor");
	while ($row = mysql_fetch_array($query)) {
		echo '<option value ="'.$row['tutor'].'">'.$row['tutor'].'</option>';
	}
    //echo "<input type=\"text\" id=\"testinput1\" name=\"tutor\" value=\"\" size=\"50%\" />";
	echo "</select></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>Clase</td>";
	echo "<td><select name=\"sss_cla[]\">";
	$query = mysql_query("SELECT class FROM `itesm-mty_classes` ORDER BY class");
	while ($row = mysql_fetch_array($query)) {
		echo '<option value ="'.$row['class'].'">'.$row['class'].'</option>';
	}
    //echo "<input type=\"text\" id=\"testinput2\" name=\"class\" value=\"\" size=\"50%\" />";
	echo "</select></td>";
	echo "</tr>";
	
	echo "<tr>";
	echo "<td>Comentario</td><td><textarea cols=\"50\" rows=\"10\" name=\"comment\" STYLE=\"width: 100%\"></textarea></td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>Calificación</td>";
	echo "<td>";
	echo "<select name=\"rating\">";
	echo "<option selected></option>";

	$count=10;
	while($count>0) {
		echo "<option>".$count."</option>";
		$count = $count - 1;
	}

	echo "</select>";
	echo "</td>";
	echo "</tr>";

	echo "<tr>";
	echo "<td>";
	echo "Tu nombre (opcional)";
	echo "</td>";
	echo "<td><input type=\"text\" name=\"sender\" /></td>";
	echo "</tr>";

	/*echo "<tr>";
	echo "<td>";
	echo "No. de Seguridad<br><span class=\"captcha\">________________</span><br><small>Espera a que cargue.</small>";
	echo "</td>";
	echo "<td>";
	echo "<input type=\"text\" name=\"HumanVerifyID\" size=\"20\" />";
	echo "</td>";
	echo "</tr>";*/

	echo "<tr>";
	echo "<td>";
	echo "</td>";
	echo "<td align=\"right\"><input type=\"Submit\" name=\"enviar\" value=\"Enviar\"></td>";
	echo "</tr>";

	echo "</table>";
	echo "</form>";
	
    //Recupera datos en caso de error
    echo "<script>document.subformu.tutor.value='".$_POST['tutor']."';</script>";
    echo "<script>document.subformu.class.value='".$_POST['class']."';</script>";
    echo "<script>document.subformu.comment.value='".$_POST['comment']."';</script>";
    echo "<script>document.subformu.rating.value='".$_POST['rating']."';</script>";
    echo "<script>document.subformu.sender.value='".$_POST['sender']."';</script>";
}
?>
