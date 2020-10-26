<?php
require_once 'adm/inc/Database.php';
//$zaznam = $database->pristroje->where("id", $_GET['id'])->fetch();
$zaznam = $database->clanky->where("url", $_GET['url'])->fetch();
?>
<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title><?= $zaznam['title'] ?> - Lekarskaestetika.cz</title>
<meta content="<?= $zaznam['description'] ?>" name="description"/>
<meta content="<?= $zaznam['title'] ?>" property="og:title"/>
<meta content="<?= $zaznam['description'] ?>" property="og:description"/>
<meta content="LekarskaEstetika" property="og:type" />    
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
    data-overlay="0.4" style=" background-image: url(/assets/images/stranky/sluzby.jpg); height: 250px;">
    <div class="tw-page-title-container tw-element">
        <h1 class="tw-page-title uk-text-uppercase"><?= $zaznam['nadpis'] ?> </h1>
    </div>
</section>

<section class="uk-section uk-section-blog">
    <div class="uk-container">

        <div data-uk-grid>

            <div class="content-area uk-width-expand">

                <article class="single post">
                    <div class="entry-post">
                        
                   
                        
                        <div class="entry-content">
                        
                        
                         <?= $zaznam['text'] ?>
                        
                        </div>
                        
            <?php if ($zaznam['galerie_id'] != 0) { ?>
            
            <h3 style="font-weight:600;">Galerie výsledků po zákroku</h3>            
            <div class="isotope-container uk-grid-collapse tw-calc-width uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-1-3@m uk-child-width-1-6@l" data-uk-grid data-uk-scrollspy="target: > .portfolio-item; cls:uk-animation-slide-bottom-medium; delay: 400;">                             
                  <?php foreach ($database->galerie_soubory->where("galerie_id",$zaznam['galerie_id'])->order("id DESC") as $zaznam) { ?>
                <div class="portfolio-item">
                    <div class="portfolio-inner uk-text-center">
                        <div class="portfolio-media">
                            <a href="/fotografie?id=<?= $zaznam['id'] ?>" class="tw-image-hover">
                                <img src="/adm/files/galerie/thumb/<?= $zaznam['soubor'] ?>" alt="" />
                            </a>
                        </div>
                        <div class="portfolio-content">
                            <h3 class="portfolio-title"><a href="#"><?//= $zaznam['popis'] ?></a></h3>
                        </div>
                    </div>
                </div> 
                 <?php } ?>
            </div>
            
            <?php } ?>  
                       
                        
                    </div>
                </article>

              
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