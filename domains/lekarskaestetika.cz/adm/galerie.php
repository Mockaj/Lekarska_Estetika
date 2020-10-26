<?php
require_once 'inc/Database.php';
require_once 'ajax/safe.php';
require_once 'class.upload.php';
$klient_name = $database->adm_core("name", "klient_name")->fetch();
$klient_url = $database->adm_core("name", "klient_url")->fetch();
$kv = new mysqli('md25.wedos.net', 'w193493_le', 'uhUTq69H', 'd193493_le');

if (isset($_GET['del'])) { 
  $database->galerie_soubory->where("id", $_GET['id'])->delete();
  Header('Location:galerie?upravit&id='. $_GET['gal'] .'&delete-ok');
  
} if (isset($_GET['save'])) { 

require_once "class.image.php";
mysqli_set_charset($kv, "utf8");

if ($kv->connect_error) { // Check connection
	die("Connection failed: " . $kv->connect_error);
}

if (isset($_FILES['attachment']['name'])) {

	// File Error Checking
	foreach ($_FILES['attachment']['error'] as $error) {
		if ($error)
			die("Error: " . $error);
	}

	// File Type Restrictions
	$allowed = array('jpg', 'png', 'jfif', 'JPG', 'jpeg', 'JPEG', 'PNG');
	foreach ($_FILES['attachment']['name'] as $name) {
		$type = pathinfo($name, PATHINFO_EXTENSION);
		if (!in_array($type, $allowed))
			die("Upozornění: Některé z nahrávaných souborů nemají správný formát. Prosím, nahrajte JPg soubor.");
	}
	$Kv_items = array();
	$Kv = 0;      
    
	function random_string($length) 
    {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}
    
    $spojovac = '_';
	$newfilename = date('H_i_s');
	 
    $uploads_dir_small = "files/galerie/thumb/";
    $uploads_dir_full = "files/galerie/full/";  
    
    $myPost = filter_input_array(INPUT_POST);
    
    $galerie_id = $myPost['id'];
    unset($myPost['id']);
    $database->galerie->where("id", $galerie_id)->update($myPost);


	foreach ($_FILES['attachment']['name'] as $filename) {
        
        $nazevsouboru = random_string(50);
        $image = new IMAGE($_FILES['attachment']['name'][$Kv], $_FILES['attachment']['tmp_name'][$Kv]);
        $image->resize(1200);
        $image->save($uploads_dir_full,$nazevsouboru);
        $full_name = $nazevsouboru . "." . $image->image['extension'];
        
        $image = new IMAGE($_FILES['attachment']['name'][$Kv], $_FILES['attachment']['tmp_name'][$Kv]);
        $image->resize(600);
        $image->save($uploads_dir_small,$nazevsouboru);
        $full_name = $nazevsouboru . "." . $image->image['extension'];

		mysqli_query($kv, "INSERT INTO galerie_soubory (soubor, galerie_id) values ( '" . $full_name . "', '" . $galerie_id . "')");

		$Kv++;
	}

} else {

        $myPost = filter_input_array(INPUT_POST);
        $galerie_id = $myPost['id'];
        unset($myPost['id']);
        $database->galerie->where("id", $galerie_id)->update($myPost);
}

$kv->close();
Header('Location:galerie?upravit&id='. $galerie_id .'&save-ok');
    
} if (isset($_GET['add'])) {
 
require_once "class.image.php";
mysqli_set_charset($kv, "utf8");

if ($kv->connect_error) { // Check connection
	die("Connection failed: " . $kv->connect_error);
}

if (isset($_FILES['attachment']['name'])) {

	// File Error Checking
	foreach ($_FILES['attachment']['error'] as $error) {
		if ($error)
			die("Error: " . $error);
	}

	// File Type Restrictions
	$allowed = array('jpg', 'png', 'jfif', 'JPG', 'jpeg', 'JPEG', 'PNG');
	foreach ($_FILES['attachment']['name'] as $name) {
		$type = pathinfo($name, PATHINFO_EXTENSION);
		if (!in_array($type, $allowed))
			die("Upozornění: Některé z nahrávaných souborů nemají správný formát. Prosím, nahrajte JPg soubor.");
	}
	$Kv_items = array();
	$Kv = 0;      
    
	function random_string($length) 
    {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));

    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}
    
    $spojovac = '_';
	$newfilename = date('H_i_s');
	 
    $uploads_dir_small = "files/galerie/thumb/";
    $uploads_dir_full = "files/galerie/full/";  
    
    $myPost = filter_input_array(INPUT_POST);
    $database->galerie->insert($myPost);

	$galerie_id = $database->galerie()->insert_id();

	foreach ($_FILES['attachment']['name'] as $filename) {
        
        $nazevsouboru = random_string(50);
        $image = new IMAGE($_FILES['attachment']['name'][$Kv], $_FILES['attachment']['tmp_name'][$Kv]);
        $image->resize(1200);
        $image->save($uploads_dir_full,$nazevsouboru);
        $full_name = $nazevsouboru . "." . $image->image['extension'];
        
        $image = new IMAGE($_FILES['attachment']['name'][$Kv], $_FILES['attachment']['tmp_name'][$Kv]);
        $image->resize(600);
        $image->save($uploads_dir_small,$nazevsouboru);
        $full_name = $nazevsouboru . "." . $image->image['extension'];

		mysqli_query($kv, "INSERT INTO galerie_soubory (soubor, galerie_id) values ( '" . $full_name . "', '" . $galerie_id . "')");

		$Kv++;
	}

} else {

        $myPost = filter_input_array(INPUT_POST);
        $database->galerie->insert($myPost);
}

$kv->close();
Header('Location:galerie?save-ok');
} ?>

<!doctype html>
<html class="no-js h-100" lang="cs">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Netist.cz - Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extra.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="styles/style.css">       
  </head>
  
  <style>
  .dataTables_length{margin-top: 5px;margin-left: 5px;}
  .dataTables_filter{margin-top: 5px;margin-right: 5px;}
  .btn-sm{padding:6px !important;}
  .table td, .table th {
    padding: .35rem;}
  .modal-dialog{max-width:1000px;}
  </style>
  
  <body class="h-100">
    <div class="container-fluid">
      <div class="row">
        
        <?php include_once "_sidebar.php"; ?>
        
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
        
        
          <?php include_once "_mainNavbar.php"; ?>
          
          <div class="main-content-container container-fluid px-4">

<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------Save alert---------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->
          
<?php if (isset($_GET['save-ok'])) { ?>

         <div class="row" style="margin-top:10px;">
           <div class="col-lg-12 col-md-12 col-sm-12">     
              <div class="alert alert-success" role="alert">
                  Změny byly úspěšně uloženy.
              </div>
          </div>
        </div>
              
<?php  } ?>   

<?php if (isset($_GET['delete-ok'])) { ?>

         <div class="row" style="margin-top:10px;">
           <div class="col-lg-12 col-md-12 col-sm-12">     
              <div class="alert alert-warning" role="alert">
                  Obrázek byl úspěšně vymazán.
              </div>
          </div>
        </div>
              
<?php  } ?>       
          
<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------Save alert---------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->          
          
          

<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------get UPRAVIT--------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->

          <?php if (isset($_GET['upravit'])) { 
          $edit = $database->galerie->where("id", $_GET['id'])->fetch();
          ?>
         
         <form method="post" enctype="multipart/form-data" action="?upravit&save">
         <input type="hidden" name="id" value="<?= $edit['id'] ?>"> 
               <div class="row" style="margin-top:10px;">         
                    <!-----------------Texts edit--------------------------->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                      
                      <div class="card card-small mb-4">
                        <div class="card-body p-10 pb-3 text-center">
                            <div class="form-group">
                              <strong style="float:left;">Název galerie</strong><br style="clear:both;">
                              <input type="text" name="nazev" class="form-control" value="<?= $edit['nazev'] ?>" placeholder="Název galerie">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Popis galerie</strong><br style="clear:both;">
                              <textarea name="text" id="editor1" class="form-control"><?= $edit['text'] ?></textarea>
                            </div>
                        </div>
                      </div>
                      
                      <div class="card card-small mb-4">
                        <div class="card-body p-10 pb-3 text-center">
                          <strong style="float:left;">Obrázky v galerii</strong><br style="clear:both;">
                          <div class="row" style="margin-top:10px;"> 
                          <?php foreach ($database->galerie_soubory->where("galerie_id", $edit['id']) as $zaznam) { ?>
                        
                               <div class="col-lg-2 col-md-2 col-sm-6" style="height:150px;">
                                    <div style="background: url(files/galerie/thumb/<?= $zaznam['soubor'] ?>);background-repeat: no-repeat;background-size: cover;height:80px;border:3px solid silver;">
                                    </div>
                               <a class="btn btn-sm btn-danger" href="?del&id=<?= $zaznam['id'] ?>&gal=<?= $zaznam['galerie_id'] ?>" onclick="return confirm('Opravdu si obrázek smazat?')" style="width:100%;margin-top:10px;">Smazat</a>
                               </div>
                        
                          <?php } ?>  
                           </div> 
                            
                        </div>
                      </div>
                      
                    </div>
                    <!----------------Texts edit end---------------------------->
                    
                    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      
                        <!------------------Block right-------------------------->
                        <div class="card card-small mb-4">
                            <div class="card-body p-10 pb-3 text-center">
                      
                                  <div class="form-group">
                                      <strong style="float:left;">Přidat soubory</strong><br style="clear:both;">
                                      <input type="file" name="attachment[]" multiple><br><br>
                                      </div>
                                  
                                  
                                  <div class="form-group">
                                      <strong style="float:left;">Kategorie</strong><br style="clear:both;">
                                      <select class="form-control" name="kategorie_galerie_id">
                                          <option value="<?= $edit->kategorie_galerie['id'] ?>"><?= $edit->kategorie_galerie['value'] ?></option>
                                          <option>----</option>
                                          <?php foreach ($database->kategorie_galerie->order("id ASC") as $kategorie) { ?>
                                          <option value="<?= $kategorie['id'] ?>"><?= $kategorie['value'] ?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                      
                        </div> 
                        </div>   
 
                        <!---------------Block right end----------------------------->
                        
                        <!---------------Button save----------------------------->
                        <div class="card card-small mb-4">
                            <div class="card-body p-10 pb-3 text-center">
                            
                                <button type="submit" class="btn btn-success" style="width:100%;">Uložit změny</button>
                                <a class="btn btn-secondary" href="javascript:history.back()" style="width:100%;margin-top:10px;">Zpět (úpravy nebudou uloženy)</a>
                      
                            </div>
                        </div>
                        <!---------------Button save end----------------------------->
                       
                    </div>
                  </div><!--Row end-->
            </form>
            
            
<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------get PRIDAT---------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->            


          <?php } elseif (isset($_GET['pridat'])) {?>
          
      <form enctype="multipart/form-data" method="post" action="?upravit&add">    
         <input type="hidden" name="id" value="<?= $edit['id'] ?>"> 
               <div class="row" style="margin-top:10px;">         
                    <!-----------------Texts edit--------------------------->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                      <div class="card card-small mb-4">
                        <div class="card-body p-10 pb-3 text-center">
                            <div class="form-group">
                              <strong style="float:left;">Název galerie</strong><br style="clear:both;">
                              <input type="text" name="nazev" class="form-control"  placeholder="Název galerie">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Popisný tex</strong><br style="clear:both;">
                              <textarea name="text" id="editor1" class="form-control"></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!----------------Texts edit end---------------------------->
                    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      
                        <!------------------Block right-------------------------->
                        <div class="card card-small mb-4">
                            <div class="card-body p-10 pb-3 text-center">
                          
                                  <!--<div class="form-group">
                                      <div id="files" style="display:table-caption;" data-prototype="&lt;input type=&quot;file&quot; name=&quot;attachment[]&quot; /&gt;">
                                      <input type="button" style="float:left;" class="btn btn-light" id="add-more" value="Přidat soubor..." onclick="addFile();" />
                                      <br>
                                      <br style="clear:both;">
                                      </div>
                                  </div>-->
                                  
                              <div class="form-group">
                                  <strong style="float:left;">Subory</strong><br style="clear:both;">
                                  <input type="file" name="attachment[]" multiple><br><br>
                              </div>
                              
                              <div class="form-group">
                                      <strong style="float:left;">Kategorie</strong><br style="clear:both;">
                                      <select class="form-control" name="kategorie_galerie_id">
                                          <?php foreach ($database->kategorie_galerie->order("id ASC") as $kategorie) { ?>
                                          <option value="<?= $kategorie['id'] ?>"><?= $kategorie['value'] ?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                      
                            </div>
                        </div>
                        <!---------------Block right end----------------------------->
                        
                        <!---------------Button save----------------------------->
                        <div class="card card-small mb-4">
                            <div class="card-body p-10 pb-3 text-center">
                            
                                <button type="submit" class="btn btn-success" style="width:100%;">Uložit změny</button>
                                <a class="btn btn-secondary" href="javascript:history.back()" style="width:100%;margin-top:10px;">Zpět (úpravy nebudou uloženy)</a>
                      
                            </div>
                        </div>
                        <!---------------Button save end----------------------------->
                       
                    </div>
                  </div><!--Row end-->
            </form>    
          
          <?php } else {?>
          
<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------Výpis článků-------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->          

          <div class="row" style="margin-top:10px;">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0" style="float:left;">Galerie fotografií</h6>
                    <a href="?pridat" class="btn btn-outline-primary btn-sm" style="margin-left:10px;float:right;">Přidat galerii</a>
                  </div>
                  <div class="card-body p-10 pb-3 text-center">
                    <table class="table mb-0" id="myTable">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0" style="text-align:center;">ID</th>
                          <th scope="col" class="border-0">Název</th>
                          <th scope="col" class="border-0">Kategorie</th>
                          <th scope="col" class="border-0"></th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <?php foreach ($database->galerie as $zaznam) { 
                        ?>
                        <tr>
                          <td style="text-align:center;"><?= $zaznam['id'] ?></td>
                          <td><?= $zaznam['nazev'] ?></td>
                          <td><?= $zaznam->kategorie_galerie['value'] ?></td>
                          <td><a href="?upravit&id=<?= $zaznam['id'] ?>" class="btn btn-warning btn-sm">Otevřít</a></td>
                        
                        </tr>
                        <?php } ?>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>
          
           </div>
          
          <?php include_once "_footer.php"; ?>
        </main>
      </div>
    </div>
    <script type="text/javascript">  
	   CKEDITOR.replace( 'editor1' );
       CKEDITOR.replace( 'editor2' ); 
    </script>
   

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="scripts/app/app-blog-overview.1.1.0.js"></script> 
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<script>
$('#description').keyup(function() {
    
  var characterCount = $(this).val().length,
      current = $('#current'),
      maximum = $('#maximum'),
      theCount = $('#the-count');
    
  current.text(characterCount);
  
  if (characterCount >= 100) {
    maximum.css('color', '#8f0001');
    current.css('color', '#8f0001');
    theCount.css('font-weight','bold');
  } else {
    maximum.css('color','#666');
    theCount.css('font-weight','normal');
  }
  
      
});
</script>

 

    
    <script type="text/javascript">
           $(document).ready( function () {
    $('#myTable').DataTable({
                    "language": {
            "lengthMenu": "Počet záznamů na stránce _MENU_",
            "zeroRecords": "Nic nenalezeno - omlouváme se",
            "info": "Zobrazena strana _PAGE_ z _PAGES_",
            "infoEmpty": "Žádné záznamy nejsou k dispozici",
            "infoFiltered": "(Prohledáno _MAX_ total záznamů)",
            "sLoadingRecords": "Načítám...",
          	"sProcessing":     "Provádím...",
          	"sSearch":         "Hledat:",
            "oPaginate": {
                        		"sFirst":    "První",
                        		"sLast":     "Poslední",
                        		"sNext":     "Další",
                        		"sPrevious": "Předchozí"
                        	},
                    },
                    "pageLength": 500,
                    "order": [[0, "asc"]],
                    "aoColumnDefs": [
                        {'bSortable': false, 'aTargets': [1]}
                    ]
                });
} );
        </script>



 <style>
 .form-group {
    margin-bottom: .3rem !important;
}
</style>

     <script>
$files  =   $('#files');
function addFile()
{
    if($files.find('input').length >= 10)
    {
        return;
    }                 
    $( $( '#files' ).data( 'prototype' ) ).appendTo( $files );
}
</script>
	 
  </body>
</html>