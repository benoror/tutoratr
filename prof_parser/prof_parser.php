<?php

include('html_dom_parser.php');

mysql_connect('localhost', 'root', 'g8ag8g') or die  ('Error connecting to mysql');
mysql_select_db('tutoratr4');

mysql_query("TRUNCATE classes");
mysql_query("TRUNCATE tutors");
mysql_query("TRUNCATE imparte");
mysql_query("TRUNCATE institutions");

//Extrae la Bina para informacion
function extractBinaI($campo, $string) {
	if(strpos($string, $campo) !== false)
		return trim(substr($string,strlen($campo)));
	return false;
		
}

//Extrae la Bina para materias
function extractBinaM($string,&$key) {
	if(($pos = strpos($string, '.')) !== false) {
		$key = substr(trim(substr($string,0,$pos)),0,strpos($string,'.'));
		return trim(substr($string,$pos+3));
	}
	return false;
}

//Parsea html de profesor
function parseProfHTML($file) {
	$dom = file_get_dom($file);
	$ARR_INFO = array();
	$ARR_MATS = array();
	
	// ### Info ### //
	
	$tables = $dom->find('TABLE');
	$itex = $tables[3]->plaintext;
		//Remove empty lines
	$itex = trim(preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/","\n",$itex));
		//Remove consecutive spaces
	$itex = preg_replace( '/ +/', ' ', $itex);
	$datos_a = explode("\n",$itex);
	
	foreach($datos_a as $d) {
		if($at = extractBinaI(utf8_decode("Profesor:"),$d))
			$ARR_INFO["Profesor:"] = htmlentities($at, ENT_QUOTES);
		else if($at = extractBinaI(utf8_decode("Correo Electrónico:"),$d))
			$ARR_INFO["Correo Electrónico:"] = htmlentities($at, ENT_QUOTES);
	}
				
	foreach ($dom->find("font.texto5") as $e)
		if ($pos = strpos($e->innertext, "Campus ")!==false)  {
			$ARR_INFO["Campus".":"] = htmlentities(substr($e->innertext,strlen("Campus ")), ENT_QUOTES);
			break;
		}
	
	// ### Mats ### //
	
	$mats_tr = $dom->find('tr.colorPrincipal4');
	
	foreach($mats_tr as $mat) {
		$mat = trim($mat->plaintext);
		if($at = extractBinaM($mat,$key))
				$ARR_MATS[htmlentities($key, ENT_QUOTES)] = htmlentities($at, ENT_QUOTES);
	}
	
	// ### DATABASE ### //
	
	// INSTITUTION
	$ins_q = mysql_query("SELECT id FROM institutions WHERE name = 'ITESM ".$ARR_INFO["Campus".":"]."'");
	if(mysql_num_rows($ins_q)==0) {
		$query = "INSERT INTO institutions (country_id,name,description)
			      VALUES (1,'ITESM ".$ARR_INFO["Campus".":"]."','ITESM ".$ARR_INFO["Campus".":"]."')";
		$result = mysql_query($query);
		if (!$result) {
			echo "\n".$query."\n";
			die("\n".'Invalid query: ' . mysql_error()."\n");
		}
	}
	
	// TUTOR
	if(mysql_num_rows($ins_q)==0)
		$inst[0] = mysql_insert_id();
	else
		$inst = mysql_fetch_row($ins_q);
	$query = "INSERT INTO tutors (name,email,institution_id)
		      VALUES ('".$ARR_INFO['Profesor:']."','".$ARR_INFO['Correo Electrónico:']."',".$inst[0].")";
	$result = mysql_query($query);
	if (!$result) {
		echo "\n".$query."\n";
		die("\n".'Invalid query: ' . mysql_error()."\n");
	}
	$tut_id = mysql_insert_id();
	
	//check null values
	if(empty($ARR_INFO['Profesor:'])) echo "\nTutor Vacio: $file \n";
	
	// ClSSES
	foreach($ARR_MATS as $m => $c) {
		$cla_q = mysql_query("SELECT id FROM classes WHERE code = '".$m."'");
		if(mysql_num_rows($cla_q)==0) {	
			$query = "INSERT INTO classes (name,code)
					  VALUES ('".$c."','".$m."')";
			$result = mysql_query($query);
			if (!$result) {
				echo "\n".$query."\n";
				die("\n".'Invalid query: ' . mysql_error()."\n");
			}
		}
		
		if(mysql_num_rows($cla_q)==0)
			$clas[0] = mysql_insert_id();
		else
			$clas = mysql_fetch_row($cla_q);
			
		$imp_q = mysql_query("SELECT * FROM imparte WHERE tutor_id = ".$tut_id." AND class_id = ".$clas[0]);
		if(mysql_num_rows($imp_q)==0) {
			$query = "INSERT INTO imparte (tutor_id,class_id)
					  VALUES (".$tut_id.",".$clas[0].")";
			$result = mysql_query($query);
			if (!$result) {
				echo "\n".$query."\n";
				die("\n".'Invalid query: ' . mysql_error()."\n");
			}
		}
	}
	
	
	// ### Print ### //
	//print_r($ARR_INFO);
	//print_r($ARR_MATS);
	
	$dom->clear();
	
	return true;
}

$i = 1;
foreach (glob("htmls/*.html") as $archivo) {
	parseProfHTML($archivo);
	echo "\r".$i++."/8712";
	//fgets(fopen('php://stdin',r));
}

?>
