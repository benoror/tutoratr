<?php
header("Content-Type: text/html; charset=utf-8");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<title>Tutoratr 2.0</title>
<script type="text/javascript" language="javascript" src="js/behavior.js"></script>
<script type="text/javascript" language="javascript" src="js/rating.js"></script>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<link rel="stylesheet" type="text/css" href="css/rating.css" />
<link rel="alternate" type="application/rss+xml" title="recent ratings in rss" href="rss2.php"/>
<link rel="icon" href="/favicon.ico" type="image/x-icon" />

	<script language="JavaScript">
	
	var progress_bar = new Image();
	progress_bar.src = 'images/loading.gif';
		
    function setOpacity( value ) {
     document.getElementById("ajax").style.opacity = value / 10;
     document.getElementById("ajax").style.filter = 'alpha(opacity=' + value * 10 + ')';
    }

    function fadeInMyPopup() {
     for( var i = 0 ; i <= 100 ; i++ )
       setTimeout( 'setOpacity(' + (i / 10) + ')' , 8 * i );
    }
    	
	function openAjax(url, post)
	{ 
	    document.getElementById("ajax_loading").style.display = "block";   

		var req = null; 

		if(window.XMLHttpRequest)
			req = new XMLHttpRequest(); 
		else if (window.ActiveXObject)
			req  = new ActiveXObject(Microsoft.XMLHTTP); 

		req.onreadystatechange = function()
		{ 
        setOpacity( 0 );
			if(req.readyState == 4)
			{

            fadeInMyPopup();
    	    document.getElementById("ajax_loading").style.display = "none";   
			
				if(req.status == 200)
				{
				    document.getElementById("ajax").innerHTML = req.responseText;
				}	
				else	
				{
				    document.getElementById("ajax").innerHTML = "AJAX Error: returned status code " + req.status + " " + req.statusText;
				}	
			} 
		}; 
		req.open("POST", url, true); 
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded"); 
		req.send(post); 
	} 
	
	function stopRKey(evt) {
      var evt = (evt) ? evt : ((event) ? event : null);
      var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
      if ((evt.keyCode == 13) && (node.type=="text"))  {return false;}
    } 
    
    document.onkeypress = stopRKey; 
	</script>

</head>

<body>

   <!-- Begin Wrapper -->
   <div id="wrapper">
   
         <!-- Begin Header -->
         <div id="header">
		 	 <span class="logo"></span>
		      <div id="navigator">
		       	<ul class="main_set">
		       		<li><a href="javascript:;" onclick="openAjax('recent.php',null)">Nuevos</a></li>
		       		<li><a href="javascript:;" onclick="openAjax('forum.php',null)">Foro</a></li>
		       		<li><a href="javascript:;" onclick="openAjax('help.php',null)">Ayuda</a></li>
		       	</ul>
		       </div>
			   
		 </div>
		 <!-- End Header -->
		 
		 <!-- Begin Institutions
		 <div id="institutions">

            <span class="inst_barc"><a href="">ITESM Mty.</a></span>
            <span class="inst_bar"><a href="">UDEM Mty.</a></span>
            <span class="inst_bar"><a href="">UANL Mty.</a></span>
		 
		 </div>
		 End Institutions -->
		 
		 <!-- Begin Navigation -->
		 <div id="navigation">

			<div id="sbar">
			<form method="" action="" name="search_form" onsubmit="document.search_form.search_text.value=''" name="search_text">
			 <input type="search" class="inputtext inputsearch" value="Buscar..." onFocus="document.search_form.search_text.value=''" name="search_text" />&nbsp;
		      <span id="tutbar"><a style="cursor: hand; cursor: pointer" onclick="openAjax('search.php?t=p','search_text='+document.search_form.search_text.value)">&nbsp;&nbsp;Por Profesor</a></span>
		      <span id="matbar"><a style="cursor: hand; cursor: pointer" onclick="openAjax('search.php?t=m','search_text='+document.search_form.search_text.value)">&nbsp;&nbsp;Por Materia</a></span>
		      <span id="addbar"><a style="cursor: hand; cursor: pointer" onclick="openAjax('add.php','add_text='+document.search_form.search_text.value)">&nbsp;&nbsp;¿No lo encontraste? Agregalo!</a></span>
		    </form>
		    </div>
		 
		 </div>
		 <!-- End Navigation -->
		 
		 <!-- Begin Left Column -->
		 <div id="leftcolumn">

<div align="center" style="width: 400px; filter: chroma (color=#FFFFFF);">
<script type="text/javascript"><!--
google_ad_client = "pub-8824615395440396";
//234x60, para fb
google_ad_slot = "6578925434";
google_ad_width = 234;
google_ad_height = 60;
//--></script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>

<div style="border: solid 1px #FFaa00; background: #ffeeaa; padding: 4px; margin: 30px; font-size: 12px;">
<?
srand(time());
$random = (rand()%8);
if($random==1)
    echo '<b>Ayudanos</b> a que tutoratr siga activo recomendandolo a tus amigos y haciendo click en los <i>anuncios</i> patrocinados. Muchas gracias!. Atte: <u>tutoratr</u>.';
else if($random==2)
    echo '<b>Consejo</b>: Para mejores resultados en tus busquedas prueba solo con alguna <i>parte del nombre</i> (apellido, nombre).';
else if($random==3)
    echo '<b>Consejo</b>: Puedes buscar por profesor o por materia. Introduce tu busqueda y haz click en el criterio deseado.';
else if($random==4)
    echo '<b>Consejo</b>: Del lado izquierdo se muestran los <u>ultimos</u> profesores y materias <a href="javascript:;" onclick="openAjax(\'add.php\',null)"><i>solicitados</i></a> por los usuarios.';
else if($random==5)
    echo '<b>Consejo</b>: Esta <u>aplicacion</u> puede ser <a href="http://www.facebook.com/add.php?api_key=4ba14807f76b6a844c0ad9c430ea1328"><i>agregada a facebook</i></a> y compartirla con tus contactos.';
else if($random==6)
    echo '<b>Consejo</b>: Lee el apartado de <a href="javascript:;" onclick="openAjax(\'help.php\',null)"><i>politicas</i></a> <u>antes</u> de hacer uso de este servicio.';
else if($random==7)
    echo '<b>Consejo</b>: Utiliza el <a href="javascript:;" onclick="openAjax(\'forum.php\',null)"><i>foro de discusion</i></a> para resolver tus dudas y plantear <u>comentarios y sugerencias</u>.';
else
    echo '<b>Consejo</b>: Si no encuentras lo que estas buscando puedes <ahref="javascript:;" onclick="openAjax(\'add.php\',null)"><i>solicitar</i> que se agregue</a> algun profesor o materia. Tu solicitud sera atendida en un lapso de 24 horas.';
?>
</div>

<!-- PROGRESS DIV STARTS -->
<div id="ajax_loading" align="center" style="display:none;"><br /><img src="images/loading.gif" border="0" /><br /><h1>Espere porfavor...</h1></div>
<!-- PROGRESS DIV ENDS -->

<!-- AJAX DIV STARTS -->
<div id="ajax">
