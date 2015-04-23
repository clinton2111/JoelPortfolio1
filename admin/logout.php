<?php
session_start();
if ((!empty($_SESSION['id'])) && (!empty($_SESSION['user_name']))) {
    unset($_SESSION['id']);
    unset($_SESSION['user_name']);
}
header("Location:login.php");
?>