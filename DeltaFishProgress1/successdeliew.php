
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELTA CONFIRM ORDER PAGE</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

	<link href="css/body.css" rel="stylesheet">
</head>
<body><div class="container pt-4 pb-5">
    <div class="text-1"></div>
    <div class="text-2"></div>
    <div class="text-3"></div>
    
        <div class="text-center pt-3">
            <p class="display-7 fw-bold">Order<span class="ps-1"> Confirmed</span></p> <small class="d-flex align-items-center justify-content-center mb-3">

            </small>
        </div>


<form action="register.php" method ="post" class="form-horizontal">
        <div class="row px-md-4 px-1 m-0">
            
           <center><p>Your order is confirmed.</p></center>
           <center><p>Thankyou for shopping with us.</p></center>

            <div class="row">
   </br>
 </div>

            <div class="col-12 create">
                
                <div> 
                    <a href="invoicedeliveryew.php">
                    <input type="button" name="create" value="Generate Invoice"class="btn btn-primary py-3 ">  
                    <?php if (isset($_GET['edit'])) { ?>
                    <div class="d-flex align-items-center justify-content-between">
                        <?php } ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>