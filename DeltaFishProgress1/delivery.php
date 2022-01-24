<?php
  include_once 'delivery_crud.php';

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Delta Fish : Delivery Detail</title
    >
    <!-- <link rel="shortcut icon" type="image/x-icon" href="logo1.ico"/> untuk logo -->
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style3.css" type="text/css">
            
    <style type="text/css">
      .page-header{
        color: #ffffff;
      }
      .bg-1{
        background-color:  #74E1F5;
    }

    
        .form-group {
           color: #ffffff;
        }
        .table{
          background-color: #74E1F5;
        }

    </style>

</head>
<body>
    <div>
            <?php
                require 'header2.php';
            ?>
          </div>
   
 <!--  <?php $ulevel=$_SESSION["ulevel"];
  //echo "<script>alert($stafflevel);</script>";
  if ($ulevel == 'Admin') {
    include 'nav_bar.php';
  }elseif ($ulevel =='Normal Staff') {
    include 'nav_bar2.php';
  } ?> -->
<div class="container-fluid bg-1">
  <div class="row">
    <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
      <div class="page-header">
       <h2>Delivery Detail</h2>
      </div>
       <?php
          if (isset($_SESSION['error'])) {
            echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
          }
          ?>
    <form action="add_products.php" method="post" class="form-horizontal" enctype="multipart/form-data">


      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">Order ID</label>
          <div class="col-sm-9">
          <!-- <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['OID']; ?>" required > -->
           <input name="pid" type="text" class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['ID']; else echo $num; ?>" required readonly>
        </div>
        </div>

        
        <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Ahmad bin Ahmed" value="<?php if(isset($_GET['edit'])) echo $editrow['FNAME']; ?>" required>
        </div>
        </div>
 

        <div class="form-group">
          <label for="productprice" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-9">
          <input name="price" type="number" class="form-control" id="productprice" placeholder="+60-123456789" value="<?php if(isset($_GET['edit'])) echo $editrow['PNUMBER']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>

        <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label">Address</label>
          <div class="col-sm-9">
          <input name="description" type="text" class="form-control" id="productdesc" placeholder="No 1, Jalan A, 12345 Shah Alam, Selangor" value="<?php if(isset($_GET['edit'])) echo $editrow['ADDRESS']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="time" class="col-sm-3 control-label">Preferred Delivery Time:</label>
          <div class="col-sm-9">
          <select name="time" class="form-control" id="time" value="<?php if(isset($_GET['edit'])) echo $editrow['TIME']; ?>"  required>
            <option value="">--- Choose your preferred delivery time---</option>
            <option value="red">Deliver during working hours</option>
            <option value="green">Deliver any time </option>
</select>
        </div>
        </div>

        <div class="form-group">
          <label for="time" class="col-sm-3 control-label">Payment Method:</label>
          <div class="col-sm-9">
          <select name="time" class="form-control" id="time" value="<?php if(isset($_GET['edit'])) echo $editrow['TIME']; ?>"  required>
            <option value="">--- Choose your payment method---</option>
            <option value="red">Online Banking</option>
            <option value="green">e-Wallet</option>
            <option value="green">Cash</option>
</select>
        </div>
        </div>
        

      
      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['ID']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>


 
    
            <br><br><br><br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved. | Contact Us: +05 4099 9999</p>
                   <p>This website is developed by Delta Group</p>
               </center>
               </div>
           </footer>
        </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
    
  <script type="application/javascript">
  var loadFile = function (event) {
    var reader = new FileReader();
    reader.onload = function () {
      var output = document.getElementById('productPhoto');
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
    document.getElementById('productImageTitle').innerText = event.target.files[0]['name'];
  };

  $(document).ready(function () {
    $("#productlist").DataTable({
    "lengthMenu": [[5, 20, 50, -1], [5, 20, 50, "All"]]
  });
  });
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js%22%3E"></script>

</body>

</html>