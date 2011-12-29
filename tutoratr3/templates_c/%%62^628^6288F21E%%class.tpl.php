<?php /* Smarty version 2.6.18, created on 2007-12-12 01:21:56
         compiled from class.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'class.tpl', 6, false),array('function', 'cycle', 'class.tpl', 18, false),)), $this); ?>
<div style="background: url(images/profile_m.png) no-repeat;" class="title_sec">
Materia
</div>
<br />
<div style="text-align: center;">
	<h1><strong><?php echo ((is_array($_tmp=$this->_tpl_vars['class']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</strong></h1><br />
</div>

<div style="margin-left: 50px;">
	<table width="80%">
		<tr>
			<td style="text-align: center;"><h4>Profesor que la imparte</h4></td>
			<td style="text-align: center;"><h4>Promedio</h4></td>
		</tr>
		<tr>
		</tr>
		<?php $_from = $this->_tpl_vars['tutors']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['tutors']):
?>
			<tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedede,#eeeeee"), $this);?>
">
				<td style="padding: 8px;">
					<a href="javascript:;" onclick="openTutor('<?php echo ((is_array($_tmp=$this->_tpl_vars['tutors']['id_tutor'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
')">
						<?php echo ((is_array($_tmp=$this->_tpl_vars['tutors']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

					</a>
				</td>
				
				<td style="text-align: center;">
					<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['tutors']['average'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h1>
				</td>
			</tr>
		<?php endforeach; endif; unset($_from); ?>
	</table>

</div>

<br />