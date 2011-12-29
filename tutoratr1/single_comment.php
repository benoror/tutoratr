<?php

include("fetch_pic.php");

//Add photo to database
if(!empty($_GET['dp']) and !empty($_GET['nm']) ) {
	if(!mysql_query('UPDATE `itesm-mty_tutors` SET `pic` = \''.$_GET['dp'].'\' WHERE CONVERT(`itesm-mty_tutors`.`tutor` USING utf8) = \''.$_GET['nm'].'\' LIMIT 1;'))
		echo "<h1>Error. Favor de reportarlo</h1>";
}

function highlight($x,$var) {//$x is the string, $var is the text to be highlighted
   if ($var != "") {
       $xtemp = "";
       $i=0;
       while($i<strlen($x)){
           if((($i + strlen($var)) <= strlen($x)) && (strcasecmp($var, substr($x, $i, strlen($var))) == 0)) {
                   $xtemp .= "<FONT style=\"BACKGROUND-COLOR: yellow\">" . substr($x, $i , strlen($var)) . "</FONT>";
                   $i += strlen($var);
           }
           else {
               $xtemp .= $x{$i};
               $i++;
           }
       }
       $x = $xtemp;
   }
   return $x;
}

function printSingleComment($row, $highlight) {
    if($highlight==NULL) {
        $comment = $row["comment"];
        $tutor = $row["tutor"];
        $class = $row["class"];
        $sender = $row["sender"];
    } else {
        $comment = highlight($row["comment"],$highlight);
        $tutor = highlight($row["tutor"],$highlight);
        $class = highlight($row["class"],$highlight);
        $sender = highlight ($row["sender"],$highlight);
    }

	$red = (10 - $row["rating"]) * 10;
	$gre = $row["rating"] * 8;
	echo "<div onclick=\"javascript:parent.location='browse.php?id=".$row["id"]."'\" class=\"bloque\">";
	echo "<div>";
	echo "<span class=\"star\" style=\"color: rgb(".$red."%,".$gre."%,0%)\">";
	echo "<b>".$row["rating"]."</b><br>";
	
	$result = mysql_query("SELECT ROUND(AVG(rating),1) FROM `itesm-mty` WHERE `tutor` = '".$row["tutor"]."'");
	$avg = mysql_fetch_row($result);
	$red = (10 - $avg[0]) * 10;
	$gre = $avg[0] * 8;
	echo "<small><small><small><span style=\"color: rgb(".$red."%,".$gre."%,0%)\">";
	echo $avg[0]."</span></small></small></small>";
	echo "</span>";
	
	if($picr = mysql_fetch_row(mysql_query("SELECT pic FROM `itesm-mty_tutors` WHERE `tutor` = '".$row["tutor"]."'")) and !empty($picr[0]))   
		echo '<span class="pic"><img src="http://www.mty.itesm.mx/profesores/images/'.$picr[0].'" width=59 height=64 /></span>';
	else
	    echo '<span class="pic"><img src="http://www.mty.itesm.mx/profesores/images/hombre.jpg" width=59 height=57 /></span>';
	
	echo "<span class=\"comm_tut\">".$tutor."</span><br>";
	echo "<span class=\"comm_cla\">".$class."</span><br>";
	echo "<span class=\"comm_ins\">".$row["date"].", ".$sender."</span></div>";
	
	echo "<p class=\"comm_com\" style=\"text-align:justify\">".$comment."</p></div>";
	
	if(empty($picr[0])) {
		
		echo '<a href="javascript:;" onmousedown="if(document.getElementById(\'hhidder'.$row["id"].'\').style.display == \'none\'){ document.getElementById(\'hhidder'.$row["id"].'\').style.display = \'block\'; }else{ document.getElementById(\'hhidder'.$row["id"].'\').style.display = \'none\'; }">';
		
		echo '<h4 align="center">Ayudanos a seleccionar la foto de '.$row["tutor"].'</a></h4>';
		$nms = split(' ',$row["tutor"]);
		echo '<div id="hhidder'.$row["id"].'" style="display:none" align="center">';
		foreach($nms as $xtempe => $nms_n)
			if(strlen($nms_n)>2)
				echo "<br />".fetch_pic(strtolower(accents($nms_n)),$row["tutor"]);
				echo '<a href="recent.php?dp=hombre.jpg&nm='.$row["tutor"].'"><img src="http://www.mty.itesm.mx/profesores/images/hombre.jpg"></a>';
				echo '<a href="recent.php?dp=mujer.jpg&nm='.$row["tutor"].'"><img src="http://www.mty.itesm.mx/profesores/images/mujer.jpg"></a>';
		echo "</div><br />";
	}
}

function printComments($mysql_query, $highlight) {
    $result = mysql_query($mysql_query);
	if($row = mysql_fetch_array($result)) {
		do {
			printSingleComment($row, $highlight);
		} while ($row = mysql_fetch_array($result));
	} else {
		echo "<span class=\"warning\">No hay resultados.</span>";
	}
}
?>
