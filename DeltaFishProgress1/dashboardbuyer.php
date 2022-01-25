<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");


  $totalproduct=0;
   try {
      //ada dua quary, satu untuk data buyer, satu untuk data seller
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $stmt = $conn->prepare("SELECT DISTINCT fld_customer_user, fld_seller_user FROM tbl_order_delta WHERE fld_seller_user = :sid ; SELECT * FROM tbl_productsell_delta WHERE SELLER = :sid ; SELECT * FROM tbl_productbid_delta WHERE SELLER = :sid ; SELECT fld_order_num FROM tbl_order_delta WHERE fld_seller_user = :sid ");
      $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
      $sid = $_SESSION['user']['USERNAME'];
      $stmt->execute();
      $rowcount = $stmt->rowCount();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      $stmt->nextRowset();
      $rowcount2 = $stmt->rowCount();
      $totalproduct += (int)$rowcount2;
      $stmt->nextRowset();
      $rowcount3 = $stmt->rowCount();
      $totalproduct += (int)$rowcount3;
      $stmt->nextRowset();
      $rowcount4 = $stmt->rowCount();
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
?>

<!Doctype HTML>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/style4.css" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
  <div>
            <?php
                require 'header.php';
            ?></div>
	
<!-- 	<div id="mySidenav" class="sidenav">
	<p class="logo"><span>Delta</span> Fish</p>
  <a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> &nbsp;&nbsp;Dashboard</a>
  <a href="#"class="icon-a"><i class="fa fa-users icons"></i> &nbsp;&nbsp;Customers</a>
  <a href="#"class="icon-a"><i class="fa fa-list icons"></i> &nbsp;&nbsp;Projects</a>
  <a href="#"class="icon-a"><i class="fa fa-shopping-bag icons"></i> &nbsp;&nbsp;Orders</a>
  <a href="#"class="icon-a"><i class="fa fa-tasks icons"></i> &nbsp;&nbsp;Inventory</a>
  <a href="#"class="icon-a"><i class="fa fa-user icons"></i> &nbsp;&nbsp;Accounts</a>
  <a href="#"class="icon-a"><i class="fa fa-list-alt icons"></i> &nbsp;&nbsp;Tasks</a>

</div> -->

<div id="main">
	<div class="head">
<p style="font-size:30px;color: white;">Dashboard</p>
</div>
	
	<div class="col-div-3">
		<div class="box">
      <p><?php echo $rowcount?><br/><span>Customers</span></p>
			<i class="fa fa-users box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $totalproduct?><br/><span>Products</span></p>
			<i class="fa fa-list box-icon"></i>
		</div>
	</div>
	<div class="col-div-3">
		<div class="box">
			<p><?php echo $rowcount4?><br/><span>Orders</span></p>
			<i class="fa fa-shopping-bag box-icon"></i>
		</div>
	</div>
	<div class="clearfix"></div>
	<br/><br/>
	<div class="col-div-8">
		<div class="box-8">
		<div class="content-box">
			<p>Top Products</p>
			<br/>
			<table>
  <tr>
    <th>Product Name</th>
    <th>Product Type</th>
  </tr>
  <tr>
    <td>Guppy</td>
    <td>Bidding</td>
  </tr>
  <tr>
    <td>Siakap</td>
    <td>Selling</td>
  </tr>
  <tr>
    <td>Keli</td>
    <td>Selling</td>
  </tr>
  <tr>
    <td>Exotic Arowana</td>
    <td>Bidding</td>
  </tr>
  
  
</table>
		</div>
	</div>
	</div>

	<div class="col-div-4">
		<div class="box-4">
		<div class="content-box">
			<p>Total Sale </p>

			<div class="circle-wrap">
    <div class="circle">
      <div class="mask full">
        <div class="fill"></div>
      </div>
      <div class="mask half">
        <div class="fill"></div>
      </div>
      <div class="inside-circle"> RM1500 </div>
    </div>
  </div>
		</div>
	</div>
	</div>
		
	<div class="clearfix"></div>
</div>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

  $(".nav").click(function(){
    $("#mySidenav").css('width','70px');
    $("#main").css('margin-left','70px');
    $(".logo").css('visibility', 'hidden');
    $(".logo span").css('visibility', 'visible');
     $(".logo span").css('margin-left', '-10px');
     $(".icon-a").css('visibility', 'hidden');
     $(".icons").css('visibility', 'visible');
     $(".icons").css('margin-left', '-8px');
      $(".nav").css('display','none');
      $(".nav2").css('display','block');
  });

$(".nav2").click(function(){
    $("#mySidenav").css('width','300px');
    $("#main").css('margin-left','300px');
    $(".logo").css('visibility', 'visible');
     $(".icon-a").css('visibility', 'visible');
     $(".icons").css('visibility', 'visible');
     $(".nav").css('display','block');
      $(".nav2").css('display','none');
 });

</script> -->

            <br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved. | Contact Us: +05 4099 9999</p>
                   <p>This website is developed by Delta Group</p>
               </center>
               </div>
           </footer>
</body>


</html>
