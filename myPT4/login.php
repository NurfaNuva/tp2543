<?php
require_once 'database.php';

if (isset($_SESSION['loggedin']))
    header("LOCATION: index.php");

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['userid'], $_POST['password'])) {
    $UserID = htmlspecialchars($_POST['userid']);
    $Pass = $_POST['password'];

    if (empty($UserID) || empty($Pass)) {
        $_SESSION['error'] = 'Please fill in the blanks.';
    } else {
        $stmt = $db->prepare("SELECT * FROM tbl_staffs_a173823_pt2 WHERE (fld_staff_email = :id) LIMIT 1");
        $stmt->bindParam(':id', $UserID);

        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user['fld_staff_password'] == $Pass) {
        	unset($user['fld_staff_password']);
        	$_SESSION['loggedin'] = true;
        	$_SESSION['user'] = $user;

        	header("LOCATION: index.php");
        	exit();
        } else {
        	$_SESSION['error'] = 'Invalid login credentials. Please try again.';
        }
    }

    header("LOCATION: " . $_SERVER['REQUEST_URI']);
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>BikeZone</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	<div class="form-structor">
		<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
			<div class="login">
				<h1 class="form-title" id="signup">Log in</h1>
				<div class="form-holder">
					<input type="email" class="input" placeholder="Email" id="inputUserID" name="userid" required />
					<input type="password" class="input" placeholder="Password" id="inputUserPass" name="password" required />
				</div>
				<?php
				if (isset($_SESSION['error'])) {
					echo "<br><p class='alert alert-danger text-center'>{$_SESSION['error']}</p>";
					unset($_SESSION['error']);
				}
				?>
				<button class="submit-btn" type="submit">Log in</button>
			</div>
		</form>
		<div class="signup slide-up">
			<div class="center text-center">
				<h4 class="form-title" id="login">Click Here</h4>
				<div class="form-holder">
					<h4>Admin</h4>
					<hr>
					<p>admin@gmail.com</p>
					<p>1234</p>
				</div>
				<div class="form-holder">
					<h4>Staff</h4>
					<hr>
					<p>staff@gmail.com</p>
					<p>1234</p>
				</div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/login.js"></script>
</body>
</html>