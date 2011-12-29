{php} header("Content-Type: application/rss+xml"); {/php}
<?xml version="1.0"?>
<rss version="2.0">
  <channel>
    <title>Tutoratr - Ultimos comentarios</title>
    <link>http://d91440c2.fb.joyent.us/tutoratr3/</link>
    <description>Ultimos comentarios en Tutoratr.</description>
    <language>es-mx</language>
    <webMaster>tutoratr@gmail.com.com</webMaster>

	{foreach from=$rss item="entry"}
	    <item>
	      <title>{$entry.tutor_name|escape} - {$entry.rating|escape}</title>
	      <link>http://d91440c2.fb.joyent.us/tutoratr3/</link>
	      <description>
	      	{$entry.class_name|escape}
	      	{$entry.comment|escape}
	      	<h3>Calificacion: {$entry.rating|escape}</h3>
	      </description>
	      <pubDate>{$entry.date|date_format:"%e %b, %Y %H:%M:%S"}</pubDate>
	      <guid>http://d91440c2.fb.joyent.us/tutoratr3/</guid>
	    </item>
	{/foreach}

  </channel>
</rss>
