<?php
require_once 'adm/inc/Database.php'; 
$warning_box = $database->general("name", "warning_box")->fetch();
?>
<!DOCTYPE html>
<html lang="cs">
<head>
      
<title>LékařskáEstetika.cz</title>        
<!--Head-->
<?php include_once "include/head.php"; ?>
<!--Head end-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>       
</head>

    

    <script type="text/javascript">
        window.onload = function() {
            Sticker.init('.sticker');
        }
    </script>
    
    
    <body class="loading"><div class="tw-preloader"><div data-uk-spinner></div></div><div class="header-container tw-header tw-header-transparent uk-light">




    <!--Navigation-->
    <?php include_once "include/navigation.php"; ?>
    <!--Navigation end-->
    
</div>


<!-- .main-container close -->
<div class="main-container">

<div class="main-container"><section class="tw-slider tw-slider-fullscreen uk-light" data-uk-height-viewport="offset-top: true">
   
  <div class=" owl-theme">

        <div class="slider-item" data-overlay="0.4" style="background-image: url(assets/images/slider/banner4.jpg);"
            data-uk-height-viewport="offset-top: true">
            <div class="slider-content">
                <div class="tw-element uk-text-center full tw-heading">

                    <h1>                
                                        <img src="assets/images/logo.png" style="width:200px;margin:0 auto;margin-bottom:20px;">
                        <span style="color:black;">LÉKAŘSKÁ</span> <span style="color:#e5007d;">ESTETIKA</span>
                    </h1>
                    <h3 style="color:black;font-weight:600;">Nejkrásnější křivkou každé tváře je úsměv</h3>
                    <a href="o-nas" class="uk-button uk-button-default uk-button-small uk-button-radius tw-hover edit" style="margin-top:10px;">
                        <span class="tw-hover-inner"><span>O nás</span><i class="ion-ios-arrow-thin-right"></i></span>
                    </a>
                    <br>
                    <a href="problemove-partie-coolsculpting" target="_blank" class="uk-button uk-button-default uk-button-normal uk-button-radius tw-hover edit" style="margin-top:10px;">
                        <span class="tw-hover-inner"><span>NOVINKA: <strong>coolsculpting<strong></span><i class="ion-ios-arrow-thin-right"></i></span>
                    </a>
                </div>
            </div>
        </div>
        
    </div>

<style>
.edit{background-color: #e5017e !important;border-color: rgb(255, 255, 255) !important;}
</style>

</section>


<section class="uk-section">
    <div class="uk-container">
        <div class="tw-element tw-heading uk-text-center">
            <h3>
                Lékařská Estetika Frýdlant nad Ostravicí
            </h3>
            
            <p class="subtitle">
                Zbavte se vrásek! Kyselina hyaluronová, dermální nitě nebo botulotoxin? <strong>Svěřte se do rukou těm nejlepším.</strong> Poradíme vám s výběrem nejvhodnější metody.
            </p>
        </div>

        <div class="tw-element uk-text-center uk-child-width-1-1 uk-child-width-1-2@s uk-child-width-expand@m" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 300;">
            <div>
                <div class="tw-element tw-box">
                    <i class="far fa-star"></i>
                    <h4 class="pink">
                        Profesionální přístup
                    </h4>
                    <p class="description">
                        K naší práci přistupujeme stejně zodpovědně, jako k vašemu zdraví. Vaše spokojenost je naší prioritou.
                    </p>
                </div>
            </div>
            <div>
                <div class="tw-element tw-box">
                    <i class="far fa-star"></i>
                    <h4 class="pink">
                        Přátelský personál
                    </h4>
                    <p class="description">
                        Náš přátelský personál udělá vše pro vaše pohodlí a svělý pocit. Návštěva u nás pro vás bude zážitkem.
                    </p>
                </div>
            </div>
            <div>
                <div class="tw-element tw-box">
                    <i class="far fa-star"></i>
                    <h4 class="pink">
                        Špičkové vybavení
                    </h4>
                    <p class="description">
                        Disponujeme tím nejlepším vybavením. Díky toho můžeme provádět estetické zákroky na te nejvyšš úrovni.
                    </p>
                </div>
            </div>
            <div>
                <div class="tw-element tw-box">
                    <i class="far fa-star"></i>
                    <h4 class="pink">
                        Zkušení lékaři
                    </h4>
                    <p class="description">
                     Za skvělými výsledky stojí ten nejlepší lékařský tým.   
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="uk-section uk-padding-remove-vertical" style="background:#f8f8f8;">

    <div class="uk-child-width-1-1 uk-child-width-1-4@m uk-grid-match uk-grid-collapse" data-uk-grid data-uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-small; delay: 400;">

        <div class="uk-padding-xlarge uk-background-cover" style="background-image: url(assets/images/sluzby/3.jpg);">

            <div class="tw-element tw-box">
                <h4 style="color:black;">
                    Plastická operace víček
                </h4>
                <p>
                    Plastická operace očních víček koriguje nadbytečnou a povislou kůži v oblasti víček. Je možné provést operaci horních víček, dolních víček nebo horních i dolních víček současně.
                </p>
                <a href="sluzba?id=1" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>

        </div>
        
        <div class="uk-padding-xlarge uk-background-cover" style="background-image: url(assets/images/sluzby/4.png);">

            <div class="tw-element tw-box">
                <h4 style="color:black;">
                    Coolsculpting
                </h4>     
                <p style="color:black;">
                   Jedinečná technologie k redukci tukových buněk pomocí kryolipolýzy. Výsledný efekt je trvalý.
                </p>
                
                <br><br><br>
                <a href="problemove-partie-coolsculpting" target="_blank" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>

        </div>
        
        <div class="uk-padding-xlarge uk-background-cover" style="background-image: url(assets/images/sluzby/1.jpg);">

            <div class="tw-element tw-box">
                <h4 style="color:black;">
                    Kyselina hyaluronová
                </h4>
                <p style="color:black;">
                    Hodí se ke korekci jemných i hlubokých vrásek, některých jizev a ke zvětšení a tvarování rtů a tvarování brady. 
                </p>
                <a href="sluzba?id=3" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>

        </div>

        <div class="uk-padding-xlarge uk-light" style="background-image: url(assets/images/sluzby/2.jpg);">

            <div class="tw-element tw-box">
                <h4 style="color:white;">
                    Aplikace botulotoxinu
                </h4>
                <p style="color:white;">
                    Botulotoxin se aplikuje zjeména k vyhlazení příčných vrásek mezi obočím, tzv. Glabelly, k léčbě horizontálních vrásek čela a k odstranění vějířovitých vrásek kolem očí.
                </p>
                <a href="sluzba?id=4" class="uk-button uk-button-default uk-button-small uk-button-radius dark-hover tw-hover"><span class="tw-hover-inner"><span>Více informací</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>

        </div>

        
    </div>  
</section>



<section class="uk-section uk-light uk-padding-remove" style="background-color: #151515;">
    <div class="uk-container">

        <div class="tw-element tw-call-action uk-padding-remove-horizontal" data-uk-scrollspy="target: > div; cls:uk-animation-slide-bottom-medium; delay: 400;">
            <div class="call-content">
                <h2 style="color:#e5007d;"><i class="fas fa-info-circle"></i> Zjistěte více</h2>
                <p style="color:white;">Podívejte se na kompletní nabídku našich služeb nebo si sjednejte schůzku. Rádi vám poradíme.</p>
            </div>
            <div class="call-btn">
                <a href="sluzby" class="uk-button uk-button-default uk-button-medium uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Všechny služby a zákroky</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>
        </div>

    </div>
</section>



<section id="blog" class="uk-section uk-background-muted">
    <div class="uk-container">
        
        <div class="tw-element tw-heading uk-text-center">
            <h3>Nejnovější články</h3>
            <p>Sledujte pravidelně naše aktuality, aby vám neutekly žádné inforace o slevách a akčních nabídkách nebo jiné informace z prostředí naěi lékaské estetiky.</p>
        </div>
        
        <div class="uk-text-center">
            <div style="height: 50px;"></div>
            <a class="uk-button uk-button-default uk-button-normal uk-button-radius tw-hover edit" style="color:white;" href="aktuality"><span class="tw-hover-inner"><span>Zobrazit články</span><i class="ion-ios-arrow-thin-right"></i></span></a>
        </div>
        
    </div>
</section>


<section class="uk-section uk-padding-remove uk-light">
    <div class="tw-element tw-portfolio parallax tw-isotope-container" data-isotope-item=".portfolio-item">

        <div class="portfolio-item category-branding category-web-design uk-flex uk-flex-middle uk-flex-center" 
            data-overlay="0.5" style="background-color: #151515; background-image: url(assets/images/prohlidka.jpg);background-repeat: no-repeat;
    background-size: cover; ">
            <div class="tw-element full tw-heading custom-typography" data-uk-parallax="opacity: 0,1; y: 100,0; viewport: 0.5" data-uk-scrollspy="target: > *; cls:uk-animation-slide-bottom-medium; delay: 400;">
                <h1 class="tw-big-title">Podívejte se, jak to u nás vypadá.</h1>
                <a href="virtualni-prohlidka" class="uk-button uk-button-default uk-button-small uk-button-radius tw-hover"><span class="tw-hover-inner"><span>Virtuální prohlídka</span><i class="ion-ios-arrow-thin-right"></i></span></a>
            </div>
        </div>

    </div>
</section>



<section class="uk-section">
    <div class="uk-container">
        <div class="tw-element tw-heading uk-text-center" style="max-width:100% !important;">
  <h3>
                Naši partneři
            </h3>
            <p class="subtitle">
                Prohlédněte si naše partnery a firmy, se kterými spolupracujeme.
            </p>
   <section class="customer-logos slider">
    
    <?php foreach ($database->galerie_zakroky->where("kategorie", 5) as $zaznam) {  ?>
    
     <div class="slide"><div style="background: url(admin/files/galerie/thumb/<?= $zaznam['pic'] ?>);background-repeat: no-repeat;
  background-size: contain;background-position: center;height:80px;width:100%;"></div></div>

     <?php } ?>       
     
                            
   </section>

</div>
</div>
</div>




<!--Footer-->
<?php include_once "include/footer.php"; ?>
<!--Footer end-->



</div>
<!-- .main-container close -->	


<!--Scripts-->
<?php include_once "include/script.php"; ?>
<!--Scripts end-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>


<script>
$(document).ready(function(){
    $('.customer-logos').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        dots: false,
        pauseOnHover: false,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 520,
            settings: {
                slidesToShow: 3
            }
        }]
    });
});
</script>








<style>
.slick-slide {
    margin: 0px 20px;
}

.slick-slide img {
    width: 100%;
}

.slick-slider
{
    position: relative;
    display: block;
    box-sizing: border-box;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
            user-select: none;
    -webkit-touch-callout: none;
    -khtml-user-select: none;
    -ms-touch-action: pan-y;
        touch-action: pan-y;
    -webkit-tap-highlight-color: transparent;
}

.slick-list
{
    position: relative;
    display: block;
    overflow: hidden;
    margin: 0;
    padding: 0;
}
.slick-list:focus
{
    outline: none;
}
.slick-list.dragging
{
    cursor: pointer;
    cursor: hand;
}

.slick-slider .slick-track,
.slick-slider .slick-list
{
    -webkit-transform: translate3d(0, 0, 0);
       -moz-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
         -o-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
}

.slick-track
{
    position: relative;
    top: 0;
    left: 0;
    display: block;
}
.slick-track:before,
.slick-track:after
{
    display: table;
    content: '';
}
.slick-track:after
{
    clear: both;
}
.slick-loading .slick-track
{
    visibility: hidden;
}

.slick-slide
{
    display: none;
    float: left;
    height: 100%;
    min-height: 1px;
}
[dir='rtl'] .slick-slide
{
    float: right;
}
.slick-slide img
{
    display: block;
}
.slick-slide.slick-loading img
{
    display: none;
}
.slick-slide.dragging img
{
    pointer-events: none;
}
.slick-initialized .slick-slide
{
    display: block;
}
.slick-loading .slick-slide
{
    visibility: hidden;
}
.slick-vertical .slick-slide
{
    display: block;
    height: auto;
    border: 1px solid transparent;
}
.slick-arrow.slick-hidden {
    display: none;
}
</style>


 
 
 
 
<?php if ($warning_box['value'] != "") { ?> 

<script src="https://lekarskaestetika.cz/assets/js/jquery.bpopup.min.js"></script>
<script>
$( document ).ready(function() {
    $('#popup_this').bPopup();
});
</script>

 <div id="popup_this">
    <span class="button b-close">
        <span>Zavřít okno</span>
    </span>
    <?= $warning_box['value']; ?>

</div>

<style>
#popup_this {
  //  margin-top: 200px;
    left: 50%;
    max-width:700px;
    text-align:center;
    margin-top: 50px;
    margin-left: -100px;
    position: fixed;
    background: #fff;
    padding: 30px;
    z-index:9999;
}
.b-close {
    position: absolute;
    right: 0;
    top: 0;
    cursor: pointer;
    color: #fff;
    background: #ff0000;
    padding: 5px 10px;
}
</style> 

<?php } ?>   
    
</body>
</html>