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
            <?=template_header('deliverydetail')?>
    <style type="text/css">
      .page-header{
        color: #ffffff;
      }
      .bg-1{
        background-color:  rgb(37, 150, 190);
    }

    
        .form-group {
           color: #ffffff;
        }
        .table{
          background-color: #74E1F5;
        }
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
    <form action="delivery.php" method="post" class="form-horizontal" enctype="multipart/form-data">

        <div class="form-group">
          <label for="name" class="col-sm-3 control-label">Full Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="name" placeholder="Ahmad bin Ahmed" value="<?php if(isset($_GET['edit'])) echo $editrow['NAME']; ?>" required>
        </div>
        </div>
 

        <div class="form-group">
          <label for="phone" class="col-sm-3 control-label">Phone Number</label>
          <div class="col-sm-9">
          <input name="phone" type="text" class="form-control" id="phone" placeholder="+60123456789" value="<?php if(isset($_GET['edit'])) echo $editrow['PHONE']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="address" class="col-sm-3 control-label">Address</label>
          <div class="col-sm-9">
          <input name="address" type="text" class="form-control" id="address" placeholder="No 1, Jalan A, 12345 Shah Alam, Selangor" value="<?php if(isset($_GET['edit'])) echo $editrow['ADDRESS']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="deli_time" class="col-sm-3 control-label">Preferred Delivery Time:</label>
          <div class="col-sm-9">
          <select name="deli_time" class="form-control" id="deli_time" value="<?php if(isset($_GET['edit'])) echo $editrow['DELI_TIME']; ?>"  required>
            <option value="">--- Choose your preferred delivery time---</option>
            <option value="During working hours">Deliver during working hours</option>
            <option value="Any time">Deliver any time </option>
</select>
        </div>
        </div>

        <div class="form-group">
          <label for="payment" class="col-sm-3 control-label">Payment Method:</label>
          <div class="col-sm-9">
          <select name="payment" class="form-control" id="payment" value="<?php if(isset($_GET['edit'])) echo $editrow['PAYMENT']; ?>"  required>
            <option value="">--- Choose your payment method---</option>
            <option value="Online Banking">Online Banking</option>
            <option value="e-Wallet">e-Wallet</option>
            <option value="Cash">Cash</option>
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


 
    
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved.</p>
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