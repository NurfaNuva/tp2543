<?php

include_once 'database.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create
if (isset($_POST['create'])) {
 
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
    $stmt->bindParam(':image', $image, PDO::PARAM_STR);
    
    // $pid = uniqid('M', true);
    // $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $warranty = $_POST['warranty'];
    $image = $_POST['image'];
    
    $stmt->execute();
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Update
if (isset($_POST['update'])) {
 
  try {
   
    $stmt = $conn->prepare("UPDATE tbl_products_a173823_pt2 SET fld_product_num = :oldpid,
      fld_product_name = :name, fld_product_price = :price, fld_product_brand = :brand,
      fld_product_size = :size, fld_product_color = :color, fld_product_warranty = :warranty
      WHERE fld_product_num = :oldpid");
    
    // $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_INT);
    $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
    $stmt->bindParam(':size', $size, PDO::PARAM_STR);
    $stmt->bindParam(':color', $color, PDO::PARAM_STR);
    $stmt->bindParam(':warranty', $warranty, PDO::PARAM_STR);
    $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
    
    // $pid = $_POST['pid'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $brand =  $_POST['brand'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $warranty = $_POST['warranty'];
    $oldpid = $_POST['oldpid'];
    
    $stmt->execute();
    
    header("Location: products.php");
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Delete
if (isset($_GET['delete'])) {
 
  try {
   
    $stmt = $conn->prepare("DELETE FROM tbl_products_a173823_pt2 WHERE fld_product_num = :pid");
    
    $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
    
    $pid = $_GET['delete'];
    
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
  }
  
  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

$conn = null;
?>