<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Products</title>
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
						<label for="pid">Product ID</label>
						<input type="text" id="cid" name="product_id">
					</li>
					<li>
						<label for="pname">Name</label>
						<input type="text" id="cname" name="product_name">
					</li>
					<li>
						<label for="price">Price</label>
						<input type="number" id="price" name="product_price" min="0.00" max="1000000.00" step="0.01">
					</li>
					<li>
						<label for="brand">Brand</label>
						<select id="brand" name="brand">
							<option disabled selected>Select</option>
							<option value="ARAI">ARAI</option>
							<option value="AGV">AGV</option>
							<option value="SHOEI">SHOEI</option>
							<option value="SCORPION">SCORPION</option>
						</select>
					</li>
					<li>
						<label for="size">Size</label>
						<select id="size" name="size">
							<option disabled selected>Select</option>
							<option value="M">M</option>
							<option value="L">L</option>
							<option value="XL">XL</option>
						</select>
					</li>
					<li>
						<label for="color">Color</label>
						<input type="color" name="color">
					</li>
					<li>
						<label for="warranty">Warranty</label>
						<select id="warranty" name="warranty">
							<option disabled selected>Select</option>
							<option value="1year">1 YEAR</option>
							<option value="2year">2 YEAR</option>
							<option value="3year">3 YEAR</option>
							<option value="lifetime">LIFETIME</option>
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
		<!-- table with temporary data -->
		<table border="1" style="width: 70%">
			<tr>
				<td>Product ID</td>
				<td>Name</td>
				<td>Price</td>
				<td>Brand</td>
				<td>Size</td>
				<td>Color</td>
				<td>Warranty</td>
				<td></td>
			</tr>
			<tr>
				<td>M100</td>
				<td>X-SPIRIT III(M)</td>
				<td>2948</td>
				<td>SHOEI</td>
				<td>M</td>
				<td style="background-color: white"></td>
				<td>2 YEAR</td>
				<td>
					<a href="products_details.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M101</td>
				<td>X-SPIRIT III(L)</td>
				<td>2948</td>
				<td>SHOEI</td>
				<td>L</td>
				<td style="background-color: black"></td>
				<td>2 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M102</td>
				<td>X-SPIRIT III(XL)</td>
				<td>2948</td>
				<td>SHOEI</td>
				<td>XL</td>
				<td style="background-color: blue"></td>
				<td>2 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M103</td>
				<td>X-SPIRIT III AERODYNE(M)</td>
				<td>3500</td>
				<td>SHOEI</td>
				<td>M</td>
				<td style="background-color: red"></td>
				<td>3 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M104</td>
				<td>X-SPIRIT III AERODYNE(L)</td>
				<td>3500</td>
				<td>SHOEI</td>
				<td>L</td>
				<td style="background-color: blue"></td>
				<td>3 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M105</td>
				<td>X-SPIRIT III AERODYNE(XL)</td>
				<td>3500</td>
				<td>SHOEI</td>
				<td>XL</td>
				<td style="background-color: gold"></td>
				<td>3 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M106</td>
				<td>X-SPIRIT III BRINK(M)</td>
				<td>2837</td>
				<td>SHOEI</td>
				<td>M</td>
				<td style="background-color: red"></td>
				<td>1 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M107</td>
				<td>X-SPIRIT III BRINK(L)</td>
				<td>2837</td>
				<td>SHOEI</td>
				<td>L</td>
				<td style="background-color: blue"></td>
				<td>1 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M108</td>
				<td>X-SPIRIT III BRINK(XL)</td>
				<td>2837</td>
				<td>SHOEI</td>
				<td>XL</td>
				<td style="background-color: black"></td>
				<td>1 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M109</td>
				<td>X-SPIRIT III DAIJIRO(M)</td>
				<td>3170</td>
				<td>SHOEI</td>
				<td>M</td>
				<td style="background-color: red"></td>
				<td>3 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>M110</td>
				<td>X-SPIRIT III DAIJIRO(L)</td>
				<td>3170</td>
				<td>SHOEI</td>
				<td>L</td>
				<td style="background-color: yellow"></td>
				<td>3 YEAR</td>
				<td>
					<a href="products.php">Details</a>
					<a href="products.php">Edit</a>
					<a href="products.php">Delete</a>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>