<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>tutoratr</title>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

 <style type="text/css" media="all">@import "style.css";</style>

 <link rel="alternate" type="application/rss+xml" title="recent ratings in rss" href="rss2.php"/>
 <link rel="icon" href="/favicon.ico" type="image/x-icon" />

<?php
include("db.php");
?>

<style type="text/css">	/* 	================================================	styling for autosuggest begins here	================================================	*/			ul.autosuggest	{		position: absolute;		list-style: none;		margin: 0;		padding: 0;		overflow-y: never;	}		ul.autosuggest li	{		text-align: left;
		color: #008080;	}		ul.autosuggest li a:link,	ul.autosuggest li a:visited	{		display: block;		padding: 2px;		text-decoration: none;		background-color: #ffffff;
		color: #008080;
		font-size: 12px;
    	font-style: italic;	}	ul.autosuggest li a:hover,	ul.autosuggest li a:active	{		color: #fff;		background-color: #008080;	}	ul.autosuggest li.highlight a:link,	ul.autosuggest li.highlight a:visited	{		color: #fff;		background-color: #008080;	}		</style>

</head>
<body>

<div id="wrapper">

<div id="header">

<table>
<tr>

<td>
<div id="logo">

</div>
</td>

<td>
<div id="menu">
<a href="recent.php"><span class="imenu<?php if(strpos($_SERVER['PHP_SELF'],"recent.php")) {echo('_a');} ?>">Nuevos</span></a>
<a href="browse.php"><span class="imenu<?php if(strpos($_SERVER['PHP_SELF'],"browse.php")) {echo('_a');} ?>">Buscar</span></a>
<a href="submit.php"><span class="imenu<?php if(strpos($_SERVER['PHP_SELF'],"submit.php")) {echo('_a');} ?>">Enviar</span></a>
<a href="comm.php"><span class="imenu<?php if(strpos($_SERVER['PHP_SELF'],"comm.php")) {echo('_a');} ?>">Comentarios</span></a>
<a href="about.php"><span class="imenu<?php if(strpos($_SERVER['PHP_SELF'],"about.php")) {echo('_a');} ?>">Ayuda</span></a>
</div>
</td>

</tr>
</table>

</div>

</td>

<div id="search">
<form method="POST" action="browse.php" name="sformu"> 
<input type="text" id="testinput3" name="term" value="Buscar..." onclick="javascript: if(searclicked == 0){document.sformu.term.value=''; searclicked = 1;}"/>
<input type="Submit" class="image_btn" name="buscar" value="" />
</form>
</div>

<script type="text/javascript" src="js/bsn.Ajax.js"></script><script type="text/javascript" src="js/bsn.DOM.js"></script><script type="text/javascript" src="js/bsn.AutoSuggest.js"></script>
<script type="text/javascript">
    var searclicked = 0;
	var options1 = {		script:"xml_both.php?",		varname:"input",		minchars:1	};	var as1 = new AutoSuggest('testinput3', options1);</script>

<div id="adsense_top">
<?php include("adsense_top.php")?>
</div>

<div id="content">
