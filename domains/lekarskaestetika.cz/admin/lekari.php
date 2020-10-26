<?php
require_once 'ajax/safe.php';
require_once 'inc/Database.php';
?>
<!DOCTYPE html>
<html>
<?php include_once "include/head.php"; ?>
  <body>
<?php include_once "include/header.php"; ?>

    <div class="page-content">
    	<div class="row">
		  
<?php include_once "include/sidebar.php"; ?>

<div class="col-md-8">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title" style="font-weight:600;"> Přidat fotografii</div>
					          
					        </div>
			  				<div class="panel-body">
			  					<form enctype="multipart/form-data" action="pridej-lekare" method="post">
									<fieldset>
										

                    <div class="form-group">
											<label>Popis</label>
											<input class="form-control" placeholder="Popis" name="popis" type="text">
										</div>
                    <div class="form-group">
											<label>Kategorie</label>
                      <select name="kategorie" class="form-control">
                        <option value="">Vybrat kategorii</option>
                        <option value="">---</option>
                        <option value="1">Zákroky</option>
                        <option value="2">Interiér</option>
                        <option value="3">Ostatní</option>
                        <option value="4">LE studio</option>
                        <option value="">---</option>
                        <option value="5">Partneří homepage</option>
                      </select>
										</div>
                    <div class="form-group">
											<label>Podkategorie</label>
                      <select name="podkategorie" class="form-control">
                        <option value="">Vybrat podkategorii</option>
                        <option value="">---</option>
                        <option value="1">PLASTICKÉ OPERACE VÍČEK - ŽENY</option>
                        <option value="2">PLASTICKÉ OPERACE VÍČEK - MUŽI</option>
                        <option value="3">NIŤOVÝ LIFTING OBLIČEJE A KRKU</option>
                        <option value="4">BOTULOTOXIN</option>
                        <option value="5">VÝPLNĚ NA BÁZI KYSELINY HYALURONOVÉ</option>
                        <option value="6">RADIESSE</option>
                        <option value="7">BELKYRA</option>
                        <option value="">----</option>
                        <option value="1">Workshopy</option>
                        <option value="2">Kongresy</option>
                        <option value="3">Ostatni</option>
                      </select>
										</div>
                    <div class="form-group">
											<label>Obrázek</label>
                      <input class="form-control" type="file" name="photo">
										</div>

									</fieldset>
									<div>
										<input type="submit" class="btn btn-primary" value="Přidat">
											
										
									</div>
								</form>
			  				</div>
			  			</div>
	  				</div>
            
            
           
            

		  </div>
    </div>

<?php include_once "include/footer.php"; ?>
<?php include_once "include/script.php"; ?>
  </body>
</html>