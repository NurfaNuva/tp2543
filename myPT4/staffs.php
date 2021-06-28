<?php
include_once 'staffs_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>BikeZone : Staffs</title>
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
							echo "<h2>Create New Staff</h2>";
						}
						?>
					</div>

					<form action="staffs.php" method="post" class="form-horizontal">
						<?php
						if (isset($_GET['edit'])) {
							"<input type='hidden' name='sid' value='".$editrow['fld_staff_num']."' />";
						}
						?>

						<!-- Staff ID -->
						<div class="form-group">
							<label for="staffid" class="col-sm-3">ID</label>
							<div class="col-sm-9">
								<input name="sid" type="text" class="form-control" id="staffid" placeholder="Staff ID" value="<?php if(isset($_GET['edit'])) echo $fID; else echo $NextID; ?>" readonly>
							</div>
						</div>

						<!-- Name -->
						<div class="form-group">
							<label for="name" class="col-sm-3">Name</label>
							<div class="col-sm-9">
								<input name="name" type="text" class="form-control" id="name" placeholder="Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_name']; ?>" required>
							</div>
						</div>

						<!-- Phone Number -->
						<div class="form-group">
							<label for="staffphone" class="col-sm-3">Phone Number</label>
							<div class="col-sm-9">
								<input name="phone" type="text" class="form-control" id="staffphone" placeholder="0##-#######" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_staff_phone']; ?>" pattern="^01[0-9]{1}-([0-9]{8}|[0-9]{7})" required>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail" class="col-sm-3">Email</label>
							<div class="col-sm-9">
								<input name="email" type="email" class="form-control" id="inputEmail" placeholder="Email"
								value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_email']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label for="inputEmail" class="col-sm-3">Password</label>
							<div class="col-sm-9">
								<input name="password" type="text" class="form-control" id="inputEmail" placeholder="Password"
								value="<?php if (isset($_GET['edit'])) echo $editrow['fld_staff_password']; ?>" required>
							</div>
						</div>

						<div class="form-group">
							<label for="role" class="col-sm-3">Role</label>
							<div class="col-sm-9">
								<select class="form-control" name="role">
									<option value="normal" <?php echo (isset($_GET['edit']) && $editrow['fld_staff_role'] == 'normal' ? 'selected' : ''); ?>>Normal Staff</option>
									<option value="admin" <?php echo (isset($_GET['edit']) && $editrow['fld_staff_role'] == 'admin' ? 'selected' : ''); ?>>Administrator</option>
								</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-sm-offset-3 col-sm-9">
								<?php if (isset($_GET['edit'])) { ?>
									<input type="hidden" name="oldsid" value="<?php echo $editrow['fld_staff_num']; ?>">
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
  					<h2>Staff List</h2>
  				</div>
  				<div class="thumbnail" style="background-color: white; color: black;">
  					<table class="table table-hover">
  						<tr>
  							<th>Staff ID</th>
  							<th>Name</th>
  							<th>Phone Number</th>
  							<?php
  							if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'admin') {
  								?>
  								<th>Email</th>
  								<th>Password</th>
  								<th>Role</th>
  							<?php } ?>
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
  							$stmt = $conn->prepare("select * from tbl_staffs_a173823_pt2 LIMIT $start_from, $per_page");
  							$stmt->execute();
  							$result = $stmt->fetchAll();
  						}
  						catch(PDOException $e){
  							echo "Error: " . $e->getMessage();
  						}
  						foreach($result as $readrow) {
  							?>
  							<tr>
  								<td><?php echo $readrow['fld_staff_num']; ?></td>
  								<td><?php echo $readrow['fld_staff_name']; ?></td>
  								<td><?php echo $readrow['fld_staff_phone']; ?></td>
  								<?php
  								if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'admin') {
  									?>
  									<td><?php echo $readrow['fld_staff_email']; ?></td>
  									<td><?php echo $readrow['fld_staff_password']; ?></td>
  									<td><?php echo $readrow['fld_staff_role']; ?></td>
  								<?php } ?>
  								<td>
  									<?php
  									if (isset($_SESSION['user']) && $_SESSION['user']['fld_staff_role'] == 'admin') {
  										?>
  										<a href="staffs.php?edit=<?php echo $readrow['fld_staff_num']; ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
  										<a href="staffs.php?delete=<?php echo $readrow['fld_staff_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
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
  							$stmt = $conn->prepare("SELECT * FROM tbl_staffs_a173823_pt2");
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
  							<li class="disabled"><span aria-hidden="true">«</span></li>
  						<?php } else { ?>
  							<li><a href="staffs.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
  							<?php
  						}
  						for ($i=1; $i<=$total_pages; $i++)
  							if ($i == $page)
  								echo "<li class=\"active\"><a href=\"staffs.php?page=$i\">$i</a></li>";
  							else
  								echo "<li><a href=\"staffs.php?page=$i\">$i</a></li>";
  							?>
  							<?php if ($page==$total_pages) { ?>
  								<li class="disabled"><span aria-hidden="true">»</span></li>
  							<?php } else { ?>
  								<li><a href="staffs.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
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