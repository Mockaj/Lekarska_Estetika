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
			  					<form enctype="multipart/form-data" action="update-clanek" method="post">									
                  
                  <fieldset>
                      
										 <?php
                        $zaznam = $database->novinky->where("id", $_GET['id'])->fetch();
                     ?>
                     
                    <input name="id" type="hidden" value="<?= $zaznam['id'] ?>" >
                    
                    <div class="form-group">
											<label>Nadpis</label>
											<input class="form-control" placeholder="Nadpis stránky" name="nadpis" type="text" value="<?= $zaznam['nadpis'] ?>">
										</div>
                    
                    <div class="form-group">
                      <input type="radio" name="topovani" value="0" <?=$zaznam['topovani']=="0" ? "checked" : ""?>>&nbsp;&nbsp;Klasický příspěvek<br>
                      <input type="radio" name="topovani" value="1" <?=$zaznam['topovani']=="1" ? "checked" : ""?>>&nbsp;&nbsp;TOPový příspěvek
                    </div>
                    
                    <div class="form-group">
								      <textarea id="editor1" name="obsah"><?= $zaznam['obsah'] ?></textarea>
								    </div>
									</fieldset>
									<div>
										<input type="submit" class="btn btn-primary" value="Upravit">
											
										
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