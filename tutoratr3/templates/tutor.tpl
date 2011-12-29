<div style="background: url(images/profile_t.png) no-repeat;" class="title_sec">
Profesor
</div>
<br />
<div style="text-align: center;">
	<h1><strong>{$tutor.name|escape}</strong></h1><br />

    {if !empty($tutor.pic) }
        <img src="http://www.mty.itesm.mx/profesores/images/{$tutor.pic|escape}" /><br /><br />
    {else}
        <img src="images/nophoto.jpg" /><br /><br />
    {/if}
</div>

{foreach from=$comments item="entry"}
    <div class="comment_block">

        <div class="rating" style="margin: 4px;">
        {$entry.rating|escape}
        </div>
        
        <h2><a href="javascript:;" onclick="openClass('{$entry.id_class|escape}')">{$entry.class_name|escape}</a></h2>

        <h4>{$entry.date|date_format:"%e %b, %Y %H:%M:%S"}, {$entry.sender|escape}</h4>
        
        <div class="comment" style="display: block; margin-top: 0px; padding: 0px;">
            {$entry.comment|escape}
        </div>
    </div>
{/foreach}
