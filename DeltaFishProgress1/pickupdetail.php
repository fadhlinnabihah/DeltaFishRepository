
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELTA CHECKOUT PAGE</title>
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
            <p class="display-7 fw-bold">Pickup<span class="ps-1"> detail</span></p> <small class="d-flex align-items-center justify-content-center mb-3">

            </small>
        </div>


<form action="register.php" method ="post" class="form-horizontal">
        <div class="row px-md-4 px-1 m-0">
            
            <div class="col-6">Full Name <input type="text" class="form-control mb-4" name="name" id="name" placeholder="Full Name" value="<?php if(isset($_GET['edit'])) echo $editrow['NAME']; ?>" > </div>

            <div class="col-6">Phone Number<input type="text" class="form-control mb-4" name="phone" id="phone" placeholder="###-#######" value="<?php if(isset($_GET['edit'])) echo $editrow['PHONE']; ?>" > </div>
            
            <div class="col-12">Date to pickup: <input type="date" id="start" name="trip-start" value="2022-01-10" min="2022-01-10" max="2025-12-31"></div>

            <div class="row">
   </br>
 </div>
            <div class="col-12 create">
                
                <div> 
                    <a href="successpickup.php">
                    <input type="button" name="create" value="Confirm Order"class="btn btn-primary py-3 ">  
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