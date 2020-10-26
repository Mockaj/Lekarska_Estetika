<?php
require_once 'admin/inc/Database.php';
?>
<?php
   $zaznam = $database->studio->fetch();
?>

<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Studio Lékařské estetiky</title>
        
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
        <h1 class="tw-page-title uk-text-uppercase">Studio Lékařské estetiky</h1>
    </div>
</section>

<section class="uk-section uk-section-large">
    <div class="uk-container">
        <div class="text-left">            
            <?= $zaznam['obsah'] ?> </div><div>
<!--<br><p>
<blockquote style="color:#e5007d;font-weight:600;font-size:14px;font-style:italic;">Vážené dámy a pánové,<br><br>
velmi si vážím, že jste si k ošetření vybrali beskydské estetické centrum. Těším se na setkání, ráda vám během konzultace zodpovím veškeré dotazy a společně najdeme metodu, která je pro řešení vašeho problému nejen nejvhodnější, ale i vám nejbližší. naším cílem je poskytovat komplexní péči a spojit nejnovější poznatky estetické medicíny s vysoce individuálním přístupem a profesionalitou. Posuďte sami, zda-li se nám to daří.</blockquote>
</p>         
        </div>
    </div>  -->
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