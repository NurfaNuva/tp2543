<?php
include_once 'database.php';
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

	<title>BikeZone: Product Search</title>
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
              <h1 class="text-white" style="font-weight: bold;">Product Search</h1>
              <br>
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

      <div class="container content" style="margin-top: 50px;">
        <?php
        include_once 'search_crud.php';
        ?>
      </div>
    </div>

  	<?php include_once 'footer.php'; ?>

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>

    <script>
      $(document).on("click", ".browse", function() {
        var file = $(this).parents().find(".file");
        file.trigger("click");
      });
      $('input[type="file"]').change(function(e) {
        var fileName = e.target.files[0].name;
        $("#file").val(fileName);

        var reader = new FileReader();
        reader.onload = function(e) {
        // get loaded data and render thumbnail.
        document.getElementById("preview").src = e.target.result;
        };
      // read the image file as a data URL.
      reader.readAsDataURL(this.files[0]);
      });
    </script>
</body>
</html>