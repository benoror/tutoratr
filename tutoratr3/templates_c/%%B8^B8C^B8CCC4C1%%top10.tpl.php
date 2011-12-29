<?php /* Smarty version 2.6.18, created on 2007-12-16 23:56:40
         compiled from top10.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'top10.tpl', 16, false),array('modifier', 'escape', 'top10.tpl', 18, false),)), $this); ?>
<div style="background: url(images/excel.png) no-repeat;" class="title_sec">
Top 10
</div>
<br />

<table width="100%">
	<tr>
		<td style="text-align: center;"><h4>Profesor</h4></td>
		<td style="text-align: center;"><h4>Foto</h4></td>
		<td style="text-align: center;"><h4>Votos</h4></td>
		<td style="text-align: center;"><h4>Promedio</h4></td>
	</tr>
	<tr>
	</tr>
	<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry_t']):
?>
		<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedede,#eeeeee"), $this);?>
">
			<td style="padding: 8px; text-align: center;">
				<a href="javascript:;" onclick="openTutor('<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['id'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')">
					<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				</a>
			</td>
			<td style="text-align: center;">
			    <?php if (! empty ( $this->_tpl_vars['entry_t']['pic'] )): ?>
			        <img src="http://www.mty.itesm.mx/profesores/images/<?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['pic'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" width="50%" />
			    <?php else: ?>
			        <img src="images/nophoto.jpg" width="50%" />
			    <?php endif; ?>
			</td>
			<td style="text-align: center;">
				<h2><?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['total_votes'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
			</td>
			<td style="text-align: center;">
				<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['entry_t']['rating'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
			</td>
		</tr>
	<?php endforeach; endif; unset($_from); ?>
</table>

<br />