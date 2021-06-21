<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Orders</title>
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
		<div class="form" style="margin: 0 10%">
			<form action="orders.php" method="post">
				<ul>
					<li>
						<label for="oid">Order ID</label>
						<input type="text" id="oid" name="order_id" disabled="">
					</li>
					<li>
						<label for="orderdate">Order Date</label>
						<input type="date" id="orderdate" name="order_date" disabled="">
					</li>
					<li>
						<label for="sid">Staff ID</label>
						<select id="sid" name="staff_id">
							<option disabled selected>Select</option>
							<option value="S101">AMIR</option>
							<option value="S102">ALEX</option>
							<option value="S103">RAMESH</option>
						</select>
					</li>
					<li>
						<label for="cid">Customer ID</label>
						<select id="cid" name="customer_id">
							<option disabled selected>Select</option>
							<option value="C101">DANIAL</option>
							<option value="C102">CHENG</option>
							<option value="C103">NABIL</option>
						</select>
					</li>
					<hr style="margin: 20px 0;">
					<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
						<button type="submit" name="create">Create</button>
						<button type="reset">Clear</button>
					</div>
				</ul>
			</form>
		</div>
		<br><hr><br>
		<table border="1" style="width: 50%">
			<tr>
				<td>Order ID</td>
				<td>Order Date</td>
				<td>Staff ID</td>
				<td>Customer ID</td>
				<td></td>
			</tr>
			<tr>
				<td>O5603f03a9349f0.39900158</td>
				<td>09-09-2015</td>
				<td>RAMESH</td>
				<td>DANIAL</td>
				<td>
					<a href="orders_details.php">Details</a>
					<a href="orders.php">Edit</a>
					<a href="orders.php">Delete</a>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>