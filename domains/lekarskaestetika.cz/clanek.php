<?php
require_once 'adm/inc/Database.php';
$zaznam = $database->clanky->where("url", $_GET['url'])->fetch();
?>
<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title><?= $zaznam['nadpis'] ?> - Lekarskaestetika.cz</title>
        
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
        <h1 class="tw-page-title uk-text-uppercase"><?= $zaznam['nadpis'] ?></h1>
    </div>
</section>

<section class="uk-section uk-section-blog">
    <div class="uk-container">

        <div data-uk-grid>

            <div class="content-area uk-width-expand">

                <article class="single post">
                    <div class="entry-post">
                        
                        
                        <h2 class="entry-title">
                            <?= $zaznam['nadpis'] ?>
                        </h2>
                        <div class="entry-date tw-meta">
                            <span><?= $zaznam['datum'] ?></span> 
                           <!-- <span class="entry-author">Napsal&nbsp;MUDr. Hustá Michaela</span>-->
                        </div>
                        
                        <div class="entry-content">
                          <?= $zaznam['text'] ?>
                        </div>
                       
                        
                    </div>
                </article>

                <!--<div class="tw-author">
                    <div class="author-box">
                        <img alt="" src="assets/images/mh.png" class="avatar" />
                        <h3><a href="#" title="Posts by admin" rel="author">MUDr. Michaela Hustá</a></h3>
                        <p>Stručný popis o MUDr. Michaele Husté. Prosím o doplnění do emailu. Základní info v rozsahu cca 3 - 4 vět. Děkuji.</p>
                        <br>    
                        <a href="#" class="uk-button uk-button-default uk-button-small uk-button-radius">Životopis</a>
                        <a href="#" class="uk-button uk-button-default uk-button-small uk-button-radius">Hodnocení lékaře</a>
                            
                    </div>
                </div>   -->


            </div>

            <div class="sidebar-area">
                <div class="sidebar-inner" data-uk-sticky="bottom: true;offset: 40">

                   

                    <div class="widget-item">
                        <aside class="widget tw-text-widget">
                            <img src="/adm/files/clanky/thumb/<?= $zaznam['pic'] ?>" alt="" />
                        </aside>
                    </div>

                    <div class="widget-item">
                        <aside class="widget tw-post-widget">
                            <h3 class="widget-title"><span>Nejnovější články</span></h3>
                            <ul>
                                
                                <?php
                            foreach ($database->clanky->order("id DESC")->limit(5) as $zaznam) {
                                ?>
                                <li>
                                    <div class="recent-thumb">
                                        <a href="/aktuality/<?= $zaznam['url'] ?>/"><img src="/adm/files/clanky/thumb/<?= $zaznam['pic'] ?>" alt=""></a>
                                    </div>
                                    <div class="recent-content">
                                        <h4><a href="/aktuality/<?= $zaznam['url'] ?>/"><?= $zaznam['nadpis'] ?></a></h4>
                                        <span class="entry-date"><?= $zaznam['datum'] ?></span>
                                    </div>
                                </li>
                                
                                <?php
                            }
                            ?>
                                
                               
                            </ul>
                        </aside>
                    </div>

                    
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