<?php
include_once 'products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

  <title>BikeZone : Products</title>
  <link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>

  <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
      <style>
      html {
        position: relative;
        min-height: 100%;
      }
      body {
        font-family: Montserrat;
        margin-bottom: 60px; /* Margin bottom by footer height */
        padding-top: 70px;
      }
      input[type="file"] {
        display: none;
      }
    </style>
  </head>
  <body>
    <?php include_once 'nav_bar.php'; ?>

    <div class="container-fluid">
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-header">
            <?php
            if(isset($editrow) && count($editrow) > 0) {
              echo "<h2>Editing #".$fID."</h2>";
            } else {
              echo "<h2>Create New Product</h2>";
            }
            ?>
          </div>
          <form action="products.php" method="post" class="form-horizontal" enctype="multipart/form-data">
            <?php
            if (isset($_GET['edit']))
              echo "<input type='hidden' name='pid' value='".$editrow['fld_product_num']."' />";
            ?>

            <div class="col-md-4" style="height: 100%">
              <div class="thumbnail dark-1">
                <img src="products/<?php echo (isset($_GET['edit']) ? $editrow['fld_product_image'] : '') ?>" onerror="this.onerror=null;this.src='products/nophoto.png';" id="productPhoto" alt="Product Image" style="width: 100%;height: 250px;">
                <div class="caption text-center">
                  <h3 id="productImageTitle" style="word-break: break-all;">Product Image</h3>
                  <p>
                    <label class="btn btn-primary">
                      <input type="file" accept="image/*" name="fileToUpload" id="inputImage" onchange="loadFile(event);" />
                      <i class="fa fa-cloud-upload"></i> Upload
                    </label>
                  </p>
                </div>
              </div>
            </div>

            <div class="col-md-8">
            <!-- Product ID -->
            <div class="form-group">
              <label for="productid" class="col-sm-3">ID</label>
              <div class="col-sm-9">
                <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $fID; else echo $NextID; ?>" readonly>
              </div>
            </div>

            <!-- Name -->
            <div class="form-group">
              <label for="productname" class="col-sm-3">Name</label>
              <div class="col-sm-9">
                <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_name']; ?>" required>
              </div>
            </div>

            <!-- Price -->
            <div class="form-group">
              <label for="productprice" class="col-sm-3">Price</label>
              <div class="col-sm-9">
                <input name="price" type="number" class="form-control" id="productprice" placeholder="Product Price" min="1.00" step="0.01" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_price']; ?>" required>
              </div>
            </div>

            <!-- Brand -->
            <div class="form-group">
              <label for="productbrand" class="col-sm-3">Brand</label>
              <div class="col-sm-9">
                <select name="brand" class="form-control" id="productbrand" required>
                  <option value="SHOEI" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SHOEI") echo "selected"; ?>>SHOEI</option>
                  <option value="ARAI" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="ARAI") echo "selected"; ?>>ARAI</option>
                  <option value="AGV" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="AGV") echo "selected"; ?>>AGV</option>
                  <option value="SCORPION" <?php if(isset($_GET['edit'])) if($editrow['fld_product_brand']=="SCORPION") echo "selected"; ?>>SCORPION</option>
                </select>
              </div>
            </div>

            <!-- Size -->
            <div class="form-group">
              <label for="productsize" class="col-sm-3">Size</label>
              <div class="col-sm-9">
                <select name="size" class="form-control" id="productsize" required>
                  <option value="M" <?php if(isset($_GET['edit'])) if($editrow['fld_product_size']=="M") echo "selected"; ?>>M</option>
                  <option value="L" <?php if(isset($_GET['edit'])) if($editrow['fld_product_size']=="L") echo "selected"; ?>>L</option>
                  <option value="XL" <?php if(isset($_GET['edit'])) if($editrow['fld_product_size']=="XL") echo "selected"; ?>>XL</option>
                </select>
              </div>
            </div>

            <!-- Color -->
            <div class="form-group">
              <label for="productcolor" class="col-sm-3">Color</label>
              <div class="col-sm-9">
                <input name="color" type="color" class="form-control" id="productcolor" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_product_color']; ?>">
              </div>
            </div>

            <!-- Warranty -->
            <div class="form-group">
              <label for="productwty" class="col-sm-3">Manufacturing Year</label>
              <div class="col-sm-9">
                <select name="warranty" class="form-control" id="productwty" required>
                  <option value="1 YEAR" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="1 YEAR") echo "selected"; ?>>1 YEAR</option>
                  <option value="2 YEAR" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="2 YEAR") echo "selected"; ?>>2 YEAR</option>
                  <option value="3 YEAR" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="3 YEAR") echo "selected"; ?>>3 YEAR</option>
                  <option value="LIFETIME" <?php if(isset($_GET['edit'])) if($editrow['fld_product_warranty']=="LIFETIME") echo "selected"; ?>>LIFETIME</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-9">
                <?php if (isset($_GET['edit'])) { ?>
                  <input type="hidden" name="oldpid" value="<?php echo $editrow['fld_product_num']; ?>">
                  <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
                <?php } else { ?>
                  <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
                <?php } ?>
                <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>

    <hr>
    
      <div class="row">
        <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
          <div class="page-header">
            <h2>Products List</h2>
          </div>
          <table class="table table-striped table-bordered">
            <tr>
              <th>Product ID</th>
              <th>Name</th>
              <th>Price</th>
              <th>Brand</th>
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
              $stmt = $conn->prepare("select * from tbl_products_a173823_pt2 LIMIT $start_from, $per_page");
              $stmt->execute();
              $result = $stmt->fetchAll();
            }
            catch(PDOException $e){
              echo "Error: " . $e->getMessage();
            }
            foreach($result as $readrow) {
              ?>   

              <tr>
                <td><?php echo $readrow['fld_product_num']; ?></td>
                <td><?php echo $readrow['fld_product_name']; ?></td>
                <td><?php echo $readrow['fld_product_price']; ?></td>
                <td><?php echo $readrow['fld_product_brand']; ?></td>
                <td>
                  <a href="products_details.php?pid=<?php echo $readrow['fld_product_num']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
                  <a href="products.php?edit=<?php echo $readrow['fld_product_num']; echo (isset($_GET['page']) ? '&page='.$_GET['page'] : ''); ?>" class="btn btn-success btn-xs" role="button"> Edit </a>
                  <a href="products.php?delete=<?php echo $readrow['fld_product_num']; ?>" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger btn-xs" role="button">Delete</a>
                </td>
              </tr>

              <?php
            }
            $conn = null;
            ?>
          </table>
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
                $stmt = $conn->prepare("SELECT * FROM tbl_products_a173823_pt2");
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
                <li><a href="products.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
                <?php
              }
              for ($i=1; $i<=$total_pages; $i++)
                if ($i == $page)
                  echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
                else
                  echo "<li><a href=\"products.php?page=$i\">$i</a></li>";
                ?>
                <?php if ($page==$total_pages) { ?>
                  <li class="disabled"><span aria-hidden="true">»</span></li>
                <?php } else { ?>
                  <li><a href="products.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
                <?php } ?>
              </ul>
            </nav>
          </div>

        </div>
      </div>

      <?php include_once 'footer.php'; ?>

      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>

      <script type="application/javascript">
        var loadFile = function (event) {
          var reader = new FileReader();
          reader.onload = function () {
            var output = document.getElementById('productPhoto');
            output.src = reader.result;
          };
          reader.readAsDataURL(event.target.files[0]);
          document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
        };
      </script>

    </body>
    </html>