<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';
require_once 'class.upload.php';

/********Pridani zakaznika z vytvoreni vypůjcky********/
/*****************************/
if (isset($_GET['pridej-uzivatele-vypujceni'])) {
      $myPost = filter_input_array(INPUT_POST);
      $database->zakaznici->insert($myPost);
} 





/********Pridej clanek********/
/*****************************/
if (isset($_GET['pridej-clanek'])) {
    
    $handle = new upload($_FILES['photo']);
    if ($handle->uploaded) {
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 1200;
    $handle->image_x = 1200;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 75;
    $handle->process("files/novinky/full/");
    
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 400;
    $handle->image_x = 400;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 65;
    $handle->process("files/novinky/thumb/");

    if ($handle->processed) {
        $file = $handle->file_dst_name;
        $handle->clean();

        $myPost = filter_input_array(INPUT_POST);
        $myPost['pic'] = $file;
        $database->novinky->insert($myPost);
        
        Header('Location: novinky');
        
    } else {
        echo 'error : ' . $handle->error;
    }
} else {
        $myPost = filter_input_array(INPUT_POST);
        $fotka = 'photo.jpg';
        $myPost['pic'] = $fotka;
        $database->novinky->insert($myPost);
        Header('Location: novinky');
    } 
}
/********Update clanek********/
/*****************************/
if (isset($_GET['upravit-clanek'])) {
      $myPost = filter_input_array(INPUT_POST);
      $id = $myPost['id'];
      unset($myPost['id']);
      $database->novinky->where("id", $id)->update($myPost);
      Header('Location:novinky');
}

/********Smazani clanku********/
/*****************************/
if (isset($_GET['smaz-clanek'])) {
      $database->novinky->where("id", $_GET['id'])->delete();
      Header('Location:novinky');
}


/********Update stranka********/
/*****************************/
if (isset($_GET['upravit-stranku'])) {
      $myPost = filter_input_array(INPUT_POST);
      $id = $myPost['id'];
      unset($myPost['id']);
      $database->pages->where("id", $id)->update($myPost);
      Header('Location:stranky');
}

/********Update homepage********/
/*****************************/
if (isset($_GET['homepage'])) {
      $myPost = filter_input_array(INPUT_POST);
      $database->homepage->where("id", 1)->update($myPost);
      Header('Location:homepage');
}

/********Smazani zadosti********/
/*****************************/
if (isset($_GET['smaz-zadost'])) {
      $database->zadosti->where("id", $_GET['id'])->delete();
      Header('Location:zadosti');
}

/********Pidej galerii********/
/*****************************/
if (isset($_GET['pridat-foto'])) {
      $kv = new mysqli('md25.wedos.net', 'w194964_msdc19', 'bkrxgB7a', 'd194964_msdc19');
mysqli_set_charset($kv, "utf8");


$novinka = $_POST['novinka'];

if ($kv -> connect_error) { // Kontrola spojení
    die("Connection failed: " . $kv -> connect_error);
     } 

if (count($_FILES['attachment']['name']) > 0) { 
    // Kontrola souoru
    foreach($_FILES['attachment']['error'] as $error) {
        if ($error)
             die("Error: " . $error);
         } 
    $Kv_items = array();
    $Kv = 0;
    $spojovac = "_";
    $newfilename = date('H_i_s');
     if (!file_exists("files/galerie/" . date('Y-m-d'))) {
        mkdir("files/galerie/" . date('Y-m-d'), 0777, true);
    }
    $uploads_dir = "files/galerie/" . date('Y-m-d') . "/";

    foreach($_FILES['attachment']['name'] as $filename) {
         move_uploaded_file($_FILES["attachment"]["tmp_name"][$Kv], $uploads_dir . $newfilename . $spojovac . basename($filename));         
         mysqli_query($kv, "INSERT INTO galerie (nazev, novinka, dir) values ( '" . $newfilename . $spojovac . $_FILES["attachment"]["name"][$Kv] . "', '" . $novinka. "', '" . $uploads_dir . "')");
         
         if (mysqli_insert_id($kv)) {
            $Kv++;                                                           
             $Kv_items[] = mysqli_insert_id($kv);
             }        
        }
        } else { 
        }
$kv -> close();
Header('Location:novinky');
}

/********Smazani fotky********/
/*****************************/
if (isset($_GET['smazat-fotku'])) {
      $database->galerie->where("id", $_GET['id'])->delete();
      $clanek = $_GET['clanek'];
      Header('Location:novinky?upravit&id='. $clanek);
}




















/********Pridani zakaznika klasicky********/
/*****************************/
if (isset($_GET['pridej-uzivatele'])) {
      $myPost = filter_input_array(INPUT_POST);
      $database->zakaznici->insert($myPost);
      Header('Location:zakaznici');
}

/********Update zakaznika********/
/*****************************/
if (isset($_GET['upravit-zakaznika'])) {
      $myPost = filter_input_array(INPUT_POST);
      $id = $myPost['id'];
      unset($myPost['id']);
      $database->zakaznici->where("id", $id)->update($myPost);
      Header('Location:zakaznici');
}

/********Smazani zakaznika********/
/*****************************/
if (isset($_GET['smaz-zakaznika'])) {
      $database->zakaznici->where("id", $_GET['id'])->delete();
      Header('Location:zakaznici');
}

/********Smazani rezervace********/
/*****************************/
if (isset($_GET['smaz-rezervaci'])) {
      $database->rezervace->where("id", $_GET['id'])->delete();
      Header('Location:rezervace');
}

/********Pridani elektrokola********/
/*****************************/
if (isset($_GET['pridej-kolo'])) {
     $handle = new upload($_FILES['photo']);
if ($handle->uploaded) {
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 1800;
    $handle->image_x = 1800;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 75;
    $handle->process("files/bikes/full/");
    
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 500;
    $handle->image_x = 500;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 65;
    $handle->process("files/bikes/thumb/");

    if ($handle->processed) {
        $file = $handle->file_dst_name;
        $handle->clean();

        $myPost = filter_input_array(INPUT_POST);
        $myPost['pic'] = $file;
        $database->kola->insert($myPost);
        
        Header('Location: kola');
        
    } else {
        echo 'error : ' . $handle->error;
    }
}
}

/********Update kola********/
/*****************************/
if (isset($_GET['upravit-kolo'])) {
      $myPost = filter_input_array(INPUT_POST);
      $id = $myPost['id'];
      unset($myPost['id']);
      $database->kola->where("id", $id)->update($myPost);
      Header('Location:kola');
}

/********Smazani kola********/
/*****************************/
if (isset($_GET['smaz-kolo'])) {
      $database->kola->where("id", $_GET['id'])->delete();
      Header('Location:kola');
}

/********Pridani baterii********/
/*****************************/
if (isset($_GET['pridej-baterii'])) {
      $myPost = filter_input_array(INPUT_POST);
      $database->baterie->insert($myPost);
      Header('Location:baterie');
}

/********Smazani baterie********/
/*****************************/
if (isset($_GET['smaz-baterii'])) {
      $database->baterie->where("id", $_GET['id'])->delete();
      Header('Location:baterie');
}

/********Update kola********/
/*****************************/
if (isset($_GET['upravit-baterii'])) {
      $myPost = filter_input_array(INPUT_POST);
      $id = $myPost['id'];
      unset($myPost['id']);
      $database->baterie->where("id", $id)->update($myPost);
      Header('Location:baterie');
}

/********Smazani vypujcky kola********/
/*****************************/
if (isset($_GET['smaz-vypujceni'])) {
      $database->vypujceni->where("id", $_GET['id'])->delete();
      Header('Location:prehled?aktualni');
}

/********Vytvoreni smlouvy********/
/*****************************/
if (isset($_GET['smlouva-uloz'])) {
      $myPost = filter_input_array(INPUT_POST);
      $database->smlouva->insert($myPost);
      Header('Location:smlouvy');
}

/********Smlouva edit********/
/*****************************/
if (isset($_GET['smlouva-edit'])) {
      $myPost = filter_input_array(INPUT_POST);
      $id = $myPost['id'];
      unset($myPost['id']);
      $database->smlouva->where("id", $id)->update($myPost);
      Header('Location:smlouvy');
}

/********Upravt kolo obrazek********/
/*****************************/
if (isset($_GET['upravit-kolo-obrazek'])) {
     $handle = new upload($_FILES['photo']);
if ($handle->uploaded) {
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 1800;
    $handle->image_x = 1800;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 75;
    $handle->process("files/bikes/full/");
    
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 500;
    $handle->image_x = 500;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 65;
    $handle->process("files/bikes/thumb/");

    if ($handle->processed) {
        $file = $handle->file_dst_name;
        $handle->clean();

        $myPost = filter_input_array(INPUT_POST);
        $myPost['pic'] = $file;
        $id = $myPost['id'];
      unset($myPost['id']);
        $database->kola->where("id", $id)->update($myPost);
        
        Header('Location: kola');
        
    } else {
        echo 'error : ' . $handle->error;
    }
}
}