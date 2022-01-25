
<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  


if (isset($_POST['update'])) {
 
 if( $_POST['highestbidder'] != $_POST['seller']){
  try {
       
      $stmt = $conn->prepare("UPDATE tbl_productbid_delta SET
        HIGHESTBID = :highestbid, HIGHESTBIDDER = :highestbidder
        WHERE ID = :oldpid");
     
      //$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':highestbid', $highestbid, PDO::PARAM_INT);
       $stmt->bindParam(':highestbidder', $highestbidder, PDO::PARAM_STR);

      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $oldpid = $_POST['oldpid'];

    $highestbid = $_POST['highestbid'];
    $highestbidder = $_POST['highestbidder'];

    // if($_POST['highestbid'] <= $highestbid)
    //     {
    //         echo "You need to enter more";
    //     }
    // else
    //     {
    //             echo "Succesfully bid";
             $stmt->execute();
    //      }
              
        
        }  catch (Exception $e) {
            $_SESSION['error'] = "Update Error *beep* *boop* :Update Error *beep* *boop* :" . $e->getMessage();
        } 
    } else{
          $_SESSION['error'] = "*blurp* *blurp* Seller cannot bid their own product *blurp* *blurp* ";
          echo '<script>alert("*blurp* *blurp* Seller cannot bid their own product *blurp* *blurp*")</script>';

        }
     if (isset($_SESSION['error'])) {
        header("LOCATION: product_detail_bid.php?pid=$oldpid");
      
      }

        header("Location: product_detail_bid.php?pid=$oldpid");

    exit();
}


if (isset($_POST['payment'])) {
     $soid="";

        try {
                $stmt = $db->prepare("INSERT INTO tbl_order_delta(fld_order_num, fld_seller_user,fld_customer_user) VALUES(:oid, :sid, :cid)");
               
                $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
                $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
                $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
                   
                $oid = uniqid('O', true);
                $soid = $oid;
                array_push($_SESSION['orderid'], $soid);
                $sid =  $_POST['sellerr'];
                $cid = $_POST['highestbidderr'];
                 
                $stmt->execute();
                }
             
              catch(PDOException $e)
              {
                  echo "Error: " . $e->getMessage();
              }
            
        

        try {
                $stmt = $db->prepare("INSERT INTO tbl_order_detail_delta( fld_order_detail_num, fld_order_num, fld_product_num, fld_order_detail_quantity) VALUES(:odid, :oid, :name, :quantity)");
                $item=1;
                $stmt->bindParam(':odid', $odid, PDO::PARAM_STR);
                $stmt->bindParam(':oid', $soid, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
                   
                $odid = uniqid('D', true);
                $soid = $oid;
                $name = $_POST['name'];
                $quantity = $item;
                 
                $stmt->execute();
                }
             
              catch(PDOException $e)
              {
                  echo "Error: " . $e->getMessage();
              }

        header('Location: deliverytype.php');      
       
    }
      

$conn = null;
?>