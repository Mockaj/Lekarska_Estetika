<?php
require_once 'adm/inc/Database.php';
$zaznam = $database->stranky->where("id", 1)->fetch();
?>
<?php
//$zaznam = $database->o_nas->fetch();
?>

<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - <?= $zaznam['title'] ?></title>
        
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
        <h1 class="tw-page-title uk-text-uppercase">O nás</h1>
    </div>
</section>

<section class="uk-section uk-section-large" style="padding-bottom:0px !important;">
    <div class="uk-container">
    
    <h3 style="text-align:center;font-weight:600;">Náš tým</h3>
    
    
        <div class="cert uk-child-width-1-1@s uk-child-width-1-4@m uk-child-width-1-4@l uk-child-width-1-4@xl uk-grid-collapse" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-fade; delay: 200;">
                <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/12.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                MUDr. Michaela Hustá
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            Vedoucí lékař<br>Operatér - estetický chirurg<br>MD Codes trenér spol. Allergan
                            </p>
                            <div class="entry-content">
                                <p class="more-link"><a href="michaela-husta" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div>
                        </div>
                    </article>
   
                    
                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/9.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                MUDr. Eva Jarošová
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            Specializace na okuloplastické zákroky
                            </p>
                            <div class="entry-content">
                                <p class="more-link"><a href="eva-jarosova" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div>
                        </div>
                    </article>
                    
                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/kundratova.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                MUDr. Ivana Kundrátová
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            Specializace na okuloplastické zákroky
                            </p>
                            <!--<div class="entry-content">
                                <p class="more-link"><a href="eva-jarosova" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div>    -->
                        </div>
                    </article>

                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/cajkova.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                MDDr. Hana Čajková
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            Specializace na aplikaci výplňových materiálů a botulotoxinu
                            </p>
                            <!--<div class="entry-content">
                                <p class="more-link"><a href="aneta-rusinova" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div> -->
                        </div>
                    </article>
                    
                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/rusinoevae.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                Mgr. Aneta Rusinová
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            Vedoucí sestra<br>Asistence u chirurgických výkonů<br>PhiAcademy Artist - specializace na permanentní make-up (PhiBrows, PhiLips, PhiLiner)<br>CoolSculpting specialista
                            </p>
                            <div class="entry-content">
                                <p class="more-link"><a href="aneta-rusinova" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a></p>
                            </div>
                        </div>
                    </article>
                    
                    
                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/slizova.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                Andrea Sližová
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            CoolSculpting Project Manager
                            </p>
                        </div>
                    </article>
                    
                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/ningerova.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                Ing. Petra Ningerová
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                             PR Manager + marketing
                            </p>
                        </div>
                    </article>
                    
                    <article class="post" style="padding:5px;">
                        <div class="entry-post">
                            <div class="entry-media">
                                <div class="tw-thumbnail" data-uk-lightbox>
                        <div class="image" style="width:100%;height:300px;background-image:url('admin/files/personal/full/puzonova.jpg');background-repeat: no-repeat;background-size: cover;">
                                </div>
                            </div>
                            <h2 class="entry-title" style="font-size:16px;font-weight:600;margin-top:15px;color:#e5007d;">
                                Martina Puzoňová
                            </h2>
                            <p style="text-align:center;font-size:17px;line-height:1;">
                            Zdravotní sestra<br>Asistence u chirurgických výkonů<br>Skin Quality Artist - specializace chem. peeling
                            </p>
                        </div>
                    </article>

         
                    
                  
                    
                    
                    
          
                    
                    
                   
                    
                    
        
        </div>
    </div>
</section>


<section class="uk-section uk-section-large">
    <div class="uk-container">
        <div class="text-left">            
            <?= $zaznam['text'] ?> </div><div>
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