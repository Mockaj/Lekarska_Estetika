<?php
require_once 'admin/inc/Database.php';
?>
<?php
   $zaznam = $database->le_cenik->fetch();
?>

<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Ceník</title>
        
<!--Head-->
<?php include_once "include/head.php"; ?>
<!--Head end-->
       
</head>
    <body class="loading"><div class="tw-preloader"><div data-uk-spinner></div></div><div class="header-container tw-header tw-header-transparent uk-light">
    <!--Navigation-->
    <?php include_once "include/navigation.php"; ?>
    <!--Navigation end-->
    
</div><!-- .main-container close -->
<div class="main-container">
<section class="uk-section uk-text-center uk-flex uk-flex-middle uk-flex-center uk-light uk-background-cover uk-background-top-center"
    data-overlay="0.4" style=" background-image: url(assets/images/stranky/sluzby.jpg); height: 250px;">
    <div class="tw-page-title-container tw-element">
        <h1 class="tw-page-title uk-text-uppercase">Studio lékařské estetiky - Ceník </h1>
    </div>
</section>

<section class="uk-section uk-text-left">
    <div class="uk-container">
<style>
.rightalign{text-align:right;}
</style>

<div class="tw-element tw-table">
                    <?= $zaznam['obsah'] ?>
                </div>

</div>

<!--<div class="uk-container uk-text-center">                                
<a href="admin/files/cenik.pdf" target="_blank" class="uk-button uk-button-default uk-button-radius uk-margin-bottom">Stáhnout ceník v PDF</a>                
</div>-->

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