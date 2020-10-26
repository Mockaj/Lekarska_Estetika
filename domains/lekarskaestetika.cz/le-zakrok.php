<?php
require_once 'admin/inc/Database.php';
?>
<?php
    $zaznam = $database->le_zakroky->where("id", $_GET['id'])->fetch();
?>
<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title><?= $zaznam['title'] ?> - LekarskaEstetika.cz</title>
<meta content="<?= $zaznam['description'] ?>" name="description"/>
<meta content="" property="og:title"/>
<meta content="" property="og:description"/>
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
    data-overlay="0.4" style=" background-image: url(assets/images/stranky/sluzby.jpg); height: 250px;">
    <div class="tw-page-title-container tw-element">
        <h1 class="tw-page-title uk-text-uppercase"><?= $zaznam['nazev'] ?> </h1>
    </div>
</section>

<section class="uk-section uk-section-blog">
    <div class="uk-container">

        <div data-uk-grid>

            <div class="content-area uk-width-expand">

                <article class="single post">
                    <div class="entry-post">
                        
                   
                        
                        <div class="entry-content">
                        
                        
                         <?= $zaznam['obsah'] ?>
                        
                        </div>
                       
                        
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