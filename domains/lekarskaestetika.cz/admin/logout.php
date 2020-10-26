<?php
session_start();  
unset($_SESSION['name']);
unset($_SESSION['password']);
unset($_SESSION['id']);
unset($_SESSION['last_ip']);
unset($_SESSION['last_time']);

Header('Location: login.php');

?>
