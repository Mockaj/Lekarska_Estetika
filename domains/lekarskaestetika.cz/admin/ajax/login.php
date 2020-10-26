<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (isset($_POST['name']) && isset($_POST['password'])) {
    $name = $_POST['name'];
    $heslo = sha1($_POST['password']);
    $ip = $_SERVER['REMOTE_ADDR'];

    include("../inc/Database.php");

    $login = $database->uzivatele->where("name", $name)->AND("password", $heslo);

    if (count($login) == 1) {
        $login = $login->fetch();


        $_SESSION["id"] = $login['id'];
        $_SESSION["name"] = $login['name'];
        $_SESSION["last_ip"] = $ip;
        $_SESSION["last_time"] = time();


        Header('Location: ../nastenka');
    } elseif (count($login) == 0) {
        Header('Location: ../login');
    } else {
        Header('Location: ../login');
    }
} else {
    Header('Location: ../login');
}
?>

