<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$expiration_time = 15 * 60 * 1000;

if (isset($_SESSION["name"]) &&
        isset($_SESSION["id"]) &&
        isset($_SESSION["last_ip"]) &&
        isset($_SESSION["last_time"]) &&
        ($_SESSION["last_time"] + $expiration_time > time()) &&
        $_SESSION["last_ip"] == $_SERVER['REMOTE_ADDR']) {
    $_SESSION["last_time"] = time();
} else {
    Header('Location: login');
}
?>