<div style="background: url(images/search.png) no-repeat;" class="title_sec">
Busqueda
</div>
<br />

<h4>Profesores:</h4>
<br />
{foreach from=$tutors item="entry_t"}	
		<a href="javascript:;" onclick="openTutor('{$entry_t.id|escape}')">
		<img src="images/tut.png" /> {$entry_t.name|escape}
		</a>
		<br />
{/foreach}

<br />
<h4>Materias:</h4>
<br />
{foreach from=$classes item="entry_c"}
		<a href="javascript:;" onclick="openClass('{$entry_c.id|escape}')">
		<img src="images/mat.png" /> {$entry_c.name|escape}
		</a>
		<br />
{/foreach}
