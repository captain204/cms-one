<?php include("../config/config.php");?>
<?php include("../libraries/db.php");?>
<?php include("../helpers/format-helper.php");?>
<?php
$db = new Database;
$id = $_GET['id'];
$query ="DELETE FROM posts WHERE id=".$id;
$delete_row = $db->delete($query);
?>