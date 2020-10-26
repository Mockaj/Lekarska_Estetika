<?php
require_once 'inc/Database.php';
require_once 'ajax/safe.php';
require_once 'class.upload.php';
$klient_name = $database->adm_core("name", "klient_name")->fetch();
$klient_url = $database->adm_core("name", "klient_url")->fetch();
 
if (isset($_GET['del'])) { 
  $database->clanky->where("id", $_GET['id'])->delete();
  Header('Location:clanky?delete-ok');
} if (isset($_GET['save'])) { 

    $handle = new upload($_FILES['photo']);
    if ($handle->uploaded) {
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 1000;
    $handle->image_x = 1000;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 75;
    $handle->process("files/clanky/full/");
    
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 400;
    $handle->image_x = 400;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 65;
    $handle->process("files/clanky/thumb/");

    if ($handle->processed) {
        $file = $handle->file_dst_name;
        $handle->clean();
        $myPost = filter_input_array(INPUT_POST);
        $myPost['pic'] = $file;
        $id = $myPost['id'];
        unset($myPost['id']);
        $database->clanky->where("id", $id)->update($myPost);
        Header('Location:clanky?upravit&id='. $id .'&save-ok');        
    } else {
        echo 'error : ' . $handle->error;
    }
} else {
        $myPost = filter_input_array(INPUT_POST);
        $id = $myPost['id'];
        unset($myPost['id']);
        unset($myPost['photo']);
        $database->clanky->where("id", $id)->update($myPost);
        Header('Location:clanky?upravit&id='. $id .'&save-ok');
    }
}  if (isset($_GET['add'])) { 
    $handle = new upload($_FILES['photo']);
    if ($handle->uploaded) {
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 1000;
    $handle->image_x = 1000;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 75;
    $handle->process("files/clanky/full/");
    
    $handle->image_resize = true;
    $handle->image_ratio = true;
    $handle->image_no_enlarging = true;
    $handle->image_y = 400;
    $handle->image_x = 400;
    $handle->image_convert = 'jpg';
    $handle->jpeg_quality = 65;
    $handle->process("files/clanky/thumb/");

    if ($handle->processed) {
        $file = $handle->file_dst_name;
        $handle->clean();

        $myPost = filter_input_array(INPUT_POST);
        $myPost['pic'] = $file;
        $database->clanky->insert($myPost);
        
        Header('Location:clanky');
        
    } else {
        echo 'error : ' . $handle->error;
    }
} else {
        $myPost = filter_input_array(INPUT_POST);
        $fotka = 'photo.jpg';
        $myPost['pic'] = $fotka;
        $database->clanky->insert($myPost);
        Header('Location: clanky');
    } 
} if (isset($_GET['savePoradi'])) { 

        $myPost = filter_input_array(INPUT_POST);
        $id = $myPost['id'];
        unset($myPost['id']);
        $database->clanky->where("id", $id)->update($myPost);
        Header('Location:clanky?save-ok');

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
                  Záznam byl úspěšně vymazán.
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
          $edit = $database->clanky->where("id", $_GET['id'])->fetch();
          ?>
         
         <form method="post" enctype="multipart/form-data" action="?upravit&save">
         <input type="hidden" name="id" value="<?= $edit['id'] ?>"> 
               <div class="row" style="margin-top:10px;">         
                    <!-----------------Texts edit--------------------------->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                      <div class="card card-small mb-4">
                        <div class="card-body p-10 pb-3 text-center">
                            <div class="form-group">
                              <strong style="float:left;">Nadpis</strong><br style="clear:both;">
                              <input type="text" name="nadpis" class="form-control" value="<?= $edit['nadpis'] ?>" placeholder="Nadpis článku" pretty-url="nice-url">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">URL</strong><br style="clear:both;">
                              <input type="text" name="url" class="form-control" value="<?= $edit['url'] ?>" placeholder="URL adresa" id="nice-url">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Krátký text</strong><br style="clear:both;">
                              <textarea name="text_short" id="editor1" class="form-control"><?= $edit['text_short'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Celý text</strong><br style="clear:both;">
                              <textarea name="text" id="editor2" class="form-control"><?= $edit['text'] ?></textarea>
                            </div>
                        </div>
                      </div>
                    </div>
                    <!----------------Texts edit end---------------------------->
                    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      
                        <!------------------Block right-------------------------->
                        <div class="card card-small mb-4">
                            <div class="card-body p-10 pb-3 text-center">
                      
                                  <div style="margin-bottom:20px;">
                                      <img src="files/clanky/full/<?= $edit['pic'] ?>" style="width:100%;">
                                  </div>
                                  
                                  <div class="form-group">
                                      <strong style="float:left;">Změna obrázku</strong><br style="clear:both;">
                                      <input type="file" name="photo" class="form-control">
                                  </div>
                                  
                                  <div class="form-group">
                                      <strong style="float:left;">Kategorie</strong><br style="clear:both;">
                                      <select class="form-control" name="kategorie_clanky_id">
                                          <option value="<?= $edit->kategorie_clanky['id'] ?>"><?= $edit->kategorie_clanky['value'] ?></option>
                                          <option>----</option>
                                          <?php foreach ($database->kategorie_clanky->order("id ASC") as $kategorie) { ?>
                                          <option value="<?= $kategorie['id'] ?>"><?= $kategorie['value'] ?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                                    
                                    <div class="form-group">
                                      <strong style="float:left;">META Title</strong><br style="clear:both;">
                                      <input type="text" class="form-control" name="title" value="<?= $edit['title'] ?>">
                                    </div>
                                    
                                    <div class="form-group">
                                      <strong style="float:left;">META Description</strong><br style="clear:both;">
                                      <textarea id="description" class="form-control" name="description" style="height:100px;" maxlength="150"><?= $edit['description'] ?></textarea>
                                    </div>
                                    <div id="the-count">
                                      <span id="current">0</span>
                                      <span id="maximum">/ 150</span>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                      <strong style="float:left;">Přiřadit galerii</strong><br style="clear:both;">
                                      <select class="form-control" name="galerie_id">
                                          <option value="<?= $edit->galerie['id'] ?>"><?= $edit->galerie['nazev'] ?></option>
                                          <option value="0">Žádná galerie</option>
                                          <option>----</option>
                                          <?php foreach ($database->galerie->order("id ASC") as $gal) { ?>
                                          <option value="<?= $gal['id'] ?>"><?= $gal['nazev'] ?></option>
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
                              <strong style="float:left;">Nadpis</strong><br style="clear:both;">
                              <input type="text" name="nadpis" class="form-control"  placeholder="Nadpis článku" pretty-url="nice-url">
                            </div>                            
                            <div class="form-group">
                              <strong style="float:left;">URL</strong><br style="clear:both;">
                              <input type="text" name="url" class="form-control"  placeholder="URL adresa" id="nice-url">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Krátký text</strong><br style="clear:both;">
                              <textarea name="text_short" id="editor1" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Celý text</strong><br style="clear:both;">
                              <textarea name="text" id="editor2" class="form-control"></textarea>
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
                                      <strong style="float:left;">Náhledový obrázek</strong><br style="clear:both;">
                                      <input type="file" name="photo" class="form-control">
                                  </div>
                                  
                                  <div class="form-group">
                                      <strong style="float:left;">Kategorie</strong><br style="clear:both;">
                                      <select class="form-control" name="kategorie_clanky_id">
                                          <?php foreach ($database->kategorie_clanky->order("id ASC") as $kategorie) { ?>
                                          <option value="<?= $kategorie['id'] ?>"><?= $kategorie['value'] ?></option>
                                          <?php } ?>
                                      </select>
                                    </div>
                                    
                                    <div class="form-group">
                                      <strong style="float:left;">META Title</strong><br style="clear:both;">
                                      <input type="text" class="form-control" name="title" placeholder="Title">
                                    </div>
                                    
                                    <div class="form-group">
                                      <strong style="float:left;">META Description</strong><br style="clear:both;">
                                      <textarea id="description" class="form-control" name="description" style="height:100px;" maxlength="150"></textarea>
                                    </div>
                                    <div id="the-count">
                                      <span id="current">0</span>
                                      <span id="maximum">/ 150</span>
                                    </div>
                                    
                                    <div class="form-group">
                                      <strong style="float:left;">Přiřadit galerii</strong><br style="clear:both;">
                                      <select class="form-control" name="galerie_id">
                                          <option value="0">Žádná galerie</option>
                                          <option>----</option>
                                          <?php foreach ($database->galerie->order("id ASC") as $gal) { ?>
                                          <option value="<?= $gal['id'] ?>"><?= $gal['nazev'] ?></option>
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
                    
                    <?php foreach ($database->kategorie_clanky as $zaznam) { ?>
                        <a href="?kategorie=<?= $zaznam['id'] ?>" class="btn btn-outline-primary btn-sm <?php if (stripos($_SERVER['REQUEST_URI'],$zaznam['id']) !== false) {echo 'active';} ?>"><?= $zaznam['value'] ?></a>
                    <?php } ?>
                    
                    <a href="?pridat" class="btn btn-outline-primary btn-sm" style="margin-left:10px;float:right;">Přidat článek</a>
                  </div>
                  <div class="card-body p-10 pb-3 text-center">
                    <table class="table mb-0" id="myTable">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0" style="display:none;">ID</th>
                          <th scope="col" class="border-0">Obrázek</th>
                          <th scope="col" class="border-0">Nadpis</th>
                          <th scope="col" class="border-0">Zveřejněno</th>
                          <th scope="col" class="border-0">Poslední úprava</th>
                          <th scope="col" class="border-0">Kategorie</th>
                          <th scope="col" class="border-0">Pořadí</th>
                          <th scope="col" class="border-0"></th>
                          <th scope="col" class="border-0"></th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <?php 
                        if(isset($_GET['kategorie'])) {
                        foreach ($database->clanky->where("kategorie_clanky_id", $_GET['kategorie'])->order("poradi ASC") as $zaznam) { 
                        $prevodDatum = new DateTime($zaznam["datum"]);
                        $zaznam["datum"]  = $prevodDatum->format('d.m.Y H:i');
                        $prevodDatum_edit = new DateTime($zaznam["datum_edit"]);
                        $zaznam["datum_edit"]  = $prevodDatum_edit->format('d.m.Y H:i');
                        ?>
                        <tr>
                          <td style="display:none;"><?= $zaznam['id'] ?></td>
                          <td><img class="imgNahled" src="files/clanky/thumb/<?= $zaznam['pic'] ?>"></td>
                          <td><?= $zaznam['nadpis'] ?></td>
                          <td><?= $zaznam['datum'] ?></td>
                          <td><?= $zaznam['datum_edit'] ?></td>
                          <td><?= $zaznam->kategorie_clanky['value'] ?></td>
                          <td>
                            <form method="post" action="?upravit&savePoradi">
                                <input type="hidden" name="id" value="<?= $zaznam['id'] ?>">
                                <input type="text" class="form-control" name="poradi" value="<?= $zaznam['poradi'] ?>" style="width:50px;float:left;">
                                <button type="submit" class="btn btn-success" style="margin-left:1px;">Uložit poř.</button>
                            </form>
                          </td>
                          <td><a href="?upravit&id=<?= $zaznam['id'] ?>" class="btn btn-warning btn-sm">Otevřít</a></td>
                          <td><a href="?del&id=<?= $zaznam['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Opravdu si přejete článek <?= $zaznam['nadpis'] ?> smazat?')">Smazat</a></td>
                        
                        </tr>
                        <?php }} ?>                        
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
    <script src="js/url.js"></script>

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
                    "order": [[0, "desc"]],
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
	 
  </body>
</html>