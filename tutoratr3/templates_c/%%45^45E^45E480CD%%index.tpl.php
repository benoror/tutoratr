<?php /* Smarty version 2.6.18, created on 2008-07-01 23:49:23
         compiled from index.tpl */ ?>
<?php 

setcookie('fb_sig_user', $_REQUEST['fb_sig_user']);

mysql_connect('localhost:8889', 'root', 'root') or die  ('Error connecting to mysql');
mysql_select_db('tutoratr_t2');

mysql_query("INSERT INTO fb_users VALUES ('".$_REQUEST['fb_sig_user']."');");

 ?>

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
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		 </div>
		 
		 <div id="institutions">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "institutions.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		 </div>
		 
		 <!--<div id="navigation">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "navigation.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		 </div>-->
		 
		 <div id="leftcolumn">
		 	<div id="left_search">
		 		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "leftcolumn.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		 	</div>
		 
			<div id="left_ajax">
			</div>
			
			<div id="left_ad">
			
				<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "v_adsense.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				
			</div>
		 </div>
		 
		 <div id="history">
		 </div>
		 
		 <div id="rightcolumn">
		 
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "h_adsense.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		 
            <div id="ajax_loading" style="display:none; text-align: center; position: absolute; width: 100%;">
                <h4>Cargando por favor espere...</h4><img src="images/loader.gif" />
            </div>
            
            <div id="ajax">
            </div>
            
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "m_adsense.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
			
         </div>
         
		 <div id="footer">
                <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "footer.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
	     </div>
		 
   </div>
   
</body>
</html>