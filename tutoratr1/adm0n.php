<?php
session_start();

$username="duke";
$userpass="mandruke1976";

	if ($_POST['u']!=$username || $_POST['p']!=$userpass) {
	    echo "<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\">";
	    echo "<input type=\"text\" name=\"u\"><br>";
	    echo "<input type=\"text\" name=\"p\"><br>";
	    echo "<input type=\"Submit\" name=\"s\"></form>";
	} else {

include('header.php');
include("single_comment.php");
?>

<span class="title">Administration</span>
<br><br>
<div class="comments">

<?php
if ($_POST['tutor'] && !empty($_POST['add_tutor'])) {
    mysql_query("INSERT INTO `itesm-mty_tutors` ( `tutor` ) VALUES ( '".$_POST['add_tutor']."' )");
    echo "<font color=red>Tutor '<b>".$_POST['add_tutor']."</b>' added.</font><br><br>";
} else if ($_POST['class'] && !empty($_POST['add_class'])) {
    mysql_query("INSERT INTO `itesm-mty_classes` ( `class` ) VALUES ( '".$_POST['add_class']."' )");
    echo "<font color=red>Class '<b>".$_POST['add_class']."</b>' added.</font><br><br>";
} else if ($_POST['delete'] && !empty($_POST['delete_id'])) {
    mysql_query("DELETE FROM `itesm-mty` WHERE `id` = ".$_POST['delete_id']." LIMIT 1");
    echo "<font color=red>Post '<b>".$_POST['delete_id']."</b>' deleted.</font><br><br>";
}
?>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<span class="comm_tut">Add tutor</span><br><input type="text" name="add_tutor" size="45" /> <input type="Submit" value="Add" name="tutor"><br><br>
</form>

<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<span class="comm_tut">Add class</span><br><input type="text" name="add_class" size="45" /> <input type="Submit" value="Add" name="class"><br><br>
</form>

<?php
    $result = mysql_query("SELECT * FROM `itesm-mty` ORDER BY id DESC LIMIT 50");
	while($row = mysql_fetch_array($result)) {
        printSingleComment($row, NULL);
        echo "<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\">";
        echo "<input type=\"hidden\" value=\"".$row["id"]."\" name=\"delete_id\">";
        echo "<input type=\"Submit\" value=\"Delete\" name=\"delete\">";
        echo "</form><br><br>";
    }
?>

</div>
<?php
include('footer.php');
}
?>
