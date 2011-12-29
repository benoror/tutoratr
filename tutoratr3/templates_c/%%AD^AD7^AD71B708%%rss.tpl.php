<?php /* Smarty version 2.6.18, created on 2007-12-17 02:14:17
         compiled from rss.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'rss.tpl', 15, false),array('modifier', 'date_format', 'rss.tpl', 22, false),)), $this); ?>
<?php  header("Content-Type: application/rss+xml");  ?>
<?php echo '<?xml'; ?>
 version="1.0"<?php echo '?>'; ?>

<rss version="2.0">
  <channel>
    <title>Tutoratr - Ultimos comentarios</title>
    <link>http://d91440c2.fb.joyent.us/tutoratr3/</link>
    <description>Ultimos comentarios en Tutoratr.</description>
    <language>es-mx</language>
    <webMaster>tutoratr@gmail.com.com</webMaster>

	<?php $_from = $this->_tpl_vars['rss']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
	    <item>
	      <title><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['tutor_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 - <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['rating'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>
	      <link>http://d91440c2.fb.joyent.us/tutoratr3/</link>
	      <description>
	      	<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['class_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	      	<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

	      	<h3>Calificacion: <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['rating'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h3>
	      </description>
	      <pubDate><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e %b, %Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%e %b, %Y %H:%M:%S")); ?>
</pubDate>
	      <guid>http://d91440c2.fb.joyent.us/tutoratr3/</guid>
	    </item>
	<?php endforeach; endif; unset($_from); ?>

  </channel>
</rss>