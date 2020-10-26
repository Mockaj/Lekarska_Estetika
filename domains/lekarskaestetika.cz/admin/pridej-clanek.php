<?php

require_once 'ajax/safe.php';
require_once 'inc/Database.php';
require_once 'class.upload.php';

$handle = new upload($_FILES['photo']);
if ($handle->uploaded) {


    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 1800;
    $handle->image_x = 1800;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 75;
    $handle->process("files/clanky/full/");


    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 500;
    $handle->image_x = 500;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 65;
    $handle->process("files/clanky/thumb/");


    if ($handle->processed) {
        $file = $handle->file_dst_name;
        $handle->clean();


        $myPost = filter_input_array(INPUT_POST);
        $myPost['pic'] = $file;
        $database->novinky->insert($myPost);
        
        Header('Location: vypis-clanku');
        
    } else {
        echo 'error : ' . $handle->error;
    }
}
?>
