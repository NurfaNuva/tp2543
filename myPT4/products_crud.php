<?php

include_once 'database.php';

// if (!isset($_SESSION['loggedin']))
//   header("LOCATION: login.php");

function uploadPhoto($file)
{
  $target_dir = "products/";
  $target_file = $target_dir . basename($file["name"]);
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    /*
     * 0 = image file is a fake image
     * 1 = file is too large.
     * 2 = PNG & GIF files are allowed
     * 3 = Server error
     * 4 = No file were uploaded
     */

    if ($file['error'] == 4)
      return 4;

    // Check if image file is a actual image or fake image
    if (!getimagesize($file['tmp_name']))
      return 0;

    // Check file size
    if ($file["size"] > 10000000)
      return 1;

    // Allow certain file formats
    if ($imageFileType != "png" && $imageFileType != "gif")
      return 2;

    if (!move_uploaded_file($file["tmp_name"], $target_file))
      return 3;

    return array('status' => 200, 'name' => basename($file["name"]));
  }

  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create
  if (isset($_POST['create'])) {
    $flag = uploadPhoto($_FILES['fileToUpload']);

    if (isset($flag['status'])) {
      try {

        $stmt = $conn->prepare("INSERT INTO tbl_products_a173823_pt2(
          fld_product_name, fld_product_price, fld_product_brand, fld_product_size,
          fld_product_color, fld_product_warranty, fld_product_image) VALUES(:name, :price, :brand,
          :size, :color, :warranty, :image)");

    // $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price, PDO::PARAM_INT);
        $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
        $stmt->bindParam(':size', $size, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':warranty', $warranty, PDO::PARAM_STR);
        $stmt->bindParam(':image', $flag['name']);

    // $pid = $_POST['pid'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $brand =  $_POST['brand'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $warranty = $_POST['warranty'];

        $stmt->execute();
      }

      catch(PDOException $e)
      {
        // $_SESSION['error'] = $e->getMessage();
        echo "Error: " . $e->getMessage();
      }

    } else {
      if ($flag == 0)
        // $_SESSION['error'] = "Please make sure the file uploaded is an image.";
        echo "Error: Please make sure the file uploaded is an image.";
      elseif ($flag == 1)
        // $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
        echo "Error: Sorry, only file with below 10MB are allowed.";
      elseif ($flag == 2)
        // $_SESSION['error'] = "Sorry, only PNG & GIF files are allowed.";
        echo "Error: Sorry, only PNG & GIF files are allowed.";
      elseif ($flag == 3)
        // $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        echo "Error: Sorry, there was an error uploading your file.";
      elseif ($flag == 4)
        // $_SESSION['error'] = "Please upload an image.";
        echo "Error: Please upload an image.";
      else
        // $_SESSION['error'] = "An unknown error has been occurred.";
        echo "Error: An unknown error has been occurred.";
    }

    // header("LOCATION: {$_SERVER['REQUEST_URI']}");
    // exit();
  }

//Update
  if (isset($_POST['update'])) {

    try {

      $stmt = $conn->prepare("UPDATE tbl_products_a173823_pt2 SET 
        fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand,
        fld_product_size = :size, fld_product_color = :color, fld_product_warranty = :warranty
        WHERE fld_product_num = :oldpid LIMIT 1");

    // $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':price', $price, PDO::PARAM_INT);
      $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
      $stmt->bindParam(':size', $size, PDO::PARAM_STR);
      $stmt->bindParam(':color', $color, PDO::PARAM_STR);
      $stmt->bindParam(':warranty', $warranty, PDO::PARAM_STR);
      $stmt->bindParam(':oldpid', $oldpid);

    // $pid = $_POST['pid'];
      $name = $_POST['name'];
      $price = $_POST['price'];
      $brand =  $_POST['brand'];
      $size = $_POST['size'];
      $color = $_POST['color'];
      $warranty = $_POST['warranty'];
      $oldpid = $_POST['oldpid'];

      $stmt->execute();

      // Image Upload
      $flag = uploadPhoto($_FILES['fileToUpload']);
      if (isset($flag['status'])) {
        $stmt = $conn->prepare("UPDATE tbl_products_a173823_pt2 SET fld_product_image = :image WHERE fld_product_num = :oldpid LIMIT 1");

        $stmt->bindParam(':image', $flag['name']);
        $stmt->bindParam(':oldpid', $oldpid);
        $stmt->execute();

      } elseif($flag == 4) {
        if ($flag == 0)
        // $_SESSION['error'] = "Please make sure the file uploaded is an image.";
          echo "Error: Please make sure the file uploaded is an image.";
        elseif ($flag == 1)
        // $_SESSION['error'] = "Sorry, only file with below 10MB are allowed.";
          echo "Error: Sorry, only file with below 10MB are allowed.";
        elseif ($flag == 2)
        // $_SESSION['error'] = "Sorry, only PNG & GIF files are allowed.";
          echo "Error: Sorry, only PNG & GIF files are allowed.";
        elseif ($flag == 3)
        // $_SESSION['error'] = "Sorry, there was an error uploading your file.";
          echo "Error: Sorry, there was an error uploading your file.";
        else
        // $_SESSION['error'] = "An unknown error has been occurred.";
          echo "Error: An unknown error has been occurred.";
      }

    } catch (PDOException $e) {
      // $_SESSION['error'] = $e->getMessage();
      echo "Error: " . $e->getMessage();
    }

    // if (isset($_SESSION['error']))
    //   header("LOCATION: {$_SERVER['REQUEST_URI']}");
    // else
      header("Location: products.php");

    // exit();
  }

//Delete
  if (isset($_GET['delete'])) {

    try {

      $id = $_GET['delete'];
      $stmt = $conn->prepare("SELECT fld_product_image FROM tbl_products_a173823_pt2 WHERE fld_product_num = :pid LIMIT 1");
      $stmt->bindParam(':pid', $id, PDO::PARAM_STR);
      
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);

      $path = 'products/' . $result['fld_product_image'];
      if (file_exists($path))
        unlink($path);
      
      $stmt = $conn->prepare("DELETE FROM tbl_products_a173823_pt2 WHERE fld_product_num = :pid");
      $stmt->bindParam(':pid', $id, PDO::PARAM_STR);
      $stmt->execute();

      header("Location: products.php");
    }

    catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
  }

//Edit
  if (isset($_GET['edit'])) {

    try {

      $stmt = $conn->prepare("SELECT * FROM tbl_products_a173823_pt2 WHERE fld_product_num = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['edit'];
      $stmt->execute();

      $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
      $fID = sprintf("M%03d", $editrow['fld_product_num']);

      if (empty($editrow['fld_product_image']))
        $editrow['fld_product_image'] = $editrow['fld_product_num'] . '.png';
    }

    catch(PDOException $e)
    {
      echo "Error: " . $e->getMessage();
    }
  }

  // GET NEXT ID
  $product = $conn->query("SHOW TABLE STATUS LIKE 'tbl_products_a173823_pt2'")->fetch();
  $NextID = sprintf("M%03d", $product['Auto_increment']);

  $conn = null;
?>