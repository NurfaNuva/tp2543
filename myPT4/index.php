<?php
require 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>BikeZone</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
  	<?php include_once 'nav_bar.php'; ?>

  	<div class="container-fluid">
      <div class="container content" style="text-align: center;">
        <section class="text-center">
          <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
            	<img src="products/bikezone.png" style="padding-top: 20px;">
              <h3 class="text-white" style="font-weight: bold;">Motorcycle Helmet Management System</h3>
              <hr><br>
              <p style="color: gainsboro;">Search product by either name, price, brand or all three.</p>
            </div>

            <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
            	<form action="search.php" method="post">
            		<input type="text" style="text-align:center; height: 50px; font-size: 20px;" class="form-control form-control-lg" name="input" placeholder="X-SPIRIT III(M) 2948 SHOEI" required>
            		<br>
            		<button type="submit" name="search_product" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Search</button>
            	</form>
            </div>
          </div>
        </section>
      </div>

      <!-- <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
      	<div class="container-fluid" style="width: 90%; margin-top: 50px;">
      		<div id="myCarousel" class="carousel slide" data-ride="carousel">
      			<ol class="carousel-indicators">
      				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      				<li data-target="#myCarousel" data-slide-to="1"></li>
      				<li data-target="#myCarousel" data-slide-to="2"></li>
      			</ol>

      			<div class="carousel-inner">
      				<div class="item active">
      					<img src="products/ads1.jpg" alt="Slides 1" style="height:500px; width:100%;">
      				</div>
      				<div class="item">
      					<img src="products/ads2.jpg" alt="Slides 2" style="height:500px; width:100%;">
      				</div>
      				<div class="item">
      					<img src="products/ads3.jpg" alt="Slides 3" style="height:500px; width:100%;">
      				</div>
      			</div>

      			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
      				<span class="glyphicon glyphicon-chevron-left"></span>
      				<span class="sr-only">Previous</span>
      			</a>
      			<a class="right carousel-control" href="#myCarousel" data-slide="next">
      				<span class="glyphicon glyphicon-chevron-right"></span>
      				<span class="sr-only">Next</span>
      			</a>
      		</div>
      	</div>
      </div> -->

      <div class="col-xs-12 col-sm-10 col-md-10 col-md-offset-1">
      	<div class="container text-center content">
      		<h2 style="font-weight: bold; margin-top: 50px;">Product Samples</h2><br>
      		<div class="row">
      			<div class="col-sm-4">
      				<a href="products_details.php?pid=2"><img src="products/ads4.gif" class="my-image"></a>
      				<h4>X-SPIRIT III(L)</h4>
      			</div>
      			<div class="col-sm-4">
      				<a href="products_details.php?pid=12"><img src="products/ads5.gif" class="my-image"></a>
      				<h4>X-SPIRIT III KAGAYAMA</h4>
      			</div>
      			<div class="col-sm-4">
      				<a href="products_details.php?pid=1"><img src="products/ads6.gif" class="my-image"></a>
      				<h4>X-SPIRIT III(M)</h4>
      			</div>
      		</div>
      	</div>
      </div>
  </div>

  <?php include_once 'footer.php'; ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>