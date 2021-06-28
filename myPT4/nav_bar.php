<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<nav class="navbar navbar-default container-fluid navbar-fixed-top" style="background-color: #181717; border-color: #181717; border-radius: 0; font-family: Montserrat;">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="products/bikezone.png" width="160" height="20"></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="products.php" style="color:white;">Products</a></li>
        <li><a href="customers.php" style="color:white;">Customers</a></li>
        <li><a href="staffs.php" style="color:white;">Staffs</a></li>
        <li><a href="orders.php" style="color:white;">Orders</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
          aria-expanded="false" style="color:white;"><?php echo $_SESSION['user']['fld_staff_name']; ?> <span
          class="caret"></span></a>
          <ul class="dropdown-menu" style="background-color: #181717;">
            <li><a href="logout.php" style="color:white;">Log out</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>