<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Product Details</title>
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
				<li><img src="products/M100.png" width="30%" height="30%"></li>
				<li><hr>
					<label>Product ID</label>
					<label>M100</label>
				</li>
				<li>
					<label>Name</label>
					<label>X-SPIRIT III(M)</label>
				</li>
				<li>
					<label>Price</label>
					<label>RM 2948.00</label>
				</li>
				<li>
					<label>Brand</label>
					<label>SHOEI</label>
				</li>
				<li>
					<label>Size</label>
					<label>M</label>
				</li>
				<li>
					<label>Color</label>
					<label>WHITE</label>
				</li>
				<li>
					<label>Warranty</label>
					<label>2 YEAR</label>
				</li>
			</ul>
		</form>
	</center>
</body>
</html>