<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';

$myPost = filter_input_array(INPUT_POST);

$id = $myPost['id'];
unset($myPost['id']);


$database->pristroje->where("id", $id)->update($myPost);

Header('Location: vypis-pristroju');