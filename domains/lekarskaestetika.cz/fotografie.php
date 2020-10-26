<?php
require_once 'adm/inc/Database.php';
?>
<?php
$zaznam = $database->galerie_soubory->where("id", $_GET['id'])->fetch();
?>

<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Fotografie</title>
        
<!--Head-->
<?php include_once "include/head.php"; ?>
<!--Head end-->
       
</head>
<style>
ul.uk-list li {color:black;font-size:12px;font-weight:600;background:#f6cdcb;border-radius:50px;padding:10px;}
.tw-portfolio-filter li.is-checked{color:#e62270 !important;}
.zakrokyLinks{border:2px solid white;cursor:pointer;}
.zakrokyLinks:hover{border:2px solid #f19f9b;}
.zakrokyLinks.active{border:2px solid #f19f9b;}
</style>
    <body class="loading"><div class="tw-preloader"><div data-uk-spinner></div></div><div class="header-container tw-header tw-header-transparent uk-light">
    <!--Navigation-->
    <?php include_once "include/navigation.php"; ?>
    <!--Navigation end-->
    
</div><!-- .main-container close -->
<div class="main-container">
<section class="uk-section uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center"
    data-overlay="0.4" style=" background-image: url(assets/images/stranky/sluzby.jpg); height: 250px;">
    <div class="tw-page-title-container tw-element">
        <h1 class="tw-page-title uk-text-uppercase">Fotografie zákroku</h1>
    </div>
</section>

<section class="uk-section uk-section-large">
    <div class="uk-container">
        <div class="text-center" style="text-align:center;">
        
        
        <div class="tw-portfolio-filter uk-text-center uk-text-uppercase">
                <ul class="uk-list">
                    <li class="zakrokyLinks"><a onclick="goBack()">Zpět do galerie</a></li>
                </ul>
            </div>    

<script>
function goBack() {
  window.history.back();
}
</script>    
            
        <img src="adm/files/galerie/full/<?= $zaznam['soubor'] ?>">
            
            
            
        </div>

       

        
    </div>
</section>


<!--Footer-->
<?php include_once "include/footer.php"; ?>
<!--Footer end-->


</div>
<!-- .main-container close -->        
<!--Scripts-->
<?php include_once "include/script.php"; ?>
<!--Scripts end-->
    </body>

</html>