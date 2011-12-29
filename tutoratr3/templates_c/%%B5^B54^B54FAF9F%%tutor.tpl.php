<?php /* Smarty version 2.6.18, created on 2007-12-12 13:18:47
         compiled from tutor.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'tutor.tpl', 6, false),array('modifier', 'date_format', 'tutor.tpl', 24, false),)), $this); ?>
<div style="background: url(images/profile_t.png) no-repeat;" class="title_sec">
Profesor
</div>
<br />
<div style="text-align: center;">
	<h1><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['tutor']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong></h1><br />

    <?php if (! empty ( $this->_tpl_vars['tutor']['pic'] )): ?>
        <img src="http://www.mty.itesm.mx/profesores/images/<?php echo ((is_array($_tmp=$this->_tpl_vars['tutor']['pic'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" /><br /><br />
    <?php else: ?>
        <img src="images/nophoto.jpg" /><br /><br />
    <?php endif; ?>
</div>

<?php $_from = $this->_tpl_vars['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
    <div class="comment_block">

        <div class="rating" style="margin: 4px;">
        <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['rating'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        </div>
        
        <h2><a href="javascript:;" onclick="openClass('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['id_class'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')"><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['class_name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</a></h2>

        <h4><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['date'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%e %b, %Y %H:%M:%S") : smarty_modifier_date_format($_tmp, "%e %b, %Y %H:%M:%S")); ?>
, <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['sender'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h4>
        
        <div class="comment" style="display: block; margin-top: 0px; padding: 0px;">
            <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['comment'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

        </div>
    </div>
<?php endforeach; endif; unset($_from); ?>