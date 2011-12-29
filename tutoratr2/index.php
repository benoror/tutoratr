<?php include('top.php'); ?>
		 
<?php
if(!empty($_GET['s'])) {
	switch($_GET['s']) {
	case "r":
		include('recent.php'); break;
	case "s":
		include('search.php'); break;
	case "p":
		include('profile.php'); break;
	case "c":
		include('send.php'); break;
	case "f":
		include('forum.php'); break;
	case "a":
		include('add.php'); break;
	case "h":
		include('help.php'); break;
	default:
		include('recent.php'); break;
	}
} else {
	include('recent.php');
}
?>
		 
<?php include('bottom.php'); ?>
