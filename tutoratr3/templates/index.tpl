{php}

setcookie('fb_sig_user', $_REQUEST['fb_sig_user']);

mysql_connect('localhost:8889', 'root', 'root') or die  ('Error connecting to mysql');
mysql_select_db('tutoratr_t2');

mysql_query("INSERT INTO fb_users VALUES ('".$_REQUEST['fb_sig_user']."');");

{/php}

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
    <title>Tutoratr 3.0</title>
    <link rel="icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="alternate" type="application/rss+xml" title="RSS" href="rss.php">.
    <link rel="stylesheet" type="text/css" href="css/layout.css" />
    <link rel="stylesheet" type="text/css" href="css/styles.css" />
	<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css" />
    <script type="text/javascript" language="javascript" src="js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="js/util.js"></script>
	<script type="text/javascript" language="javascript" src="js/jquery.autocomplete.js"></script>
	<script type="text/javascript" language="javascript" src="js/autocomplete.js"></script>
    <script type="text/javascript" language="javascript" src="js/ajax.js"></script>
</head>

<body>

   <div id="wrapper">
   
         <div id="header">
                {include file="header.tpl"}
		 </div>
		 
		 <div id="institutions">
                {include file="institutions.tpl"}
		 </div>
		 
		 <!--<div id="navigation">
                {include file="navigation.tpl"}
		 </div>-->
		 
		 <div id="leftcolumn">
		 	<div id="left_search">
		 		{include file="leftcolumn.tpl"}
		 	</div>
		 
			<div id="left_ajax">
			</div>
			
			<div id="left_ad">
			
				{include file="v_adsense.tpl"}
				
			</div>
		 </div>
		 
		 <div id="history">
		 </div>
		 
		 <div id="rightcolumn">
		 
			{include file="h_adsense.tpl"}
		 
            <div id="ajax_loading" style="display:none; text-align: center; position: absolute; width: 100%;">
                <h4>Cargando por favor espere...</h4><img src="images/loader.gif" />
            </div>
            
            <div id="ajax">
            </div>
            
			{include file="m_adsense.tpl"}
			
         </div>
         
		 <div id="footer">
                {include file="footer.tpl"}
	     </div>
		 
   </div>
   
</body>
</html>
