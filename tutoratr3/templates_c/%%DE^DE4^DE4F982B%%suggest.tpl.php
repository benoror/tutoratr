<?php /* Smarty version 2.6.18, created on 2007-12-11 15:43:16
         compiled from suggest.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'suggest.tpl', 2, false),)), $this); ?>
<?php $_from = $this->_tpl_vars['suggestTutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry_t']):
?>	
		<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
|<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
|T
<?php endforeach; endif; unset($_from); ?>

<?php $_from = $this->_tpl_vars['suggestClasses']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry_c']):
?>
		<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_c']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
|<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_c']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
|C
<?php endforeach; endif; unset($_from); ?>