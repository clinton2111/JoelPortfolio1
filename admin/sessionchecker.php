<?php
session_start();
if ((empty($_SESSION['id'])) && (empty($_SESSION['user_name']))) {
    header("Location:login.php");
}
?>