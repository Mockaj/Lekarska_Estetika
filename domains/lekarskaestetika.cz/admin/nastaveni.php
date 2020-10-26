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
			  				<div class="panel-body">
			  					<form enctype="multipart/form-data" action="update-nastaveni" method="post">									
                  
                  <fieldset>
                      
										 <?php
                        $zaznam = $database->nastaveni->fetch();
                     ?>
                     

                    
                    <div class="form-group">
											<label>Uživatelské jméno</label>
											<input class="form-control" name="uzivatel" type="text" value="<?= $zaznam['uzivatel'] ?>" >
										</div>
                    <div class="form-group">
											<label>E-mail</label>
											<input class="form-control" placeholder="Nadpis stránky" name="email" type="text" value="<?= $zaznam['email'] ?>">
										</div>
                    <div class="form-group">
											<label>Heslo</label>
											<input class="form-control" value="<?= $zaznam['heslo'] ?>" name="heslo" type="password">
										</div>
                    <div class="form-group">
											<label>Telefon</label>
											<input class="form-control" value="<?= $zaznam['telefon'] ?>" name="telefon" type="text">
										</div>
                    <div class="form-group">
											<label>Název stránek</label>
											<input class="form-control" value="<?= $zaznam['web'] ?>" name="web" type="text">
										</div>
                    <div class="form-group">
											<label>URL stránek</label>
											<input class="form-control" value="<?= $zaznam['url'] ?>" name="web" type="text" disabled>
										</div>
                    

									</fieldset>
									<div>
										<input type="submit" class="btn btn-primary" value="Uložit změny">
											
										
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