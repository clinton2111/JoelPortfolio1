<?php
include 'connection.php';

$id = stripslashes($_GET['id']);
$image = mysql_query("SELECT * FROM gigs WHERE id = '" . $id . "'");
$image = mysql_fetch_assoc($image);
$image = $image['pic'];
header("Content-type:image/jpeg");
echo $image;
?>