<?php
 
  include_once "db.php";
 
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['pay'])) {   
  try {    
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO tbl_order_delta(fld_seller_user,fld_customer_user,fld_payment) VALUES (:seller,:customer,:payment)");
     
      // Bind the parameters
      $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
      $stmt->bindParam(':seller', $seller, PDO::PARAM_STR);
      $stmt->bindParam(':customer', $customer, PDO::PARAM_STR);
      // $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);    
      // $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      // $stmt->bindParam(':fpassq', $fpassq, PDO::PARAM_STR);
      // $stmt->bindParam(':fpass', $fpass, PDO::PARAM_STR);
      
      
      $payment = $_POST['payment'];
      $seller = $_POST['name'];
      $customer = $_POST['customer'];
      // $phone = $_POST['phone'];
      // $email = $_POST['email'];
      // $fpassq = $_POST['fpassq'];
      // $fpass = $_POST['fpass'];
      $stmt->execute();
      echo "<script>
      alert('Payment Updated!');
      window.location.href='ship.php';
      </script>";
       
    }
 
    catch(PDOException $e)
    {
      echo "<script>
      alert('Username already taken!');
      window.location.href='register.php';
      </script>";
        //echo "Create Error beep boop : " . $e->getMessage();
    }
  }
   

  $conn = null;

 
 ?>