<?php
include_once 'customers_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>BikeZone : Customers</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<?php include_once 'nav_bar.php'; ?>

	<?php
	if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'admin') {
		?>

		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
					<div class="page-header">
						<?php
						if (isset($editrow) && count($editrow) > 0) {
							echo "<h2>Editing #".$fID."</h2>";
						} else {
							echo "<h2>Create New Customer</h2>";
						}
						?>
					</div>

					<form action="customers.php" method="post" class="form-horizontal">
						<?php
						if (isset($_GET['edit'])) {
							"<input type='hidden' name='cid' value='".$editrow['fld_customer_num']."' />";
						}
						?>

						<!-- Customer ID -->
						<div class="form-group">
							<label for="custid" class="col-sm-3">ID</label>
							<div class="col-sm-9">
								<input name="cid" type="text" class="form-control" id="custid" placeholder="Customer ID" value="<?php if(isset($_GET['edit'])) echo $fID; else echo $NextID; ?>" readonly>
							</div>
						</div>

						<!-- Name -->
						<div class="form-group">
							<label for="name" class="col-sm-3">Name</label>
							<div class="col-sm-9">
								<input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_name']; ?>" required>
							</div>
						</div>

						<!-- Phone Number -->
						<div class="form-group">
							<label for="custphone" class="col-sm-3">Phone Number</label>
							<div class="col-sm-9">
								<input name="phone" type="text" class="form-control" id="custphone" placeholder="0##-#######" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_customer_phone']; ?>" pattern="^01[0-9]{1}-([0-9]{8}|[0-9]{7})" required>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<?php if (isset($_GET['edit'])) { ?>
									<input type="hidden" name="oldcid" value="<?php echo $editrow['fld_customer_num']; ?>">
									<button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
								<?php } else { ?>
									<button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
								<?php } ?>
								<button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
							</div>
						</div>
					</form>
				</div>
			</div>

		<?php } ?>

		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<div class="page-header">
					<h2>Customer List</h2>
				</div>
				<div class="thumbnail" style="background-color: white; color: black;">
					<table class="table table-hover">
						<tr>
							<th>Customer ID</th>
							<th>Name</th>
							<th>Phone Number</th>
							<th></th>
						</tr>

						<?php
      			// Read
						$per_page = 10;
						if (isset($_GET["page"]))
							$page = $_GET["page"];
						else
							$page = 1;
						$start_from = ($page-1) * $per_page;

						try {
							$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$stmt = $conn->prepare("select * from tbl_customers_a173823_pt2 LIMIT $start_from, $per_page");
							$stmt->execute();
							$result = $stmt->fetchAll();
						}
						catch(PDOException $e){
							echo "Error: " . $e->getMessage();
						}
						foreach($result as $readrow) {
							?>

							<tr>
								<td><?php echo $readrow['fld_customer_num']; ?></td>
								<td><?php echo $readrow['fld_customer_name']; ?></td>
								<td><?php echo $readrow['fld_customer_phone']; ?></td>
								<td>
									<?php
									if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'admin') {
										?>
										<a href="customers.php?edit=<?php echo $readrow['fld_customer_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
										<a href="customers.php?delete=<?php echo $readrow['fld_customer_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
									<?php } ?>
								</td>
							</tr>

							<?php
						}
						$conn = null;
						?>
					</table>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
				<nav>
					<ul class="pagination">
						<?php
						try {
							$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
							$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
							$stmt = $conn->prepare("SELECT * FROM tbl_customers_a173823_pt2");
							$stmt->execute();
							$result = $stmt->fetchAll();
							$total_records = count($result);
						}
						catch(PDOException $e){
							echo "Error: " . $e->getMessage();
						}
						$total_pages = ceil($total_records / $per_page);
						?>
						<?php if ($page==1) { ?>
							<li class="disabled"><span aria-hidden="true">??</span></li>
						<?php } else { ?>
							<li><a href="customers.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">??</span></a></li>
							<?php
						}
						for ($i=1; $i<=$total_pages; $i++)
							if ($i == $page)
								echo "<li class=\"active\"><a href=\"customers.php?page=$i\">$i</a></li>";
							else
								echo "<li><a href=\"customers.php?page=$i\">$i</a></li>";
							?>
							<?php if ($page==$total_pages) { ?>
								<li class="disabled"><span aria-hidden="true">??</span></li>
							<?php } else { ?>
								<li><a href="customers.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">??</span></a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</div>

		<?php include_once 'footer.php'; ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>