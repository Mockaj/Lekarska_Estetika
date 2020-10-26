<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';

$database->pristroje->where("id",$_GET['id'])->delete();

Header('Location: vypis-pristroju');