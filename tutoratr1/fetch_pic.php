<?php

function accents($text) {
    global $export;
    $search  = array ('á', 'é', 'í', 'ó', 'í', 'ü', 'Ü', 'Á', 'É', 'Í', 'Ó', 'Ú');
    $replace = array ('a', 'e', 'i', 'o', 'u', 'u', 'U', 'A', 'E', 'I', 'O', 'U');
    $export = str_replace($search, $replace, $text);
    return $export;
}

function fetch_pic($s,$tt) {
	$pics = file("./pics.txt");

	foreach ($pics as $line_num => $line)
		if(preg_match("/".$s."/i",$line))
			echo '<a href="recent.php?dp='.$line.'&nm='.$tt.'"><img src="http://www.mty.itesm.mx/profesores/images/'.$line.'"></a>';
}

?>
