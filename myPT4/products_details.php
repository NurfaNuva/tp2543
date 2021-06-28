<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>BikeZone: Products Details</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  	<?php include_once 'nav_bar.php'; ?>

  	<?php
  	try {
  		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  		$stmt = $conn->prepare("SELECT * FROM tbl_products_a173823_pt2 WHERE fld_product_num = :pid");
  		$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
  		$pid = $_GET['pid'];
  		$stmt->execute();
  		$readrow = $stmt->fetch(PDO::FETCH_ASSOC);
  	}
  	catch(PDOException $e) {
  		echo "Error: " . $e->getMessage();
  	}
  	$conn = null;
  	?>

  	<div class="container-fluid">
  		<div class="row">
  			<div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center" style="background-color: #242423;">
  				<?php if ($readrow['fld_product_image'] == "" ) {
  					echo "No image";
  				}
  				else { ?>
  					<img src="products/<?php echo $readrow['fld_product_image'] ?>" class="img-responsive" width="100%" height="100%" alt="No Image">
  				<?php } ?>
  			</div>
  			<div class="col-xs-12 col-sm-5 col-md-4">
  				<div class="panel panel-default" style="color: black;">
  					<div class="panel-heading"><strong>Product Details</strong></div>
  					<div class="panel-body">
  						Below are specifications of the product.
  					</div>
  					<table class="table">
  						<tr>
  							<td class="col-xs-4 col-sm-4 col-md-4"><strong>Product ID</strong></td>
  							<td><?php echo $readrow['fld_product_num'] ?></td>
  						</tr>
  						<tr>
  							<td><strong>Name</strong></td>
  							<td><?php echo $readrow['fld_product_name'] ?></td>
  						</tr>
  						<tr>
  							<td><strong>Price</strong></td>
  							<td>RM <?php echo $readrow['fld_product_price'] ?></td>
  						</tr>
  						<tr>
  							<td><strong>Brand</strong></td>
  							<td><?php echo $readrow['fld_product_brand'] ?></td>
  						</tr>
  						<tr>
  							<td><strong>Size</strong></td>
  							<td><?php echo $readrow['fld_product_size'] ?></td>
  						</tr>
  						<tr>
  							<td><strong>Color</strong></td>
  							<td><input style="background-color: <?php echo $readrow['fld_product_color'] ?>" disabled></input></td>
  						</tr>
  						<tr>
  							<td><strong>Warranty</strong></td>
  							<td><?php echo $readrow['fld_product_warranty'] ?></td>
  						</tr>
  					</table>
  				</div>
  			</div>
  		</div>
  	</div>

  	<?php include_once 'footer.php'; ?>

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
</body>
</html>