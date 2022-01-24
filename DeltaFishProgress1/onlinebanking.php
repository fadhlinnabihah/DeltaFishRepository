
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELTA CONFIRM PAYMENT PAGE</title>
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
            <p class="display-7 fw-bold">Confirm<span class="ps-1"> payment</span></p> <small class="d-flex align-items-center justify-content-center mb-3">

            </small>
        </div>


<form action="register.php" method ="post" class="form-horizontal">
        <div class="row px-md-4 px-1 m-0">
            
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
    <td class="text-right">259</td>
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

<div class="col-12">Choose bank: <select type="fpassq" class="form-control mb-4" name="fpassq" id="fpassq" required>
                <option value="" selected>Select</option>
                <option value="mothername" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your mother name?") echo "selected"; ?>>Maybank</option>
                <option value="birthplace"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your birthplace?") echo "selected"; ?>>Bank Islam</option>
                <option value="birthplace"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your birthplace?") echo "selected"; ?>>RHB Bank</option>
                <option value="birthplace"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your birthplace?") echo "selected"; ?>>Ambank</option>
                <option value="birthplace"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your birthplace?") echo "selected"; ?>>CIMB Bank</option>
            </select>
        </div>

            <div class="col-12 create">
                
                <div> 
                    <a href="successdeliob.php">
                    <input type="button" name="create" value="Confirm Payment"class="btn btn-primary py-3 ">  
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