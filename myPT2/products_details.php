<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Product Details</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>
	<style>
		.navbar {
			font-size: 24px
		}

		.nav-link {
			background-color: Transparent;
			background-repeat:no-repeat;
			border: none;
			cursor:pointer;
			overflow: hidden;
			outline:none;
		}

		form {
			/* Center the form on the page */
			margin: 0 auto;
			width: 500px;
			/* Form outline */
			padding: 1em;
			border: 1px solid #CCC;
			border-radius: 1em;
		}

		ul {
			list-style: none;
			padding: 0;
			margin: 0 12px;
		}

		form li+li {
			margin-top: 1em;
		}

		label {
			/* Uniform size & alignment */
			display: inline-block;
			width: 160px;
			text-align: left;
		}

		input,
		select {
      /* To make sure that all text fields have the same font settings
      By default, textareas have a monospace font */
      /* font: 1em sans-serif; */

      /* Uniform text field size */
      /*width: 300px;*/
      box-sizing: border-box;

      /* Match form field borders */
      /*border: 1px solid #999;*/
  }

  input:focus {
  	/* Additional highlight for focused elements */
  	border-color: #000;
  }

  .button {
  	/* Align buttons with the text fields */
  	padding-left: 90px;
  	/* same size as the label elements */
  }

  button {
      /* This extra margin represent roughly the same space as the space
      between the labels and their text fields */
      margin-left: .5em;
  }
</style>
</head>
<body>
	<center>
		<a href="index.php" style="font-size: 20px">Home</a> |
		<a href="products.php" style="font-size: 20px">Products</a> |
		<a href="customers.php" style="font-size: 20px">Customers</a> |
		<a href="staffs.php" style="font-size: 20px">Staffs</a> |
		<a href="orders.php" style="font-size: 20px">Orders</a>
		<hr>
		
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

		<form action="products_details.php" method="post">
			<ul>
				<li>
					<img src="products/<?php echo $readrow['fld_product_image'] ?>" width="50%" height="50%">
				</li><hr>
				<li>
					<label>Product ID</label>
					<label><?php echo 'M'.$readrow['fld_product_num'] ?></label>
				</li>
				<li>
					<label>Name</label>
					<label><?php echo $readrow['fld_product_name'] ?></label>
				</li>
				<li>
					<label>Price</label>
					<label>RM <?php echo $readrow['fld_product_price'] ?></label>
				</li>
				<li>
					<label>Brand</label>
					<label><?php echo $readrow['fld_product_brand'] ?></label>
				</li>
				<li>
					<label>Size</label>
					<label><?php echo $readrow['fld_product_size'] ?></label>
				</li>
				<li>
					<label>Color</label>
					<input style="background-color: <?php echo $readrow['fld_product_color'] ?>" disabled=""></input>
				</li>
				<li>
					<label>Warranty</label>
					<label><?php echo $readrow['fld_product_warranty'] ?></label>
				</li>
			</ul>
		</form>
	</center>
</body>
</html>