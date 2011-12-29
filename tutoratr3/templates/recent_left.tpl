<h2><img src="images/tut.png" /> Nuevos porfesores</h2>

{foreach from=$tutors item="entry_t"}
		<a href="javascript:;" onclick="openTutor('{$entry_t.id|escape}')">{$entry_t.name|escape}</a><br />
{/foreach}

<br />

<h2><img src="images/mat.png" /> Nuevas materias</h2>

{foreach from=$classes item="entry_c"}
		<a href="javascript:;" onclick="openClass('{$entry_c.id|escape}')">{$entry_c.name|escape}</a><br />
{/foreach}
