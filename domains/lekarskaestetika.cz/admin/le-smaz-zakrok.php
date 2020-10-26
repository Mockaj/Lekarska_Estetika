<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';

$database->le_zakroky->where("id",$_GET['id'])->delete();

Header('Location: vypis-zakroku');