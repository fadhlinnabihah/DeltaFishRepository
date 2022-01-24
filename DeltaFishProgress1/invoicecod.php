<!--<?php
/*  include_once 'database.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

?>
<?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT * FROM tbl_orders_a174777, tbl_staffs_a174777,
        tbl_customers_a174777, tbl_orders_details_a174777 WHERE
        tbl_orders_a174777.fld_staff_num = tbl_staffs_a174777.fld_staff_num AND
        tbl_orders_a174777.fld_customer_num = tbl_customers_a174777.fld_customer_num AND
        tbl_orders_a174777.fld_order_num = tbl_orders_details_a174777.fld_order_num AND
        tbl_orders_a174777.fld_order_num = :oid");
      $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
      $oid = $_GET['oid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;*/
?>
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Invoice</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="shortcut icon" type="image/jpg" href="logo.jpg" />-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>



<div class="text-center">
  <h1 class="text-center">INVOICE</h1>
  <h5>Order: O5603f03a9349f0.39900158<?php// echo $readrow['fld_order_num'] ?></h5>
  <h5>Date: 2021-11-12 01:35:54<?php// echo $readrow['fld_order_date'] ?></h5>
</div>

<hr>
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading text-center">
        <h4>From: SELLER</h4>
      </div>
      <div class="panel-body text-center">
        <p>
        Lot 01-10, Level 1, East Wing <br>
        Berjaya Times Square <br>
        56100 <br>
        Kuala Lumpur <br>
        </p>
      </div>
    </div>
  </div>
    <div class="col-xs-5 col-xs-offset-2 text-right">
        <div class="panel panel-default">
            <div class="panel-heading text-center">
              <h4>To : BUYER<?//php echo $readrow['fld_customer_fname']." ".$readrow['fld_customer_lname'] ?></h4>
            </div>
            <div class="panel-body text-center">
        <p>
        No.69 Jalan Melur <br>
        Tmn Nirwana <br>
        56100 <br>
        Kuala Lumpur <br>
        </p>
            </div>
        </div>
    </div>
</div>
 
<table class="table table-bordered">
  <tr>
    <th>No</th>
    <th>Product</th>
    <th class="text-right">Quantity</th>
    <th class="text-right">Price(RM)/Unit</th>
    <th class="text-right">Total(RM)</th>
  </tr>
  <tr>
    <td>1</td>
    <td>Red leopard&nbsp;</td>
    <td class="text-right">3</td>
    <td class="text-right">200</td>
    <td class="text-right">600</td>
  </tr>
  <tr>
    <td colspan="4" class="text-right">Delivery Fee</td>
    <td class="text-right">50<?//php echo $grandtotal ?></td>
  </tr>
  <tr>
    <td colspan="4" class="text-right">Grand Total</td>
    <td class="text-right">650<?//php echo $grandtotal ?></td>
  </tr>
</table>
 
<div class="row">
  <div class="col-xs-5">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4>Payment & Shipping</h4>
      </div>
      <div class="panel-body">
        <p>Payment method: Cash</p>
        <p>Shipping method: Cash-on-delivery (COD)</p>  
      </div>
    </div>
    </div>
  <div class="col-xs-7">
    <div class="span7">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4>Contact Details</h4>
        </div>
        <div class="panel-body">
          <p> Phone number: 0193748526<?//php echo $readrow['fld_staff_fname']." ".$readrow['fld_staff_lname'] ?> </p>
          <p><br></p>
        </div>
      </div>
    </div>
  </div>
</div>
<p class="text-center">Computer-generated invoice. No signature is required.</p>
 
</body>
</html>