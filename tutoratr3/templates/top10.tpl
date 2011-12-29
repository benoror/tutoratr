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
	{foreach from=$tutors item="entry_t"}
		<tr bgcolor="{cycle values="#dedede,#eeeeee"}">
			<td style="padding: 8px; text-align: center;">
				<a href="javascript:;" onclick="openTutor('{$entry_t.id|escape}')">
					{$entry_t.name|escape}
				</a>
			</td>
			<td style="text-align: center;">
			    {if !empty($entry_t.pic) }
			        <img src="http://www.mty.itesm.mx/profesores/images/{$entry_t.pic|escape}" width="50%" />
			    {else}
			        <img src="images/nophoto.jpg" width="50%" />
			    {/if}
			</td>
			<td style="text-align: center;">
				<h2>{$entry_t.total_votes|escape}</h2>
			</td>
			<td style="text-align: center;">
				<h1>{$entry_t.rating|escape}</h1>
			</td>
		</tr>
	{/foreach}
</table>

<br />
