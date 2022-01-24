

<?php
  include_once 'bid_products_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Delta Fish : Bid Products</title
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
        background-color: #74E1F5;
    }

    
        .form-group {
           color: #ffffff;
        }
        .table{
          background-color: #ffffff;
        }

    </style>

</head>
<body>
    <div>
            <?php
                require 'header.php';
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
       <h2>Create New Bidding Product</h2>
      </div>
       <?php
          if (isset($_SESSION['error'])) {
            echo "<p class='text-danger text-center'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
          }
          ?>
    <form action="bid_products.php" method="post" class="form-horizontal" enctype="multipart/form-data">


      <div class="form-group">
          <label for="productid" class="col-sm-3 control-label">ID</label>
          <div class="col-sm-9">
          <!-- <input name="pid" type="text" class="form-control" id="productid" placeholder="Product ID" value="<?php if(isset($_GET['edit'])) echo $editrow['ID']; ?>" required > -->
          <input name="pid" type="text" class="form-control" value="<?php if(isset($_GET['edit'])) echo $editrow['ID']; else echo $num; ?>" required readonly>
        </div>
        </div>

        
        <div class="form-group">
          <label for="productname" class="col-sm-3 control-label">Name</label>
          <div class="col-sm-9">
          <input name="name" type="text" class="form-control" id="productname" placeholder="Product Name" value="<?php if(isset($_GET['edit'])) echo $editrow['NAME']; ?>" required>
        </div>
        </div>

        <div class="form-group">
          <label for="startingprice" class="col-sm-3 control-label">Starting Price(RM)</label>
          <div class="col-sm-9">
          <input name="highestbid" type="number" class="form-control" id="startingprice" placeholder="Starting Price" value="<?php if(isset($_GET['edit'])) echo $editrow['HIGHESTBID']; ?>" min="0.0" step="0.01" required>
        </div>
        </div>

        <div class="form-group">
          <label for="productdesc" class="col-sm-3 control-label">Description</label>
          <div class="col-sm-9">
          <input name="description" type="text" class="form-control" id="productdesc" placeholder="Product Description" value="<?php if(isset($_GET['edit'])) echo $editrow['DESCRIPTION']; ?>" required>
          <!-- get seller name -->
          <input type="hidden" name="seller" value="<?php echo $_SESSION['user']['USERNAME']?>">
        </div>
        </div>


        <!-- <div class="form-group">
          <label for="seller" class="col-sm-3 control-label">Seller</label>
          <div class="col-sm-9">
          <input name="seller" type="text" class="form-control" id="seller" placeholder="Name seller" value="<?php if(isset($_GET['edit'])) echo $editrow['SELLER']; ?>"  hidden readonly>
        </div>
        </div> -->

        <div class="form-group">
          <label for="duedate" class="col-sm-3 control-label">Set bidding time</label>
          <div class="col-sm-9">
          <input name="duedate" type="datetime-local" class="form-control" id="duedate" placeholder="YYYY-MM-DD 00:00:00" value="<?php if(isset($_GET['edit'])) echo $editrow['DUEDATE']; ?>"  required>
        </div>
        </div>
        
        <div class="col-sm-offset-3 col-sm-9" >
          <div class="thumbnail dark-1">
            <img src="pictures_bid/<?php echo(isset($_GET['edit']) ? $editrow['PICTURE'] : '') ?>"
            onerror="this.onerror=null;this.src='nophoto.jpg';" id="productPhoto"
            alt="Product Image" style="width: 180px;">
            <div class="caption text-center">
              <h4 id="productImageTitle" style="word-break: break-all;">Product Image</h4>
              <p>
                <label class="btn btn-primary">
                  <input type="file" accept="image/*" name="fileToUpload" id="inputImage"
                  onchange="loadFile(event);"/>
                  <input type="hidden" name="filename" value="<?php echo $editrow['PICTURE']; ?>">
                  <span class="glyphicon glyphicon-cloud" aria-hidden="true"></span> Browse
                </label>
                <?php
                if (isset($_GET['edit']) && $editrow['PICTURE'] != '') {
                  echo '<a href="#" class="btn btn-danger disabled" role="button">Delete</a>';
                }
                ?>
              </p>
            </div>
          </div>
        </div>


      
      
      <div class="form-group">
          <div class="col-sm-offset-3 col-sm-9">
          <?php if (isset($_GET['edit'])) { ?>
          <input type="hidden" name="oldpid" value="<?php echo $editrow['ID']; ?>">
          <button class="btn btn-default" type="submit" name="update"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Update</button>
          <?php } else { ?>
          <button  onclick="return confirm('Are you sure to bid?');" class="btn btn-default" type="submit" name="create"><span class="glyphicon glyphicon-plus" aria-hidden="true" ></span> Create</button>
          <?php } ?>
          <button class="btn btn-default" type="reset"><span class="glyphicon glyphicon-erase" aria-hidden="true"></span> Clear</button>
        </div>
      </div>
    </form>
    </div>
  </div>


 
    
            <br><br><br><br><br><br><br><br>
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
    

</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js%22%3E"></script>

</body>

</html>