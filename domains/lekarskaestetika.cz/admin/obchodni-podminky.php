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

    <div class="col-md-9">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title" style="font-weight:600;"> Obchodní podmínky</div>
					          
					        </div>
			  				<div class="panel-body">
			  					<form enctype="multipart/form-data" action="update-podminky" method="post">
                   <?php
                        $zaznam = $database->obchodni_podminky->fetch();
                     ?>
									<fieldset>
                    <div class="form-group">
								      <textarea id="editor1" name="obsah" style="height:300px;"><?= $zaznam['obsah'] ?></textarea>
								  </div>

									</fieldset>
									<div>
										<input type="submit" class="btn btn-primary" value="Upravit článek">
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