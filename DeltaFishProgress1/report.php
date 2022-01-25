<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>

<?php
    try {
      //ada dua quary, satu untuk data buyer, satu untuk data seller
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_order_delta, tbl_user_delta, tbl_order_detail_delta, tbl_productsell_delta WHERE
        tbl_order_delta.fld_seller_user = tbl_user_delta.USERNAME AND
        tbl_order_delta.fld_order_num = tbl_order_detail_delta.fld_order_num AND
        tbl_order_delta.fld_order_num = :oid ; 
        SELECT * FROM  tbl_user_delta, tbl_order_delta WHERE tbl_order_delta.fld_customer_user = tbl_user_delta.USERNAME AND
        tbl_order_delta.fld_order_num = :oid" );
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      $stmt->nextRowset();
      $readrow2 = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Report</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="deltafish_logo.png" /> 
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
 

<div class="text-center">
  <br>
    <img src="deltafish_logo.png" width="50%" height="50%">
</div>
<div class="text-center">
  <h1>SALES REPORT</h1>
  <h5>Seller Name: <?php echo $readrow['name'] ?></h5>
</div>
<hr>
 
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Product</th>
    <th class="text-right">Quantity</th>
    <th class="text-right">Price(RM)/Unit</th>
    <th class="text-right">Total(RM)</th>
  </tr>
  <?php
  $grandtotal = 0;
  $counter = 1;
  try {
    ////ada dua quary, satu untuk data bid, satu untuk data biasa
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_order_detail_delta,
        tbl_productsell_delta WHERE 
        tbl_order_detail_delta.fld_product_num = tbl_productsell_delta.NAME AND
        fld_order_num = :oid ; SELECT * FROM tbl_order_detail_delta, tbl_productbid_delta WHERE tbl_order_detail_delta.fld_product_num = tbl_productbid_delta.NAME AND fld_order_num = :oid");
    $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
    $stmt->execute();
    $result = $stmt->fetchAll();
    $count= $stmt->fetchColumn();
    $stmt->nextRowset();
    $result2 = $stmt->fetchAll();
  }
  catch(PDOException $e){
        echo "Error: " . $e->getMessage();
  }
  ?>
  
  <?php
  print $count;
  //digunakan untuk mengenal pasti sistem perlu memaparkan yang produk bid atau produk biasa 
  if($result){
  foreach($result as $detailrow) {
  ?>
  <tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $detailrow['NAME']; ?></td>
    <td class="text-right"><?php echo $detailrow['fld_order_detail_quantity']; ?></td>
    <td class="text-right"><?php echo $detailrow['PRICE']; ?></td>
    <td class="text-right"><?php echo $detailrow['PRICE']*$detailrow['fld_order_detail_quantity']; ?></td>
  </tr>
  <?php
    $grandtotal = $grandtotal + $detailrow['PRICE']*$detailrow['fld_order_detail_quantity'];
    $counter++;
  } // while
  ?>
  <tr>
    <td colspan="4" class="text-right">Grand Total</td>
    <td class="text-right"><?php echo $grandtotal ?></td>
  </tr>
</table>
<?php
}
else{
  foreach($result2 as $detailrow) {
  ?>
<tr>
    <td><?php echo $counter; ?></td>
    <td><?php echo $detailrow['NAME']; ?></td>
    <td class="text-right">1</td>
    <td class="text-right"><?php echo $detailrow['HIGHESTBID']; ?></td>
    <td class="text-right"><?php echo $detailrow['HIGHESTBID']; ?></td>
  </tr>
  <?php
    $grandtotal = $grandtotal + $detailrow['HIGHESTBID'];
    $counter++;
  } // while
  ?>
  <tr>
    <td colspan="4" class="text-right">Grand Total</td>
    <td class="text-right"><?php echo $grandtotal ?></td>
  </tr>
</table>
<?php
}
?> 
<p class="text-center">Computer-generated report. No signature is required.</p>
 
</body>
</html>