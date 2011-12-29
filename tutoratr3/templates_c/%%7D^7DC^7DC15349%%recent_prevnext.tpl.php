<?php /* Smarty version 2.6.18, created on 2008-01-01 18:22:42
         compiled from recent_prevnext.tpl */ ?>
<div style="text-align: center; margin: 8px;">

	<span class="prevnext">
		<img src="images/prev.png" />
		<a href="javascript:;" onclick="openAjax('recent.php','pag=<?php echo intval($_REQUEST['pag'])-10; ?>')">Anterior</a>
	</span>
	
	<span>
		<a href="javascript:;" onclick="toggleAllComments();">
		<img src="images/down.png" />
		Expandir Todos
		<img src="images/down.png" />
		</a>
	</span>
	
	<span class="prevnext">
		<a href="javascript:;" onclick="openAjax('recent.php','pag=<?php echo intval($_REQUEST['pag'])+10; ?>')">Siguiente</a>
		<img src="images/next.png" />
	</span>
	
</div>