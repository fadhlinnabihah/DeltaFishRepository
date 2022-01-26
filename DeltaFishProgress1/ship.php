<?php 
 include_once 'db.php';
 // include_once 'CartPage.php';
 if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	 <link rel="shortcut icon" type="image/png" href="deltafish_logo.png" /> 
        <?=template_header('shipping')?>    
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Home - DFOBB</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">

	 <style type="text/css">
            header {
              border-bottom: 1px solid #EEEEEE;
            }
            header .content-wrapper {
              display: flex;
            }
            header h1 {
              display: flex;
              flex-grow: 1;
              flex-basis: 0;
              font-size: 20px;
              margin: 0;
              padding: 24px 0;
            }
            header nav {
              display: flex;
              /*flex-grow: 1;*/
              flex-basis: 0;
              justify-content: center;
              align-items: center;
            }
            header nav a {
              text-decoration: none;
              color: #555555;
              padding: 10px 10px;
              margin: 0 10px;
            }
            header nav a:hover {
              border-bottom: 1px solid #aaa;
            }
            header .link-icons {
              display: flex;
              flex-grow: 1;
              flex-basis: 0;
              justify-content: flex-end;
              align-items: center;
              position: relative;
            }
            header .link-icons a {
              text-decoration: none;
              color: #394352;
              padding: 0 10px;
            }
            header .link-icons a:hover {
              color: #4e5c70;
            }
            header .link-icons a i {
              font-size: 18px;
            }
            header .link-icons a span {
              display: inline-block;
              text-align: center;
              background-color: #63748e;
              border-radius: 50%;
              color: #FFFFFF;
              font-size: 12px;
              line-height: 16px;
              width: 16px;
              height: 16px;
              font-weight: bold;
              position: absolute;
              top: 22px;
              right: 0;
            }
        </style>
</head>

<body>


	<nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
	<div class="container">
		
		<button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
		<div class="collapse navbar-collapse" id="navcol-1"></div></div></nav>
		<header class="text-center text-white masthead" style="background:url('assets/img/bg-masthead.jpg')no-repeat center center;background-size:cover;">
			<div class="overlay" style="padding: -4px;margin: 2px;"></div>
			<div class="container"><div class="row"><div class="col-xl-9 mx-auto position-relative">
				<center class="mb-5" style="font-size: xx-large;">Shipping Page</center></div>
				<div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
					<form>
						<?php echo date("d.m.Y")."<br>";?>
						<div class="row">
							<div class="col-12 col-md-3 offset-md-4 offset-xl-4">
						<!-- <button class="btn btn-primary btn-lg" type="submit" style="margin: -19px;padding: 6px 16px;width: 208px;">Add New Shipment&nbsp;</button> -->
						<!-- <button class="btn btn-primary btn-lg" type="submit" style="margin: -19px;padding: 6px 16px;width: 208px;">Add New Shipment&nbsp;</button> -->
					</div>
				</div>
				</form></div>
			</div>
		</div>
					</header>
					<section class="text-center bg-light features-icons">
						
						
								  <?php
								   // $total =0 

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * , count(tbl_order_detail_delta.fld_order_detail_num) FROM tbl_order_delta, tbl_order_detail_delta, tbl_productsell_delta WHERE tbl_order_delta.fld_order_num = tbl_order_detail_delta.fld_order_num AND tbl_productsell_delta.NAME = tbl_order_detail_delta.fld_product_num AND fld_customer_user = :customer GROUP BY  tbl_order_detail_delta.fld_order_num");
            $stmt->bindParam(':customer', $customer, PDO::PARAM_STR);
            $customer = $_SESSION['user']['USERNAME'];
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    ?>	
									<div class="table-responsive" style="padding: 60px;margin: -41px;">
												
										<table class="table"><thead>										 				
											<tr>
												<th>Number of Items</th>
												<th>Order ID</th>
												<!-- <th>Price</th> -->
												<th>Total</th>
												<th></th>
											</tr>	
											<?php
												$total =0;
												$subtotal = 0;
											 foreach($result as $readrow) {
											 		$subtotal += (float)$readrow['PRICE']*(int)$readrow['fld_order_detail_quantity'];
											 		$total += (float)$readrow['PRICE']*(int)$readrow['fld_order_detail_quantity'];
											 		$orderid=$readrow['fld_order_num']; 
											 		?>
										</thead>
											<tbody>
																	
												</tr>
												
												<tr>
													<td><?php echo $readrow['count(tbl_order_detail_delta.fld_order_detail_num)']; ?></td>
													<td><?php echo $readrow['fld_order_num']; ?></td>
													<td><?php echo $subtotal; ?></td>
													<td><a role="button" type="submit" class="align-items-center" href ="invoice.php?oid=<?php echo $orderid; ?>">Invoice</a></td>
												
												</tr>												
											 		<?php $subtotal = 0; ?>
												<!-- 	<td style="font-weight: bold;">Total&nbsp;</td> -->
												<!-- 	<td></td>
													<td></td> -->
													<!-- <td style="font-weight: bold;">Rm 1410</td></tr> -->
												<!-- 	<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr> -->
													<!-- <tr></tr> -->
												</tbody>
										<?php }$conn = null;?>		
											</table> 
											 <h2><span class="text">Total Transaction</span></h2>
           						 <h1><span class="price">RM <?=$total?></span></h1>
										</div>
									</section>
												<section class="showcase"></section>
											
													<script src="assets/bootstrap/js/bootstrap.min.js">
														//testing 
													</script>


           <footer class="footer" style="padding-top: 0rem;padding-bottom: 0rem;">
               
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved.</p>
                   <p>This website is developed by Delta Group</p>
               </center>
               
           </footer>
												</body>
	</html>												


													