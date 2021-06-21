<?php
include_once 'staffs_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Staffs</title>
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
			<form action="staffs.php" method="post">
				<ul>
					<li>
						<label>Staff ID</label>
						<input name="sid" type="text" value="<?php if(isset($_GET['edit'])) echo 'S'.$editrow['fld_staff_num']; ?>" readonly>
					</li>
					<li>
						<label>Name</label>
						<input name="name" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
					</li>
					<li>
						<label>Phone Number</label>
						<input name="phone" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>" pattern="^01[0-9]{1}-([0-9]{8}|[0-9]{7})" placeholder="0##-#######" required>
					</li>

					<hr style="margin: 20px 0;">
					<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
						<?php if (isset($_GET['edit'])) { ?>
							<input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
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
		<table border="1" style="width: 50%">
			<tr>
				<td>Staff ID</td>
				<td>Name</td>
				<td>Phone Number</td>
				<td></td>
			</tr>

			<?php
     		// Read
			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a173823_pt2");
				$stmt->execute();
				$result = $stmt->fetchAll();
			}
			catch(PDOException $e){
				echo "Error: " . $e->getMessage();
			}
			foreach($result as $readrow) {
				?>
				<tr>
					<td><?php echo 'S'.$readrow['fld_staff_num']; ?></td>
					<td><?php echo $readrow['fld_staff_name']; ?></td>
					<td><?php echo $readrow['fld_staff_phone']; ?></td>
					<td>
						<a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>">Edit</a>
						<a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
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