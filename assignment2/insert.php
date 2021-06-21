<?php

if (isset($_POST['add_form'])) {

  include "db.php";

  try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO myguestbook(user, email, postdate, posttime, comment, find_me, like_page, like_form, like_ui) VALUES (:user, :email, :pdate, :ptime, :comment, :find_me, :like_page, :like_form, :like_ui)");

      // Bind the parameters
    $stmt->bindParam(':user', $name, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':pdate', $postdate, PDO::PARAM_STR);
    $stmt->bindParam(':ptime', $posttime, PDO::PARAM_STR);
    $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);

    $stmt->bindParam(':find_me', $find_me, PDO::PARAM_STR);
    $stmt->bindParam(':like_page', $like_page, PDO::PARAM_STR);
    $stmt->bindParam(':like_form', $like_form, PDO::PARAM_STR);
    $stmt->bindParam(':like_ui', $like_ui, PDO::PARAM_STR);

      // Give value to the variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $postdate = date("Y-m-d",time());
    $posttime = date("H:i:s",time());
    $comment = $_POST['comment'];

    $find_me = $_POST['find_me'];
    $like_page = (isset($_POST['like_page'])? 1:0);
    $like_form = (isset($_POST['like_form'])? 1:0);
    $like_ui = (isset($_POST['like_ui'])? 1:0);

    $stmt->execute();

    header("Location:list.php");
    // echo "New records created successfully";
  }

  catch(PDOException $e)
  {
    echo "Error: " . $e->getMessage();
  }

  $conn = null;
}
else {
  echo "Error: You have execute a wrong PHP. Please contact the web administrator.";
  die();
}

?>