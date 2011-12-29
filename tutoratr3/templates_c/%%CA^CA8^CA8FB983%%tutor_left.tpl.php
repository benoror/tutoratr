<?php /* Smarty version 2.6.18, created on 2007-12-12 17:41:03
         compiled from tutor_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'tutor_left.tpl', 4, false),)), $this); ?>
<br />
<div style="text-align:center">
	<span class="inst_barc">
	<a href="javascript:;" onclick="openSend('id=<?php echo ((is_array($_tmp=$this->_tpl_vars['tutor']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')">
		CALIFICAR
	</a>
	</span>

	<br /><br /><br /><h4>Promedio</h4><br />

		<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['average']['average'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>

	<br /><h4>Materias impartidas</h4><br />
	
		<?php $_from = $this->_tpl_vars['classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['classes']):
?>
			<a href="javascript:;" onclick="openClass('<?php echo ((is_array($_tmp=$this->_tpl_vars['classes']['id_class'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')">
				<?php echo ((is_array($_tmp=$this->_tpl_vars['classes']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

			</a><br /><br />
		<?php endforeach; endif; unset($_from); ?>
</div>