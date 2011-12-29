<?php /* Smarty version 2.6.18, created on 2007-12-31 02:15:23
         compiled from recent.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'recent.tpl', 11, false),array('modifier', 'date_format', 'recent.tpl', 21, false),)), $this); ?>
<div style="background: url(images/recent.png) no-repeat;" class="title_sec">
Nuevos
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "recent_prevnext.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php $_from = $this->_tpl_vars['recent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
    <div class="comment_block">

        <div class="rating">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['rating'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        <?php if ($this->_tpl_vars['entry']['rating'] == '10'): ?>
        	<img src="images/excel.png" style="position: absolute; float: top; right: -4px; top: 36x;"/>
        <?php endif; ?>
        </div>
        
        <h1><a href="javascript:;" onclick="openTutor('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['id_tutor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['tutor_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></h1>
        
        <h2><a href="javascript:;" onclick="openClass('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['id_class'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['class_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></h2>

        <h4><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e %b, %Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%e %b, %Y %H:%M:%S")); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['sender'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h4>
        
        
        <div class="comment" id="comm<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        </div>
        
        <div class="expand_comment" id="ln<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" onclick="toggleComment('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
');">
	        <img src="images/down.png" />
	    </div>
    </div>
    
<?php endforeach; endif; unset($_from); ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "recent_prevnext.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>