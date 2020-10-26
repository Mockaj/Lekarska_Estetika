<?php
//require_once 'admin/inc/Database.php';
require_once 'adm/inc/Database.php';
?>

<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Zákroky</title>
        
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
        <h1 class="tw-page-title uk-text-uppercase">Zákroky</h1>
    </div>
</section>

<style>
ul.uk-list li {color:black;font-size:12px;font-weight:600;background:#f6cdcb;border-radius:50px;padding:10px;}
.tw-portfolio-filter li.is-checked{color:#e62270 !important;}
.zakrokyLinks{border:2px solid white;cursor:pointer;}
.zakrokyLinks:hover{border:2px solid #f19f9b;}
.zakrokyLinks.active{border:2px solid #f19f9b;}
</style>

<section class="uk-section">
    <div class="uk-container">

        <div class="tw-element tw-portfolio tw-isotope-container" data-isotope-item=".portfolio-item">

            <div class="tw-portfolio-filter uk-text-center uk-text-uppercase">
                <ul class="uk-list">
                    
                    <?php foreach ($database->galerie->where("kategorie_galerie_id",1)->order("id ASC") as $zaznam) { ?>
                    <li class="zakrokyLinks <?php if (stripos($_SERVER['REQUEST_URI'],$zaznam['id']) !== false) {echo 'active';} ?>"><a href="?id=<?= $zaznam['id'] ?>"><?= $zaznam['nazev'] ?></a></li>
                    <?php } ?>
                    
                </ul>
            </div>

            <div class="isotope-container uk-grid-collapse tw-calc-width uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-4@l" data-uk-grid data-uk-scrollspy="target: > .portfolio-item; cls:uk-animation-slide-bottom-medium; delay: 400;">

               
         <?php if (isset($_GET['id'])) { ?>
         
         
            <?php foreach ($database->galerie_soubory->where("galerie_id",$_GET['id'])->order("id DESC") as $zaznam) { ?>
                <div class="portfolio-item">
                    <div class="portfolio-inner uk-text-center">
                        <div class="portfolio-media">
                            <a href="fotografie?id=<?= $zaznam['id'] ?>" class="tw-image-hover">
                                <img src="/adm/files/galerie/thumb/<?= $zaznam['soubor'] ?>" alt="" />
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h3 class="portfolio-title"><a href="#"><?//= $zaznam['popis'] ?></a></h3>
                        </div>
                    </div>
                </div> 
                 <?php } ?>
                 
             <?php } ?>    
             
                     

                <div class="grid-sizer"></div>

            </div>
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