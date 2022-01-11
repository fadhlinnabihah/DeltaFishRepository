<?php 
 include_once 'shipFunction.php';
 // include_once 'CartPage.php';
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<title>Home - DFOB</title>
	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"><link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic">
</head>

<body>


	<nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
	<div class="container">
		<a class="navbar-brand" href="#">DFOB</a>
		<button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
		<div class="collapse navbar-collapse" id="navcol-1"></div></div></nav>
		<header class="text-center text-white masthead" style="background:url('assets/img/bg-masthead.jpg')no-repeat center center;background-size:cover;">
			<div class="overlay" style="padding: -4px;margin: 2px;"></div>
			<div class="container"><div class="row"><div class="col-xl-9 mx-auto position-relative">
				<h1 class="mb-5">Shipping Page</h1></div>
				<div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
					<form>
						<?php echo date("d.m.Y")."<br>";?>
						<div class="row">
							<div class="col-12 col-md-3 offset-md-4 offset-xl-4">
						<!-- <button class="btn btn-primary btn-lg" type="submit" style="margin: -19px;padding: 6px 16px;width: 208px;">Add New Shipment&nbsp;</button> -->
					</div>
				</div>
				</form></div>
			</div>
		</div>
					</header>
					<section class="text-center bg-light features-icons">
						
						<div class="container"><div class="row"><div class="col-md-12" style="color: var(--bs-indigo);padding: -17px;margin: 0px;">
						<form action="ship.php" method ="post" class="form-horizontal"> 
							<div>

    							<p class="pb-1 address">Address</p> <input type="text" class=" name form-control mb-4" name="address" id="address" placeholder="Address" value="<?php if(isset($_GET['edit'])) echo $editrow['tbl_address']; ?>" required>
    						</div>
    						 <div class="col-12">Choose your payment option : <select type="payment" class="form-control mb-4" name="payment" id="payment" required>
                <option value="" selected>Select</option>
                <option value="Cash On Delivery" <?php if(isset($_GET['edit'])) if($editrow['tbl_payment']=="Cash On Delivery") echo "selected"; ?>>Cash On Delivery</option>
                <option value="Pickup"  <?php if(isset($_GET['edit'])) if($editrow['tbl_payment']=="Pickup") echo "selected"; ?>>Pickup</option>
                <option value="Delivery"  <?php if(isset($_GET['edit'])) if($editrow['tbl_payment']=="Delivery") echo "selected"; ?>>Delivery</option>
        				</div>

        				<input type="submit" name="pay" value="Update Payment Detail"class="btn btn-primary py-3 ">  
						</form>   										
    						
							<!-- <a class="navbar-brand" href="#">Shipment -Order #&nbsp;</a> -->
						</div>
					</div>
					<div class="row">

								<!-- <div class="col-md-6" style="padding: 61px;">
								
									<a class="navbar-brand" href="#" style="color: rgb(20,21,21);font-weight: bold;padding: 61px;">Ship To :&nbsp;&nbsp;</a>
								</div> -->
								<!-- <div class="col" style="padding: 61px;">
									<a class="navbar-brand" href="#" style="color: rgb(8,8,8);font-weight: bold;margin: 16px;padding: -3px;">Ship From :&nbsp;&nbsp;</a>
									<h5 class="mb-0">Shipping Method :</h5>
								</div> -->
								<!-- <div class="col-md-12" style="color: var(--bs-indigo);padding: 44px;">
									<a class="navbar-brand" href="#">Order Date :</a>
									<button class="btn btn-primary">Ship Items&nbsp;</button>
								</div> -->
									<!-- <div class="col-md-12 offset-md-6" style="color: var(--bs-indigo);padding: 51px;margin: -39px;">
										<button class="btn btn-primary" style="margin: 26px;">Edit</button>
										<button class="btn btn-primary" style="margin: 26px;">Delete</button>
									</div> -->
								</div>
							</div> 
								  <?php
								   // $total =0 

    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_order_detail_delta WHERE fld_order_detail_num = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      // $pid = $_GET['pid'];
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
												<th>Order ID</th>
												<th>Product Code&nbsp;</th>
												<!-- <th>Price</th> -->
												<th>Quantity</th>
												<th></th>
											</tr>	
											<?php
											
											 foreach($result as $readrow) {
											 		$total =0 
											 		?>
										</thead>
											<tbody>
											
												<tr><td> &nbsp;</td>
													<td></td>
													<td>3</td>
													<td></td>
												</tr>
												<tr></tr>
												<tr></tr>
												<tr>
													<td><?php echo $readrow['fld_order_num']; ?></td>
													<td><?php echo $readrow['fld_product_num']; ?>&nbsp;</td>
													<td><?php echo $readrow['fld_order_detail-quantity']; ?></td>
													<td></td>
													<td> </td>
												</tr>												
												<tr total="Rm 1410">
													<td style="font-weight: bold;">Total&nbsp;</td>
													<td></td>
													<td></td>
													<td style="font-weight: bold;">Rm 1410</td></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
													<tr></tr>
												</tbody>
										<?php }$conn = null;?>		
											</table> 

										</div>
									</section>
												<section class="showcase"></section>
											
													<script src="assets/bootstrap/js/bootstrap.min.js">
														//testing 
													</script>
												</body>
	</html>												


													