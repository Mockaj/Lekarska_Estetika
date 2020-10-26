<?php
require_once 'admin/inc/Database.php';
?>

<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Zákroky LE studio</title>
        
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
        <h1 class="tw-page-title uk-text-uppercase">Studio lékařské estetiky - zákroky</h1>
    </div>
</section>

<section class="uk-section">
    <div class="uk-container">
        
        <div class="tw-element uk-child-width-1-2@s uk-child-width-1-4@m" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-top-medium; delay: 300;">
            
          <?php
                            foreach ($database->le_zakroky->order("id ASC") as $zaznam) {
                                ?>  
            
            <div>
                <div class="tw-element tw-box">
                    <div style="min-height:50px;">
                    <h4>
                        <?= $zaznam['nazev'] ?>
                    </h4>
                    </div>
                    <p class="description">
                       <?= substr($zaznam['obsah'], 0, 85) ?>...
                    </p>
                    <a href="le-zakrok?id=<?= $zaznam['id'] ?>" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a>
                </div>
            </div>
            
            
           
                 <?php
                            }
                            ?>


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