<?php
  include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Invoice</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>
</head>
<body>
	<center>
		Fakulti Teknologi & Sains Maklumat<br>
		Universiti Kebangsaan Malaysia <br>
		Bangi <br>
		43600 <br>
		Selangor<br>
		<hr>
		<?php
		try {
			$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $conn->prepare("SELECT * FROM tbl_orders_a173823, tbl_staffs_a173823_pt2,
				tbl_customers_a173823_pt2, tbl_orders_details_a173823 WHERE
				tbl_orders_a173823.fld_staff_num = tbl_staffs_a173823_pt2.fld_staff_num AND
				tbl_orders_a173823.fld_customer_num = tbl_customers_a173823_pt2.fld_customer_num AND
				tbl_orders_a173823.fld_order_num = tbl_orders_details_a173823.fld_order_num AND
				tbl_orders_a173823.fld_order_num = :oid");
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
		Order ID: <?php echo $readrow['fld_order_num']; ?> <br>
		Order Date: <?php echo $readrow['fld_order_date']; ?>

		<hr>
		Staff: <?php echo $readrow['fld_staff_name']; ?> <br>
		Customer: <?php echo $readrow['fld_customer_name']; ?> <br>
		Date: <?php echo date("d M Y"); ?>
		<hr>
		<table border="1" style="width: 50%">
			<tr>
				<td>No</td>
				<td>Product</td>
				<td>Quantity</td>
				<td>Price(RM)/Unit</td>
				<td>Total(RM)</td>
			</tr>
			<?php
			$grandtotal = 0;
			$counter = 1;
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM tbl_orders_details_a173823,
					tbl_products_a173823_pt2 where 
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
				<td><?php echo $counter; ?></td>
				<td><?php echo $detailrow['fld_product_name']; ?></td>
				<td><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
				<td><?php echo $detailrow['fld_product_price']; ?></td>
				<td><?php echo $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity']; ?></td>
			</tr>
			<?php
				$grandtotal = $grandtotal + $detailrow['fld_product_price']*$detailrow['fld_order_detail_quantity'];
				$counter++;
      			} // while
     			$conn = null;
     		?>

     		<tr>
     			<td colspan="4" align="right">Grand Total</td>
     			<td><?php echo $grandtotal ?></td>
     		</tr>
		</table>
		<hr>
		Computer-generated invoice. No signature is required.
	</center>
</body>
</html>