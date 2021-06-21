<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Staffs</title>
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
			<form action="staffs.php" method="post">
				<ul>
					<li>
						<label for="sid">Staff ID</label>
						<input type="text" id="sid" name="staff_id">
					</li>
					<li>
						<label for="cname">Name</label>
						<input type="text" id="sname" name="staff_name">
					</li>
					<li>
						<label for="sphone">Phone No</label>
						<input type="tel" id="sphone" name="staff_phone" pattern="^01[0-9]{1}-([0-9]{8}|[0-9]{7})" 
						placeholder="0##-#######">
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
		<table border="1" style="width: 50%">
			<tr>
				<td>Staff ID</td>
				<td>Name</td>
				<td>Phone Number</td>
				<td></td>
			</tr>
			<tr>
				<td>S101</td>
				<td>AMIR</td>
				<td>012-3545648</td>
				<td>
					<a href="staffs.php">Edit</a>
					<a href="staffs.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>S102</td>
				<td>ALEX</td>
				<td>013-5483016</td>
				<td>
					<a href="staffs.php">Edit</a>
					<a href="staffs.php">Delete</a>
				</td>
			</tr>
			<tr>
				<td>S103</td>
				<td>RAMESH</td>
				<td>019-6450221</td>
				<td>
					<a href="staffs.php">Edit</a>
					<a href="staffs.php">Delete</a>
				</td>
			</tr>
		</table>
	</center>
</body>
</html>