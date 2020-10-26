<?php
require_once 'adm/inc/Database.php';
$zaznam = $database->stranky->where("id", 4)->fetch();
?>
<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Kontakty</title>
        
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
        <h1 class="tw-page-title uk-text-uppercase">Kontaktní informace</h1>
    </div>
</section>


<section class="uk-section uk-background-cover" style="background:#f5f5f5;">
    <div class="uk-container">
        <div class="uk-child-width-expand@s uk-text-center" data-uk-grid data-uk-scrollspy="target: > div > .tw-box; cls:uk-animation-slide-bottom-medium; delay: 300;">

            <div>
                <div class="tw-element tw-box custom-typography uk-margin-bottom">
                    <i class="fas fa-map-marker"></i>
                    <h4>Adresa</h4>
                    <p class="description">
                        Školní 118, Frýdlant nad Ostravicí<br>739 11
                    </p>
<a href="https://goo.gl/maps/kPyeT8HFAam" target="_blank" class="uk-button uk-button-default uk-button-small uk-button-radius uk-button-dark tw-hover"><span class="tw-hover-inner"><span>Navigovat</span><i class="ion-ios-arrow-thin-right"></i></span></a>
                </div>
            </div>
            <div>
                <div class="tw-element tw-box custom-typography uk-margin-remove-top uk-margin-bottom">
                    <i class="fas fa-phone-volume"></i>
                    <h4>Telefon</h4>
                    <p class="description">
                        +420 731 516 469, +420 607 059 353
                    </p><br>
<a href="tel:731 516 469" class="uk-button uk-button-default uk-button-small uk-button-radius uk-button-dark tw-hover"><span class="tw-hover-inner"><span>Zavolat</span><i class="ion-ios-arrow-thin-right"></i></span></a>
                </div>
            </div>
            <div>
                <div class="tw-element tw-box custom-typography uk-margin-remove-top">
                    <i class="far fa-envelope"></i>
                    <h4>E-mail</h4>
                    <p class="description">
                        objednavky@lekarskaestetika.cz
                    </p><br>
<a href="mailto:objednavky@lekarskaestetika.cz" class="uk-button uk-button-default uk-button-small uk-button-radius uk-button-dark tw-hover"><span class="tw-hover-inner"><span>Poslat email</span><i class="ion-ios-arrow-thin-right"></i></span></a>
                </div>
            </div>

        </div>
    </div>
</section>



<section class="uk-section">
    <div class="uk-container">


    <div class="uk-child-width-1-1@xs uk-child-width-1-2@s uk-grid-medium" data-uk-grid>
            <div style="line-height: 1.2;">
<?= $zaznam['text'] ?>
           </div>
            <div>
<div class="tw-contact-form tw-element" data-uk-scrollspy="target: > form > div; cls:uk-animation-slide-bottom-small; delay: 500;">
            <form action="posli-vzkaz" method="post" class=" uk-grid-small uk-child-width-1-1" data-uk-grid>
                <div>
                    <input name="jmeno" placeholder="Jméno *" type="text" size="30" aria-required="true">
                </div>
                <div class="uk-width-1-2@s">
                    <input name="email" placeholder="E-mail *" type="text" size="30" aria-required="true">
                </div>
                <div class="uk-width-1-2@s">
                    <input name="spam" placeholder="Kolik je 5+5? (slovy)" type="text" size="20" aria-required="true">
                </div>
                <div>
                    <textarea name="text" placeholder="Vaše zpráva" class="required" rows="7" tabindex="4"></textarea>
                </div>
                <div>
                <input type="checkbox" style="height:10px;width:10px;cursor:pointer;" name="souhlas_zpracovani" value="ano" required> Souhlasím se zpracováním osobních údaje dle <a href="obchodni-podminky" target="_blank">obchodních podmínek</a>.
                </div>
                <div>
                <input type="checkbox" style="height:10px;width:10px;cursor:pointer;" name="souhlas_newsletter" value="ano"> Souhlasím se zasíláním novinek, zajímavých akcí a jiných obchodních sdělení.
                <div>
                
                <div class="uk-text-center">
                    <input name="submit" type="submit" class="submit" value="Odeslat zprávu" style="margin-top:10px;">
                </div>
            </form>
        </div>
            </div>
        </div>



    </div>
</section>

<section class="uk-section" style="padding-bottom:0px;padding-top:0px;">
    
<iframe frameborder="0" height="400px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2586.3439381356984!2d18.35915040000002!3d49.59126319999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4713f598f550f1df%3A0x99b5b2a5da8b93b5!2zxaBrb2xuw60gMTE4!5e0!3m2!1scs!2scz!4v1401102584672" style="border:0" width="100%"></iframe>

    
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