<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';

$myPost = filter_input_array(INPUT_POST);

$database->le_cenik->update($myPost);

Header('Location: le-cenik');