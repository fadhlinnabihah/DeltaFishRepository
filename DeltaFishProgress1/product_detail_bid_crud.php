
<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>



<?php
if (isset($_POST['update'])) {
 
 if( $_POST['highestbidder'] != $_POST['seller']){
  try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
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
        header("LOCATION: br_pr_bid.php");
      
      }

        header("Location: br_pr_bid.php");

    exit();
}
?>