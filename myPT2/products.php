<?php
include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Products</title>
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
      width: 300px;
      box-sizing: border-box;

      /* Match form field borders */
      border: 1px solid #999;
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
		<!-- top menu -->
		<a href="index.php" style="font-size: 20px">Home</a> |
		<a href="products.php" style="font-size: 20px">Products</a> |
		<a href="customers.php" style="font-size: 20px">Customers</a> |
		<a href="staffs.php" style="font-size: 20px">Staffs</a> |
		<a href="orders.php" style="font-size: 20px">Orders</a>
		<hr>
		<!-- form create new product -->
		<div class="form" style="margin: 0 10%">
			<form action="products.php" method="post">
				<ul>
					<li>
						<label>Product ID</label> 
						<input name="pid" type="text" value="<?php if(isset($_GET['edit'])) echo 'M'.$editrow['fld_product_num']; ?>" readonly>
					</li>
					<li>
						<label>Name</label> 
						<input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
					</li>
					<li>
						<label>Price</label>
						<input type="number" id="price" name="product_price" min="1.00" max="1000000.00" step="0.10" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
					</li>
					<li>
						<label>Brand</label>
						<select name="brand">
							<option value="SHOEI" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SHOEI") echo "selected"; ?>>SHOEI</option>
							<option value="ARAI" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="ARAI") echo "selected"; ?>>ARAI</option>
							<option value="AGV" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="AGV") echo "selected"; ?>>AGV</option>
							<option value="SCORPION" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SCORPION") echo "selected"; ?>>SCORPION</option>
						</select>
					</li>
					<li>
						<label>Size</label>
						<select name="size">
							<option value="M" <?php if(isset($_GET['edit'])) if($editrow['fld_product_size']=="M") echo "selected"; ?>>M</option>
							<option value="L" <?php if(isset($_GET['edit'])) if($editrow['fld_product_size']=="L") echo "selected"; ?>>L</option>
							<option value="XL" <?php if(isset($_GET['edit'])) if($editrow['fld_product_size']=="XL") echo "selected"; ?>>XL</option>
						</select>
					</li>
					<li>
						<label>Color</label>
						<input name="color" type="color">
					</li>
					<li>
						<label>Warranty</label>
						<select name="warranty">
							<option value="1 YEAR" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="1 YEAR") echo "selected"; ?>>1 YEAR</option>
							<option value="2 YEAR" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="2 YEAR") echo "selected"; ?>>2 YEAR</option>
							<option value="3 YEAR" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="3 YEAR") echo "selected"; ?>>3 YEAR</option>
							<option value="LIFETIME" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="LIFETIME") echo "selected"; ?>>LIFETIME</option>
						</select>
					</li>

					<!-- image -->
					<input name="image" type="hidden" value="nophoto.png"> <br>

					<hr style="margin: 20px 0;">
					<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
						<?php if (isset($_GET['edit'])) { ?>
							<input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
							<button type="submit" name="update">Update</button>
						<?php } else { ?>
							<button type="submit" name="create">Create</button>
						<?php } ?>

						<button type="reset">Clear</button>
					</div>
				</ul>
			</form>
		</div>
		<br><hr><br>
		<!-- table with temporary data -->
		<table border="1" style="width: 70%">
			<tr>
				<td>Product ID</td>
				<td>Name</td>
				<td>Price</td>
				<td>Brand</td>
				<td></td>
			</tr>

			<?php
      		// Read
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM tbl_products_a173823_pt2");
				$stmt->execute();
				$result = $stmt->fetchAll();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			foreach($result as $readrow) {
				?>   

				<tr>
					<td><?php echo 'M'.$readrow['fld_product_num']; ?></td>
					<td><?php echo $readrow['fld_product_name']; ?></td>
					<td><?php echo 'RM '.$readrow['fld_product_price']; ?></td>
					<td><?php echo $readrow['fld_product_brand']; ?></td>
					<td>
						<a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>">Details</a>
						<a href="products.php?edit=<?php echo $readrow['fld_product_num']; ?>">Edit</a>
						<a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
					</td>
				</tr>

				<?php
			}
			$conn = null;
			?>
		</table>
	</center>
</body>
</html>