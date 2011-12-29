{foreach from=$suggestTutors item="entry_t"}	
		{$entry_t.name|escape}|{$entry_t.id|escape}|T
{/foreach}

{foreach from=$suggestClasses item="entry_c"}
		{$entry_c.name|escape}|{$entry_c.id|escape}|C
{/foreach}
