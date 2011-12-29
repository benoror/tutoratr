<div style="background: url(images/recent.png) no-repeat;" class="title_sec">
Nuevos
</div>

{include file="recent_prevnext.tpl"}

{foreach from=$recent item="entry"}
    <div class="comment_block">

        <div class="rating">
        {$entry.rating|escape}
        {if $entry.rating == "10"}
        	<img src="images/excel.png" style="position: absolute; float: top; right: -4px; top: 36x;"/>
        {/if}
        </div>
        
        <h1><a href="javascript:;" onclick="openTutor('{$entry.id_tutor|escape}')">{$entry.tutor_name|escape}</a></h1>
        
        <h2><a href="javascript:;" onclick="openClass('{$entry.id_class|escape}')">{$entry.class_name|escape}</a></h2>

        <h4>{$entry.date|date_format:"%e %b, %Y %H:%M:%S"}, {$entry.sender|escape}</h4>
        
        
        <div class="comment" id="comm{$entry.id|escape}">
            {$entry.comment|escape}
        </div>
        
        <div class="expand_comment" id="ln{$entry.id|escape}" onclick="toggleComment('{$entry.id|escape}');">
	        <img src="images/down.png" />
	    </div>
    </div>
    
{/foreach}

{include file="recent_prevnext.tpl"}
