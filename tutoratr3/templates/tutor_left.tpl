<br />
<div style="text-align:center">
	<span class="inst_barc">
	<a href="javascript:;" onclick="openSend('id={$tutor.id|escape}')">
		CALIFICAR
	</a>
	</span>

	<br /><br /><br /><h4>Promedio</h4><br />

		<h1>{$average.average|escape}</h1>

	<br /><h4>Materias impartidas</h4><br />
	
		{foreach from=$classes item="classes"}
			<a href="javascript:;" onclick="openClass('{$classes.id_class|escape}')">
				{$classes.name|escape}
			</a><br /><br />
		{/foreach}
</div>
