<?php
require_once 'inc/Database.php';
require_once 'ajax/safe.php';
require_once 'class.upload.php';
$klient_name = $database->adm_core("name", "klient_name")->fetch();
$klient_url = $database->adm_core("name", "klient_url")->fetch();
 if (isset($_GET['save'])) { 

        $myPost = filter_input_array(INPUT_POST);
        $id = $myPost['id'];
        unset($myPost['id']);
        $myPost['password'] = sha1($myPost['password']);
        $database->uzivatele->where("id", $id)->update($myPost);
        Header('Location:uzivatele?save-ok');

}  if (isset($_GET['add'])) { 

        $myPost = filter_input_array(INPUT_POST);
        $myPost['password'] = sha1($myPost['password']);
        $database->uzivatele->insert($myPost);
        Header('Location: uzivatele');

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
          
<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------Save alert---------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->          
          
          

<!-------------------------------------------------------------------------------------------------------------->
<!------------------------------------------get UPRAVIT--------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->

          <?php if (isset($_GET['upravit'])) { 
          $edit = $database->stranky->where("id", $_GET['id'])->fetch();
          ?>
         
         <form method="post" enctype="multipart/form-data" action="?upravit&save">
         <input type="hidden" name="id" value="<?= $edit['id'] ?>"> 
               <div class="row" style="margin-top:10px;">         
                    <!-----------------Texts edit--------------------------->
                    <div class="col-lg-8 col-md-12 col-sm-12">
                      <div class="card card-small mb-4">
                        <div class="card-body p-10 pb-3 text-center">
                            <div class="form-group">
                              <strong style="float:left;">Název stránky</strong><br style="clear:both;">
                              <input type="text" name="nadpis" class="form-control" value="<?= $edit['nadpis'] ?>" placeholder="Nadpis článku">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Hlavní obsah</strong><br style="clear:both;">
                              <textarea name="text" id="editor1" class="form-control"><?= $edit['text'] ?></textarea>
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Doplňující obsah</strong><br style="clear:both;">
                              <textarea name="text_short" id="editor2" class="form-control"><?= $edit['text_short'] ?></textarea>
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
                                      <img src="files/stranky/full/<?= $edit['pic'] ?>" style="width:100%;">
                                  </div>
                                  
                                  <div class="form-group">
                                      <strong style="float:left;">Změna obrázku</strong><br style="clear:both;">
                                      <input type="file" name="photo" class="form-control">
                                  </div>
                                  
                                  <div class="form-group">
                                      <strong style="float:left;">Kategorie</strong><br style="clear:both;">
                                      <select class="form-control" name="kategorie_stranky_id">
                                          <option value="<?= $edit->kategorie_stranky['id'] ?>"><?= $edit->kategorie_stranky['value'] ?></option>
                                          <option>----</option>
                                          <?php foreach ($database->kategorie_stranky->order("id ASC") as $kategorie) { ?>
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
                              <strong style="float:left;">Uživatelské jméno</strong><br style="clear:both;">
                              <input type="text" name="name" class="form-control"  placeholder="Uživatelské jméno">
                            </div>
                            <div class="form-group">
                              <strong style="float:left;">Heslo</strong><br style="clear:both;">
                              <input type="text" name="password" class="form-control"  placeholder="Heslo">
                            </div>
                        </div>
                      </div>
                    </div>
                    <!----------------Texts edit end---------------------------->
                    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                      
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
<!------------------------------------------Výpis uživatelů-------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------->          

          <div class="row" style="margin-top:10px;">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0" style="float:left;">Správa uživatelů</h6>
                    <a href="?pridat" class="btn btn-outline-primary btn-sm" style="margin-left:10px;float:right;">Přidat uživatele</a>
                  </div>
                  <div class="card-body p-10 pb-3 text-center">
                    <table class="table mb-0" id="myTable">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-0" style="text-align:center;">ID</th>
                          <th scope="col" class="border-0">Uživatelské jméno</th>
                          <th scope="col" class="border-0">Heslo</th>
                        </tr>
                      </thead>
                      <tbody>
                      
                        <?php foreach ($database->uzivatele as $zaznam) { 
                        ?>
                        <tr>
                          <td style="text-align:center;"><?= $zaznam['id'] ?></td>
                          <td><?= $zaznam['name'] ?></td>
                          <td>
                            <form method="post" action="?upravit&save">
                                <input type="hidden" name="id" value="<?= $zaznam['id'] ?>">
                                <input type="password" class="form-control" name="password" placeholder="******" style="width:200px;float:left;">
                                <button type="submit" class="btn btn-success" style="margin-left:10px;">Uložit nové heslo</button>
                            </form>
                          </td>
                                                
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
	 
  </body>
</html>