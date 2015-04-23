<?php
include("connection.php");
session_start();
if (isset($_POST['emailid'], $_POST['password'])) {
    $emailid = mysql_real_escape_string($_POST['emailid']);
    $password = md5(mysql_real_escape_string($_POST['password']));
    $sql = "SELECT id,username FROM `users` WHERE `email_id`='$emailid' and `password`='$password'";
    $result = mysql_query($sql) or die(mysql_error());
    $count = mysql_num_rows($result);

    if ($count == 1) {
        $row = mysql_fetch_assoc($result);
        $_SESSION['id'] = $row['id'];
        $_SESSION['user_name'] = $row['username'];
        echo 'session set';
    }

}
?>