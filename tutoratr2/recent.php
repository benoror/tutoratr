<div style="background: url(images/recent.png) no-repeat;" class="title_sec">
Nuevos
</div>

<div align="center" style="padding-bottom: 5px;">
<?php
	if(intval($_GET['pg'])>0)
		echo '<h2><a href="index.php?s=r&pg='.(intval($_GET['pg'])-1).'">Anterior</a>';
	else
		echo '<h2>Anterior';

echo ' | <a href="index.php?s=r&pg='.(intval($_GET['pg'])+1).'">Siguiente</a></h2>';
?>
</div>

<?php include('recent_list.php'); ?>

<div align="center" style="padding-top: 5px;">
<?php
	if(intval($_GET['pg'])>0)
		echo '<h2><a href="index.php?s=r&pg='.(intval($_GET['pg'])-1).'">Anterior</a>';
	else
		echo '<h2>Anterior';

echo ' | <a href="index.php?s=r&pg='.(intval($_GET['pg'])+1).'">Siguiente</a></h2>';
?>
</div>
