<?php
include 'connection.php';

$id = stripslashes($_GET['id']);
$image = mysql_query("SELECT * FROM photos WHERE id = '" . $id . "'");
$image = mysql_fetch_assoc($image);
$image = $image['photo_image'];
header("Content-type:image/jpeg");
echo $image;
?>