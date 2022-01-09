<?php

include_once 'db.php';

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$extention = ['gif','jpg', 'jpeg',];


//Delete
if (isset($_GET['delete'])) {
  // if ($_SESSION['ulevel'] == 'Admin')  {
    try {
      $pid = $_GET['delete'];
      $query = $conn->query("SELECT PICTURE FROM tbl_productbid_delta WHERE ID = '{$pid}' LIMIT 1")->fetch(PDO::FETCH_ASSOC);
      if (isset($query['PICTURE'])) {
      // Delete Query
        $stmt = $conn->prepare("DELETE FROM tbl_productbid_delta WHERE ID = :pid");
        $stmt->bindParam(':pid', $pid);
        $stmt->execute();
      // Delete Image
        unlink("pictures_bid/{$query['PICTURE']}");
      }
    }
    catch(PDOException $e)
    {
      $_SESSION['error'] = "Error while Deleting: " . $e->getMessage();
    }
  // } else {
  //   $_SESSION['error'] = "Sorry, but you don't have permission to delete this product.";
  // }
  header("LOCATION: {$_SERVER['PHP_SELF']}");
  exit();
}
$conn = null;
?>