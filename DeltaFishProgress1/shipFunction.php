<?php
 
  include_once "db.php";
 
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['pay'])) {   
  try {    
      // Prepare the SQL statement
      $stmt = $conn->prepare("INSERT INTO tbl_order_delta(tbl_payment,tbl_address) VALUES (:payment, :address)");
     
      // Bind the parameters
      $stmt->bindParam(':payment', $payment, PDO::PARAM_STR);
      $stmt->bindParam(':address', $address, PDO::PARAM_STR);
      // $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      // $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);    
      // $stmt->bindParam(':email', $email, PDO::PARAM_STR);
      // $stmt->bindParam(':fpassq', $fpassq, PDO::PARAM_STR);
      // $stmt->bindParam(':fpass', $fpass, PDO::PARAM_STR);
      
      
      $payment = $_POST['payment'];
      $address = $_POST['address'];
      // $name = $_POST['name'];
      // $phone = $_POST['phone'];
      // $email = $_POST['email'];
      // $fpassq = $_POST['fpassq'];
      // $fpass = $_POST['fpass'];
      $stmt->execute();
      echo "<script>
      alert('Payment Updated!');
      window.location.href='ship.php';
      </script>";
      /*$count = $stmt->rowCount();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($count > 0){
      session_start();
       $_SESSION["username"]=$result['username'];
      echo "<script>
      alert('Username already taken!');
      window.location.href='register.php';
      </script>";
      //header("location:register.php");

    }else{
      
      echo "<script>
      alert('Successfully Register!');
      window.location.href='login.php';
      </script>";
    }*/
     
   
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