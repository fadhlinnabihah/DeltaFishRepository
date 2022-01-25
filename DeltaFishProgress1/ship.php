<?php 
 include_once 'db.php';
 // include_once 'CartPage.php';
 if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Home - DFOBB</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
</head>

<body>

		<header class="text-center text-white masthead" style="background:url('assets/img/bg-masthead.jpg')no-repeat center center;background-size:cover;">
			<div class="overlay" style="padding: -1px;margin: 1px;"></div>
			<div class="container"><div class="row"><div class="col-xl-9 mx-auto position-relative">
				<h1 class="mb-5">Shipping Page</h1></div>
				<div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
					<form>
					<h3><?php echo date("d.m.Y")."<br>";?></h3>	
						<div class="row">
							<div class="col-6 col-md-3 offset-md-4 offset-xl-4">
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
        $stmt = $conn->prepare("SELECT * FROM tbl_order_delta, tbl_order_detail_delta, tbl_productsell_delta WHERE tbl_order_delta.fld_order_num = tbl_order_detail_delta.fld_order_num AND tbl_productsell_delta.NAME = tbl_order_detail_delta.fld_product_num AND fld_customer_user = :customer");
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
												<th>Order Details ID</th>
												<th>Order ID</th>
												<th>Product Code&nbsp;</th>
												<!-- <th>Price</th> -->
												<th>Quantity</th>
												<th></th>
											</tr>	
											<?php
												$total =0;
											 foreach($result as $readrow) {
											 		$total += (float)$readrow['PRICE']*(int)$readrow['fld_order_detail_quantity'];
											 		?>
										</thead>
											<tbody>
																	
												</tr>
												
												<tr>
													<td><?php echo $readrow['fld_order_detail_num']; ?></td>
													<td><?php echo $readrow['fld_order_num']; ?></td>
													<td><?php echo $readrow['fld_product_num']; ?>&nbsp;</td>
													<td><?php echo $readrow['fld_order_detail_quantity']; ?></td>
													<td><a role="button" type="submit" class="align-items-center" href ="invoice.php?oid=<?php echo $readrow['fld_order_num']; ?>">Invoice</a></td>
												
												</tr>												
											
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
											 <h2><span class="text">Subtotal</span></h2>
           						 <h1><span class="price">RM <?=$total?></span></h1>
										</div>
									</section>
												<section class="showcase"></section>
											
													<script src="assets/bootstrap/js/bootstrap.min.js">
														//testing 
													</script>
												</body>
	</html>												


													