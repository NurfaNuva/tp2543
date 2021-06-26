<?php

include_once 'database.php';

// if (!isset($_SESSION['loggedin']))
//     header("LOCATION: login.php");

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create
if (isset($_POST['create'])) {

  try {

    $stmt = $conn->prepare("INSERT INTO tbl_customers_a173823_pt2(fld_customer_name, fld_customer_phone) 
      VALUES(:name, :phone)");

    // $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);

    // $cid = $_POST['cid'];
    $name = strtoupper($_POST['name']);
    $phone = $_POST['phone'];

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

    $stmt = $conn->prepare("UPDATE tbl_customers_a173823_pt2 SET 
      fld_customer_name = :name, fld_customer_phone = :phone
      WHERE fld_customer_num = :oldcid");

    // $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
    $stmt->bindParam(':oldcid', $oldcid, PDO::PARAM_STR);

    // $cid = $_POST['cid'];
    $name = strtoupper($_POST['name']);
    $phone = $_POST['phone'];
    $oldcid = $_POST['oldcid'];

    $stmt->execute();

    header("Location: customers.php");
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Delete
if (isset($_GET['delete'])) {

  try {

    $stmt = $conn->prepare("DELETE FROM tbl_customers_a173823_pt2 where fld_customer_num = :cid");
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $cid = $_GET['delete'];
    $stmt->execute();

    header("Location: customers.php");
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

//Edit
if (isset($_GET['edit'])) {

  try {

    $stmt = $conn->prepare("SELECT * FROM tbl_customers_a173823_pt2 where fld_customer_num = :cid");
    $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
    $cid = $_GET['edit'];
    $stmt->execute();

    $editrow = $stmt->fetch(PDO::FETCH_ASSOC);
    $fID = sprintf("C%03d", $editrow['fld_customer_num']);
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }
}

// GET NEXT ID
$customer = $conn->query("SHOW TABLE STATUS LIKE 'tbl_customers_a173823_pt2'")->fetch();
$NextID = sprintf("C%03d", $customer['Auto_increment']);

$conn = null;

?>