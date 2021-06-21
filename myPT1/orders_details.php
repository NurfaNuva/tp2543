<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Order Details</title>
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
		<form action="products_details.php" method="post">
			<ul>
				<li>
					<label>Order ID</label>
					<label>O5603f03a9349f0.39900158</label>
				</li>
				<li>
					<label>Order Date</label>
					<label>09-09-2015</label>
				</li>
				<li>
					<label>Staff</label>
					<label>James Martin</label>
				</li>
				<li>
					<label>Customer</label>
					<label>Maria Garcia</label>
				</li>
			</ul>
		</form>
		<hr>
		<!-- add product form based on pid -->
		<form action="orders_details.php" method="post">
			<ul>
				<li>
					<label for="pid">Product ID</label>
					<select id="pid" name="product_id">
						<option value="M100">X-SPIRIT III(M)</option>
						<option value="M101">X-SPIRIT III(L)</option>
						<option value="M102">X-SPIRIT III(XL)</option>
					</select>
				</li>
				<li>
					<label for="quantity">Quantity</label>
					<input type="number" id="qty" name="quantity" min="1">
				</li>
				<hr style="margin: 20px 0;">
					<div style="margin: auto; display: flex; align-items: center; justify-content: center;">
						<button type="submit" name="addproduct">Create</button>
						<button type="reset">Clear</button>
					</div>
			</ul>
		<!-- 	Quantity
			<input name="quantity" type="text"> -->
		</form>
		<hr>
		<table border="1" style="width: 50%">
			<tr>
				<td>Order Detail ID</td>
				<td>Product</td>
				<td>Quantity</td>
				<td></td>
			</tr>
			<tr>
				<td>D5603f136f41334.84833440</td>
				<td>X-SPIRIT III(M)</td>
				<td>1</td>
				<td>
					<a href="orders_details.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>O5603f03a9349f0.39900158</td>
				<td>X-SPIRIT III(XL)</td>
				<td>2</td>
				<td>
					<a href="orders_details.php">Delete</a>
				</td>
			</tr>
		</table>
		<hr>
		<!-- generate invoice on another tab -->
		<a href="invoice.php" target="_blank">Generate Invoice</a>
	</center>
</body>
</html>