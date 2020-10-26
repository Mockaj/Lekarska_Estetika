<?php
require_once 'adm/inc/Database.php';
?>
<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Aktuality</title>
        
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
        <h1 class="tw-page-title uk-text-uppercase">Aktuality a články</h1>
    </div>
</section>

<section class="uk-section uk-section-blog">
    <div class="uk-container">

        <div data-uk-grid>

            <div class="content-area uk-width-expand">

                <div class="tw-element tw-blog grid-blog uk-child-width-1-2@s uk-child-width-1-3@m" data-uk-grid data-uk-scrollspy="target: > article; cls:uk-animation-slide-bottom-small; delay: 300;">

                  
                   <?php
                            foreach ($database->clanky->where("kategorie_clanky_id",1)->order("datum DESC") as $zaznam) {
                                ?> 
                                
                               
                  
                    <article class="post">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:200px;background-image:url('adm/files/clanky/thumb/<?= $zaznam['pic'] ?>');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>

                            <h2 class="entry-title" style="margin-top:10px;">
                                <?//= substr($zaznam['nadpis'], 0, 25) ?>
                                <?= $zaznam['nadpis'] ?> 
                            </h2>
                            <div class="entry-content">
                                <p class="more-link"><a href="aktuality/<?= $zaznam['url'] ?>/" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div>
                        </div>
                    </article>
                    
                   
                    
                  <?php
                            }
                            ?> 
                   
                   
                   
                   
                   
                   
                   <?php
                            foreach ($database->novinky->where("topovani = 0")->order("datum DESC") as $zaznam) {
                                ?> 
                                
                                <?php
                        $text = $zaznam['obsah'];
                        $limit = "60";
                        ?>
                  
                  
                    <article class="post">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:200px;background-image:url('admin/files/clanky/thumb/<?= $zaznam['pic'] ?>');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>

                            <h2 class="entry-title" style="margin-top:10px;">
                                <?= substr($zaznam['nadpis'], 0, 25) ?> ...
                            </h2>
                            <div class="entry-content">
                                <?php
if (strlen($text) <= $limit) {
    echo $text;
} else {
    $text = substr($text, 0, $limit+1);
    $pos = strrpos($text, " "); // v PHP 5 by se dal použít parametr offset
    echo substr($text, 0, ($pos ? $pos : -1)) . "...";
}
?>
                                <p class="more-link"><a href="clanek?id=<?= $zaznam['id'] ?>" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div>
                        </div>
                    </article>
                    
                   
                    
                  <?php
                            }
                            ?>  
                    
                  
                  
                    
              
                </div>


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