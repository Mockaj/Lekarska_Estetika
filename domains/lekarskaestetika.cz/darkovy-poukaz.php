
<!DOCTYPE html>
<html lang="cs">
    
<head>
        
<title>LékařskáEstetika.cz - Dárkový poukaz</title>
        
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
    data-overlay="0.4" style=" background-image: url(assets/images/dp-cover.jpg); height: 250px;">
    <div class="tw-page-title-container tw-element">
        <h1 class="tw-page-title uk-text-uppercase">Dárkový poukaz</h1>
    </div>
</section>


<section class="uk-section uk-section-blog">
    <div class="uk-container">

        <div data-uk-grid>

            <div class="content-area uk-width-expand">

                <article class="single post">
                    <div class="entry-post">
                        
                        
                        
                        <p>Chcete udělat radost svým blízkým? Darujte jim k Vánocům DÁRKOVÝ POUKAZ na ošetření v naší estetické ambulanci. Obdarovaný si může vybrat ze široké nabídky zákroků, od úpravy obočí metodou vláskování, přes ošetření pleti přístrojem Synergy, Vital injektor nebo plazmaterapií, až po aplikaci výplní, botulotoxinu, dermálních nití, přípravku Belkyra nebo plastickou operaci očních víček.
                       </p><p>
Poukaz Vám vystavíme na konkrétní jméno a na libovolnou částku, můžete si přijít jej zakoupit přímo k nám na lékařskou ambulanci ve Frýdlantu n. Ostravicí, pokud se k nám nedostanete osobně, můžeme Vám jej poslat poštou na základě Vaši objednávky poukazu pomocí našeho formuláře, nebo při objednání emailem na emailové adrese objendavky@lekarskaestetika.cz.</p>
                       
                        
                    </div>
                </article>

            <div style="margin-top:20px;" class="tw-contact-form tw-element" data-uk-scrollspy="target: > form > div; cls:uk-animation-slide-bottom-small; delay: 500;">
            <form action="posli-poukaz" method="post" class=" uk-grid-small uk-child-width-1-1" data-uk-grid>
                <div>
                    <input name="jmeno" placeholder="Jméno a příjmení objednávajícího" type="text" size="30" aria-required="true">
                </div>
                <div class="uk-width-1-3@s">
                    <input name="telefon" placeholder="Telefon" type="text" size="30" aria-required="true">
                </div>
                <div class="uk-width-1-3@s">
                    <input name="email" placeholder="E-mail" type="text" size="30" aria-required="true">
                </div>
                <div class="uk-width-1-3@s">
                    <input name="castka" placeholder="Částka poukazu v Kč" type="text" size="30" aria-required="true">
                </div>
                <div>
                    <input name="obdarovany" placeholder="Jméno obdarovaného" type="text" size="30" aria-required="true">
                </div>
                <div>
                    <textarea name="text" placeholder="Doplňující informace" class="required" rows="7" tabindex="4"></textarea>
                </div>
                <div class="uk-width-1-2@s">
                    <input name="spam" placeholder="Kolik je 5+5? (slovy)" type="text" size="20" aria-required="true">
                </div>
                <div>
                <input type="checkbox" style="height:10px;width:10px;cursor:pointer;" name="souhlas_zpracovani" value="ano" required> Souhlasím se zpracováním osobních údaje dle <a href="obchodni-podminky" target="_blank">obchodních podmínek</a>.
                </div>
                <div>
                <div>
                
                <div class="uk-text-center">
                    <input name="submit" type="submit" class="submit" value="Odeslat zprávu" style="margin-top:10px;">
                </div>
            </form>
        </div>
            </div>
        </div>


            </div>

            <div class="sidebar-area">
                <div class="sidebar-inner" data-uk-sticky="bottom: true;offset: 40">

                   

                    <div class="widget-item">
                        <aside class="widget tw-text-widget">
                            <img src="assets/images/poukaz_husta.jpg" alt="" />
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