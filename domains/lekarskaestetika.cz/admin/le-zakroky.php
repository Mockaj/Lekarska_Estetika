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
					            <div class="panel-title"> Zákroky</div>
					          
					        </div>
			  				<div class="panel-body">
			  					<form enctype="multipart/form-data" action="le-pridej-zakrok" method="post">
									<fieldset>
										

                    <div class="form-group">
											<label>Nadpis</label>
											<input class="form-control" placeholder="Název zákroku" name="nazev" type="text">
										</div>               
                    <div class="form-group">
								      <textarea id="editor1" name="obsah"></textarea>
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