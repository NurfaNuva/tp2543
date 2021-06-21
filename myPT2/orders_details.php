<?php
include_once 'orders_details_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Order Details</title>
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
			$stmt = $conn->prepare("SELECT * FROM tbl_orders_a173823, tbl_staffs_a173823_pt2,
				tbl_customers_a173823_pt2 WHERE
				tbl_orders_a173823.fld_staff_num = tbl_staffs_a173823_pt2.fld_staff_num AND
				tbl_orders_a173823.fld_customer_num = tbl_customers_a173823_pt2.fld_customer_num AND
				fld_order_num = :oid");
			$stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
			$oid = $_GET['oid'];
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
					<label>Order ID</label>
					<label><?php echo $readrow['fld_order_num'] ?></label>
				</li>
				<li>
					<label>Order Date</label>
					<label><?php echo $readrow['fld_order_date'] ?></label>
				</li>
				<li>
					<label>Staff</label>
					<label><?php echo $readrow['fld_staff_name'] ?></label>
				</li>
				<li>
					<label>Customer</label>
					<label><?php echo $readrow['fld_customer_name'] ?></label>
				</li>
			</ul>
		</form>
		<hr>
		<!-- add product form based on pid -->
		<form action="orders_details.php" method="post">
			<ul>
				<li>
					<label>Product</label>
					<select name="pid">
						<?php
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
						foreach($result as $productrow) {
							?>
							<option value="<?php echo $productrow['fld_product_num']; ?>"><?php echo $productrow['fld_product_brand']." ".$productrow['fld_product_name']; ?></option>
							<?php
						}
						$conn = null;
						?>
					</select>
				</li>
				<li>
					<label>Quantity</label>
					<input type="number" id="price" name="product_price" min="1" max="1000000" step="1" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
				</li>

				<input name="oid" type="hidden" value="<?php echo $readrow['fld_order_num'] ?>">

				<hr style="margin: 20px 0;">
				<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
					<button type="submit" name="addproduct">Add Product</button>
					<button type="reset">Clear</button>
				</div>
			</ul>
		</form>
		<hr>
		<table border="1" style="width: 50%">
			<tr>
				<td>Order Detail ID</td>
				<td>Product</td>
				<td>Quantity</td>
				<td></td>
			</tr>
			<?php
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a173823,
					tbl_products_a173823_pt2 WHERE
					tbl_orders_details_a173823.fld_product_num = tbl_products_a173823_pt2.fld_product_num AND
					fld_order_num = :oid");
				$stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
				$oid = $_GET['oid'];
				$stmt->execute();
				$result = $stmt->fetchAll();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			foreach($result as $detailrow) {
				?>
				<tr>
					<td><?php echo $detailrow['fld_order_detail_num']; ?></td>
					<td><?php echo $detailrow['fld_product_name']; ?></td>
					<td><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
					<td>
						<a href="orders_details.php?delete=<?php echo $detailrow['fld_order_detail_num']; ?>&oid=<?php echo $_GET['oid']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
					</td>
				</tr>
				<?php
			}
			$conn = null;
			?>
		</table>
		<hr>
		<!-- generate invoice on another tab -->
		<a href="invoice.php?oid=<?php echo $_GET['oid']; ?>" target="_blank">Generate Invoice</a>
	</center>
</body>
</html>