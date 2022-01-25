<?php

include_once 'db.php';
  
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Create
if (isset($_POST['create'])) {
   
      try {

   $stmt = $conn->prepare("UPDATE tbl_user_delta SET NAME = :name, PHONE = :phone, ADDRESS = :address WHERE USERNAME = :user ");

      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
      $stmt->bindParam(':user', $user, PDO::PARAM_STR);
      
      $name = $_POST['name'];
      $phone = $_POST['phone']?? 'any default value, but probably null';
      $address =  $_POST['address'];
      $user = $_SESSION['user']['USERNAME'];
      $stmt->execute();

      foreach ($_SESSION['orderid'] as $oid) {
      $stmt = $conn->prepare("UPDATE tbl_order_delta SET fld_deli_time = :deli_time, fld_payment = :payment WHERE fld_order_num = :soid"); 
      $stmt->bindParam(':deli_time', $deli_time, PDO::PARAM_STR);
      $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
      $stmt->bindParam(':soid', $soid, PDO::PARAM_STR);

      $deli_time = $_POST['deli_time']?? 'any default value, but probably null';
      $payment = $_POST['payment'];
      $soid = $oid;
      $stmt->execute();
      }

      }
      catch(PDOException $e){
        $_SESSION['error'] = "Error while Creating: " . $e->getMessage();
      }
      unset($_SESSION['orderid']);
      header('Location: deliverytype.php');
    exit;
}

$conn = null;
?>