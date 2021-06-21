<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>BikeZone</title>
	<link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>

	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    	<style type="text/css">
    	html {
    		/*width:100%;
    		height:100%;*/
    		/*background:url(products/bikezone.png)center center no-repeat, linear-gradient(to top left, #bdc3c7, #2c3e50) no-repeat;*/
    		position: relative;
    		min-height:100%;
    	}
    	body{
    		font-family: Montserrat;
    		color: white;
    		background: linear-gradient(to top left, #232526, #414345);
    		background-repeat: no-repeat;
    		background-attachment: fixed;
    		background-size: cover;
    		margin-bottom: 60px;
    		padding-top: 70px;
    	}
    	.my-image {
    		margin: 20px 0px 0px 0px;
    		width: 300px;
    		height: 300px;
    		box-shadow: 0px 0px 10px #FFFFFF;
    		border-radius: 6px;
    		background-color: white;
    	}
    	h2{
    		font-weight: bold;
    		margin-top: 50px;
    	}
    </style>
  </head>
  <body>
  	<?php include_once 'nav_bar.php'; ?>

  	<div class="container-fluid" style="width: 90%">
  		<div id="myCarousel" class="carousel slide" data-ride="carousel">
  			<!-- Indicators -->
  			<ol class="carousel-indicators">
  				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
  				<li data-target="#myCarousel" data-slide-to="1"></li>
  				<li data-target="#myCarousel" data-slide-to="2"></li>
  				<li data-target="#myCarousel" data-slide-to="3"></li>
  				<li data-target="#myCarousel" data-slide-to="4"></li>
  			</ol>

  			<!-- Wrapper for slides -->
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
  				<div class="item">
  					<img src="products/ads4.jpg" alt="Slides 4" style="height:500px; width:100%;">
  				</div>
  				<div class="item">
  					<img src="products/ads5.jpg" alt="Slides 5" style="height:500px; width:100%;">
  				</div>
  			</div>

  			<!-- Left and right controls -->
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

  	<div class="container-fluid text-center">
  		<div class="wrapper"><h2>Top Products</h2></div><br>
  		<div class="row">
  			<div class="col-sm-4">
  				<a href="products_details.php?pid=4"><img src="products/M103.png" class="my-image"></a>
  				<h4>X-SPIRIT III AERODYNE(M)</h4>
  			</div>
  			<div class="col-sm-4">
  				<a href="products_details.php?pid=12"><img src="products/M111.png" class="my-image"></a>
  				<h4>X-SPIRIT III MARQUEZ MOTEGI3</h4>
  			</div>
  			<div class="col-sm-4">
  				<a href="products_details.php?pid=14"><img src="products/M113.png" class="my-image"></a>
  				<h4>X-SPIRIT III MM93 BLACK CONCEPT 2.0</h4>
  			</div>
  			<div class="col-sm-4">
  				<a href="products_details.php?pid=18"><img src="products/M117.png" class="my-image"></a>
  				<h4>SIGNET-X GAMMA</h4>
  			</div>
  			<div class="col-sm-4">
  				<a href="products_details.php?pid=32"><img src="products/M131.png" class="my-image"></a>
  				<h4>PISTA GP RR IRIDIUM CARBON</h4>
  			</div>
  			<div class="col-sm-4">
  				<a href="products_details.php?pid=41"><img src="products/M140.png" class="my-image"></a>
  				<h4>VX-35 KRUSH</h4>
  			</div>
  		</div>
  	</div>
  	<br>

  	<?php include_once 'footer.php'; ?>

  	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<!-- Include all compiled plugins (below), or include individual files as needed -->
  	<script src="js/bootstrap.min.js"></script>
  </body>
  </html>