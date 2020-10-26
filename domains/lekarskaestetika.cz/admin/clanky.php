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
					            <div class="panel-title"> Úvodní strana</div>
					          
					        </div>
			  				<div class="panel-body">
			  					<form enctype="multipart/form-data" action="pridej-clanek" method="post">
									<fieldset>
										

                    <div class="form-group">
											<label>Nadpis</label>
											<input class="form-control" placeholder="Nadpis stránky" name="nadpis" type="text">
										</div>
                    <div class="form-group">
                    <input type="radio" name="topovani" value="0" checked="checked">&nbsp;&nbsp;Klasický příspěvek<br>
                    <input type="radio" name="topovani" value="1">&nbsp;&nbsp;TOPový příspěvek
                    </div>
                    <!--<div class="form-group">
											<label>Datum</label>
											<input class="form-control" value="<?php echo date("m.d.Y");?>" name="datum" type="text">
										</div>-->
                    <!--<div class="form-group">
											<label>Krátký popis</label>
											<textarea class="form-control" placeholder="Textarea" name="popis" rows="3"></textarea>
										</div>-->
                    <div class="form-group">
								      <textarea id="editor1" name="obsah"></textarea>
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