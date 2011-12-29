<div style="text-align: center; margin: 8px;">

	<span class="prevnext">
		<img src="images/prev.png" />
		<a href="javascript:;" onclick="openAjax('recent.php','pag={php}echo intval($_REQUEST['pag'])-10;{/php}')">Anterior</a>
	</span>
	
	<span>
		<a href="javascript:;" onclick="toggleAllComments();">
		<img src="images/down.png" />
		Expandir Todos
		<img src="images/down.png" />
		</a>
	</span>
	
	<span class="prevnext">
		<a href="javascript:;" onclick="openAjax('recent.php','pag={php}echo intval($_REQUEST['pag'])+10;{/php}')">Siguiente</a>
		<img src="images/next.png" />
	</span>
	
</div>
