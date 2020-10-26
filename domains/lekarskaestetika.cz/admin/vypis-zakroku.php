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
	  					
           
              
              <table class="display table table-hover">
                        <thead>
                            <tr style="font-weight:800;">
                                <td>Id </td>
                                <td>Název</td>
                                <td style="text-align:center;">Upravit </td>
                                <td style="text-align:center;">Smazat </td>
                            </tr>
                        </thead>
                        <tbody>
                            
                            
                            <?php
                            foreach ($database->le_zakroky->order("id DESC") as $zaznam) {
                                ?>
                            <tr>
                            <td><?= $zaznam['id'] ?></td>
                            <td><?= $zaznam['nazev'] ?></td>
                            <td style="text-align:center;font-size:20px;"><a href="le-edit-zakrok?id=<?= $zaznam['id'] ?>"><i class="fas fa-cogs"></i></a>  </td>
                            <td style="text-align:center;font-size:20px;"><a href="le-smaz-zakrok?id=<?= $zaznam['id'] ?>" onclick="return confirm('Smazat článek: <?= $zaznam['nadpis'] ?> ?')"><i class="fas fa-trash-alt"></i></a>  </td>
                            </tr>    
                                
                                
                                
                                <?php
                            }
                            ?>  
                            
                            
                        </tbody>
                    </table>
              
              
              
	  				</div>
            
            
       
            

		  </div>
    </div>

<?php include_once "include/footer.php"; ?>
<?php include_once "include/script.php"; ?>
  </body>
</html>