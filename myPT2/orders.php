<?php
include_once 'orders_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>BikeZone : Orders</title>
  <link rel="shortcut icon" type="image/x-icon" href="products/BikeZone ico.ico"/>
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
      <form action="orders.php" method="post">
        <ul>
          <li>
            <label>Order ID</label> 
            <input name="oid" type="text" value="<?php echo (isset($_GET['edit']) ? $_GET['edit'] : uniqid('O', true)); ?>" readonly>
          </li>
          <li>
            <label>Order Date</label> 
            <input name="orderdate" type="text" value="<?php if(isset($_GET['edit'])) echo $editrow['fld_order_date']; ?>" readonly>
          </li>
          
          <!-- list of staffs -->
          <li>
            <label>Staff</label> 
            <select name="sid">
              <?php
              try {
               $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $stmt = $conn->prepare("SELECT * FROM tbl_staffs_a173823_pt2");
               $stmt->execute();
               $result = $stmt->fetchAll();
             }
             catch(PDOException $e){
               echo "Error: " . $e->getMessage();
             }
             foreach($result as $staffrow) {
               ?>
               <?php if((isset($_GET['edit'])) && ($editrow['fld_staff_num']==$staffrow['fld_staff_num'])) { ?>
                <option value="<?php echo $staffrow['fld_staff_num']; ?>" selected><?php echo $staffrow['fld_staff_name'] ?></option>
              <?php } else { ?>
                <option value="<?php echo $staffrow['fld_staff_num']; ?>"><?php echo $staffrow['fld_staff_name'] ?></option>
              <?php } ?>
              <?php
           } // while
           $conn = null;
           ?> 
         </select>
       </li>

       <!-- list of customers -->
       <li>
         <label>Customer</label> 
         <select name="cid">
           <?php
           try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_customers_a173823_pt2");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $custrow) {
            ?>
            <?php if((isset($_GET['edit'])) && ($editrow['fld_customer_num']==$custrow['fld_customer_num'])) { ?>
             <option value="<?php echo $custrow['fld_customer_num']; ?>" selected><?php echo $custrow['fld_customer_name'] ?></option>
           <?php } else { ?>
             <option value="<?php echo $custrow['fld_customer_num']; ?>"><?php echo $custrow['fld_customer_name'] ?></option>
           <?php } ?>
           <?php
          } // while
          $conn = null;
          ?> 
        </select>
      </li>

      <hr style="margin: 20px 0;">
      <div style="margin: auto; display: flex; align-items: center; justify-content: center;">
        <?php if (isset($_GET['edit'])) { ?>
          <button type="submit" name="update">Update</button>
        <?php } else { ?>
          <button type="submit" name="create">Create</button>
        <?php } ?>
        <button type="reset">Clear</button>
      </div>
    </ul>
  </form>
</div>
<br><hr><br>
<table border="1" style="width: 50%">
 <tr>
  <td>Order ID</td>
  <td>Order Date</td>
  <td>Staff ID</td>
  <td>Customer ID</td>
  <td></td>
</tr>

<?php
try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "SELECT * FROM tbl_orders_a173823, tbl_staffs_a173823_pt2, tbl_customers_a173823_pt2 WHERE ";
  $sql = $sql."tbl_orders_a173823.fld_staff_num = tbl_staffs_a173823_pt2.fld_staff_num and ";
  $sql = $sql."tbl_orders_a173823.fld_customer_num = tbl_customers_a173823_pt2.fld_customer_num";
  $stmt = $conn->prepare($sql);
  $stmt->execute();
  $result = $stmt->fetchAll();
}
catch(PDOException $e){
  echo "Error: " . $e->getMessage();
}
foreach($result as $orderrow) {
  ?>
  <tr>
   <td><?php echo $orderrow['fld_order_num']; ?></td>
   <td><?php echo $orderrow['fld_order_date']; ?></td>
   <td><?php echo $orderrow['fld_staff_name']; ?></td>
   <td><?php echo $orderrow['fld_customer_name']; ?></td>
   <td>
    <a href="orders_details.php?oid=<?php echo $orderrow['fld_order_num']; ?>">Details</a>
    <a href="orders.php?edit=<?php echo $orderrow['fld_order_num']; ?>">Edit</a>
    <a href="orders.php?delete=<?php echo $orderrow['fld_order_num']; ?>" onclick="return confirm('Are you sure to delete?');">Delete</a>
  </td>
</tr>
<?php
}
$conn = null;
?>
</table>
</center>
</body>
</html>