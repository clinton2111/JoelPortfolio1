<?php
include 'connection.php';
$id = $_POST['id'];
$delete = "DELETE FROM photos WHERE id=$id";
$result = mysql_query($delete) or die(mysql_error());

?>