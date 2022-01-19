<?php
  include 'db.php'
?>


<?php
if (isset($_POST['update'])) {
 
  try {
       $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
      $stmt = $conn->prepare("UPDATE tbl_productbid_delta SET
        HIGHESTBID = :highestbid
        WHERE ID = :oldpid");
     
      //$stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $stmt->bindParam(':highestbid', $highestbid, PDO::PARAM_INT);

      $stmt->bindParam(':oldpid', $oldpid, PDO::PARAM_STR);
       
    $oldpid = $_POST['oldpid'];

    $highestbid = $_POST['highestbid'];

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

        header("Location: br_pr_bid.php");

    exit();
}
?>