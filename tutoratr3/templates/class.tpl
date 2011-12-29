<div style="background: url(images/profile_m.png) no-repeat;" class="title_sec">
Materia
</div>
<br />
<div style="text-align: center;">
	<h1><strong>{$class.name|escape}</strong></h1><br />
</div>

<div style="margin-left: 50px;">
	<table width="80%">
		<tr>
			<td style="text-align: center;"><h4>Profesor que la imparte</h4></td>
			<td style="text-align: center;"><h4>Promedio</h4></td>
		</tr>
		<tr>
		</tr>
		{foreach from=$tutors item="tutors"}
			<tr bgcolor="{cycle values="#dedede,#eeeeee"}">
				<td style="padding: 8px;">
					<a href="javascript:;" onclick="openTutor('{$tutors.id_tutor|escape}')">
						{$tutors.name|escape}
					</a>
				</td>
				
				<td style="text-align: center;">
					<h1>{$tutors.average|escape}</h1>
				</td>
			</tr>
		{/foreach}
	</table>

</div>

<br />
