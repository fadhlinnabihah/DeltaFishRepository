<?php

include_once 'db.php';
  
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create
if (isset($_POST['create'])) {
   
      try {

   $stmt = $conn->prepare("UPDATE tbl_user_delta SET NAME = :name, PHONE = :phone WHERE USERNAME = :user ");

      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      
      $name = $_POST['name'];
      $phone = $_POST['phone'];
      $user = $_SESSION['user']['USERNAME'];
      $stmt->execute();

      foreach ($_SESSION['orderid'] as $oid) {
      $stmt = $conn->prepare("UPDATE tbl_order_delta SET fld_payment = :payment, fld_date_pickup = :date_pickup,  WHERE fld_order_num = :soid"); 
      $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
      $stmt->bindParam(':date_pickup', $date_pickup, PDO::PARAM_STR);
      $stmt->bindParam(':soid', $soid, PDO::PARAM_STR);

      $payment = $_POST['payment'];
      $date_pickup = $_POST['date_pickup'];
      $soid = $oid;
      $stmt->execute();
      }

      }
      catch(PDOException $e){
        $_SESSION['error'] = "Error while Creating: " . $e->getMessage();
      }
      unset($_SESSION['orderid']);
      header('Location: success.php');
    exit;
}

$conn = null;
?>