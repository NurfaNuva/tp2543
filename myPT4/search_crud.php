<?php

include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

try {

  $result = "";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  //Create
  if (isset($_POST['search_product'])) {

    //This array will be used to store temporary
    $dataArray = array();
    $count = 0;

    $input_data = explode(" ", $_POST['input']);

?>

<div class="alert alert-info" style="font-size: 15px;">Result for
  <?php
  for ($index = 0; $index < count($input_data); $index++) {
    echo $input_data[$index] . " ";
  }
  ?>
</div>

<?php

try {

  if (count($input_data) >= 1) {

    ?>
        <div class="thumbnail" style="color: black;">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col" style="width: 6%;">Product ID</th>
                <th scope="col" style="width: 20%;">Name</th>
                <th scope="col" style="width: 6%;">Price</th>
                <th scope="col" style="width: 10%;">Brand</th>
                <th scope="col" style="width: 6%;">Size</th>
                <th scope="col" style="width: 10%">Warranty</th>
              </tr>
            </thead>
            <tbody>

              <?php
              for ($index = 0; $index < count($input_data); $index++) {

                $stmt = $conn->prepare("SELECT * FROM  tbl_products_a173823_pt2 WHERE fld_product_name LIKE :first_string OR fld_product_price LIKE :first_string OR fld_product_brand LIKE :first_string");

                $stmt->bindParam(':first_string', $first_string, PDO::PARAM_STR);

                $first_string = $input_data[$index];
                $first_string = "%$first_string%";

                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $readrow) {
                  if (empty($dataArray)) {

                    $dataArray[$count] = $readrow['fld_product_name'];
                    $count++;
                    ?>
                    <tr>
                      <td><?php echo $readrow['fld_product_num']; ?></td>
                      <td><?php echo $readrow['fld_product_name']; ?></td>
                      <td><?php echo $readrow['fld_product_price']; ?></td>
                      <td><?php echo $readrow['fld_product_brand']; ?></td>
                      <td><?php echo $readrow['fld_product_size']; ?></td>
                      <td><?php echo $readrow['fld_product_warranty']; ?></td>
                    </tr>

                    <?php
                  } else {

                    if (in_array($readrow['fld_product_name'], $dataArray, TRUE)) {

                    } else {

                      $dataArray[$count] = $readrow['fld_product_name'];
                      $count++;
                      ?>
                      <tr>
                        <td><?php echo $readrow['fld_product_num']; ?></td>
                        <td><?php echo $readrow['fld_product_name']; ?></td>
                        <td><?php echo $readrow['fld_product_price']; ?></td>
                        <td><?php echo $readrow['fld_product_brand']; ?></td>
                        <td><?php echo $readrow['fld_product_size']; ?></td>
                        <td><?php echo $readrow['fld_product_warranty']; ?></td>
                      </tr>
                      <?php
                    }
                  }
                }
              }
              ?>
            </tbody>
          </table>
        </div>
      <?php

      } else {

      ?>
        <div class="thumbnail" style="color: black;">
          <table class="table table-hover">
            <thead>
              <th scope="col" style="width: 6%;">Product ID</th>
              <th scope="col" style="width: 20%;">Name</th>
              <th scope="col" style="width: 6%;">Price</th>
              <th scope="col" style="width: 10%;">Brand</th>
              <th scope="col" style="width: 6%;">Size</th>
              <th scope="col" style="width: 10%">Warranty</th>
            </tr>


            <?php
            for ($index = 0; $index < count($input_data); $index++) {

              $stmt = $conn->prepare("SELECT * FROM  tbl_products_a173823_pt2 WHERE fld_product_name LIKE :first_string OR fld_product_price LIKE :first_string OR fld_product_brand LIKE :first_string");

              $stmt->bindParam(':first_string', $first_string, PDO::PARAM_STR);

              $first_string = $input_data[$index];
              $first_string = "%$first_string%";

              $stmt->execute();
              $result = $stmt->fetchAll();

              foreach ($result as $readrow) {
                ?>
                <tr>
                  <td><?php echo $readrow['fld_product_num']; ?></td>
                  <td><?php echo $readrow['fld_product_name']; ?></td>
                  <td><?php echo $readrow['fld_product_price']; ?></td>
                  <td><?php echo $readrow['fld_product_brand']; ?></td>
                  <td><?php echo $readrow['fld_product_size']; ?></td>
                  <td><?php echo $readrow['fld_product_warranty']; ?></td>
                </tr>
              </thead>
              <tbody>
              <?php }
            }
            ?>
          </table>
        </div>
      <?php

      }

      if ($result == "") {
      ?>
        <div>
          <p style="color: gainsboro;"> No result found.</p>
        </div>
<?php
      }
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
?>