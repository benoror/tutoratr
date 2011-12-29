<?php /* Smarty version 2.6.18, created on 2007-12-11 17:07:25
         compiled from recent_left.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'recent_left.tpl', 4, false),)), $this); ?>
<h2><img src="images/tut.png" /> Nuevos porfesores</h2>

<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry_t']):
?>
		<a href="javascript:;" onclick="openTutor('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><br />
<?php endforeach; endif; unset($_from); ?>

<br />

<h2><img src="images/mat.png" /> Nuevas materias</h2>

<?php $_from = $this->_tpl_vars['classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry_c']):
?>
		<a href="javascript:;" onclick="openClass('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_c']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry_c']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a><br />
<?php endforeach; endif; unset($_from); ?>