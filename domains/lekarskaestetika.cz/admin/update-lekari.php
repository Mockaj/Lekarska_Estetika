<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';

$myPost = filter_input_array(INPUT_POST);

$id = $myPost['id'];
unset($myPost['id']);


$database->galerie_zakroky->where("id", $id)->update($myPost);

Header('Location: vypis-lekaru');