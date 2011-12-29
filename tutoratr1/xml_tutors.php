<?php
include("db.php");
/*note:this is just a static test version using a hard-coded countries array.normally you would be populating the array out of a databasethe returned xml has the following structure<results>	<rs>foo</rs>	<rs>bar</rs></results>*/
    $result = mysql_query("SELECT DISTINCT tutor FROM `itesm-mty_tutors` ORDER BY tutor");
    
    $i = 0;
    while($row = mysql_fetch_array($result)) {
        $aCountries[$i]=$row['tutor'];
        $i++;
    }
			$input = strtolower( $_GET['input'] );	$len = strlen($input);		$aResults = array();		if ($len)	{		for ($i=0;$i<count($aCountries);$i++)		{			if (strtolower(substr($aCountries[$i],0,$len)) == $input)				$aResults[] = $aCountries[$i];		}	}		header("Content-Type: text/xml");		echo "<?xml version=\"1.0\" encoding=\"utf-8\" ?><results>";	for ($i=0;$i<count($aResults);$i++)		echo"	<rs>".$aResults[$i]."</rs>";	echo "</results>	";	?>
