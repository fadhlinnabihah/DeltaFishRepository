
<?php
  // include 'index.php';

  if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
  <title>Products Details</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
 

 <style>

        .bid-btn {
  display: inline-block;
  background-color: #fac943;
  border-radius: 6px;
  font-size: 16px;
  color: #FFFFFF;
  text-decoration: none;
  padding: 12px 30px;
  
}
.bid-btn:hover {
  background-color: #ebbd3f;
}
.bn632-hover {
  width: 160px;
  font-size: 16px;
  font-weight: 600;
  color: #fff;
  cursor: pointer;
  margin: 20px;
  height: 55px;
  text-align:center;
  border: none;
  background-size: 300% 100%;
  border-radius: 50px;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:hover {
  background-position: 100% 0;
  moz-transition: all .4s ease-in-out;
  -o-transition: all .4s ease-in-out;
  -webkit-transition: all .4s ease-in-out;
  transition: all .4s ease-in-out;
}

.bn632-hover:focus {
  outline: none;
}

.bn632-hover.bn26 {
    background-image: linear-gradient(
      to right,
      #25aae1,
      #4481eb,
      #04befe,
      #3f86ed
    );
    box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
  }
  * {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
}

.buttons {
    margin: 10%;
    text-align: center;
}

.btn-hover {
    width: 200px;
    font-size: 16px;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
    margin: 20px;
    height: 55px;
    text-align:center;
    border: none;
    background-size: 300% 100%;

    border-radius: 50px;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:hover {
    background-position: 100% 0;
    moz-transition: all .4s ease-in-out;
    -o-transition: all .4s ease-in-out;
    -webkit-transition: all .4s ease-in-out;
    transition: all .4s ease-in-out;
}

.btn-hover:focus {
    outline: none;
}

.btn-hover.color-2 {
    background-image: linear-gradient(to right, #f5ce62, #e43603, #fa7199, #e85a19);
    box-shadow: 0 4px 15px 0 rgba(229, 66, 10, 0.75);
}
.btn-hover.color-9 {
    background-image: linear-gradient(to right, #0ba360, #3cba92, #30dd8a, #2bb673);
    box-shadow: 0 4px 15px 0 rgba(23, 168, 108, 0.75);
}
.thick {
  font-weight: bold;
}

</style>
 <style type="text/css">
              header {
        border-bottom: 1px solid #EEEEEE;
        background-color: #FFFFFF;

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
        background-color: #FFFFFF;
      }
      header nav {
        display: flex;
        /*flex-grow: 1;*/
        flex-basis: 0;
        justify-content: center;
        align-items: center;
        background-color: #FFFFFF;
      }
      header nav a {
        text-decoration: none;
        color: #555555;
        padding: 10px 10px;
        background-color: #FFFFFF;
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
<div>
            <?php
                require 'header.php';
            ?></div>
 <div style="margin-top: 40px;">
         
   <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_productsell_delta WHERE ID = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      
  }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

    <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
    <?php if (!file_exists("pictures_sell/{$readrow['PICTURE']}")) {
        echo "No image";
      } else { ?>
      <img src="pictures_sell/<?php echo $readrow['PICTURE'] ?>" class="img-responsive" width="100%">
      <?php } ?>
    </div>

    <div class="col-xs-12 col-sm-5 col-md-4">
      <div class="panel panel-default">
      <div class="panel-heading"><strong>Product Details</strong></div>
      <div class="panel-body">
          Below are specifications of the product.
      </div>
      <table class="table">
        
        <tr>
          <td><strong>Name</strong></td>
          <td><?php echo $readrow['NAME'] ?></td>
        </tr>
        <tr>
          <td><strong>Description</strong></td>
          <td><?php echo $readrow['DESCRIPTION'] ?></td>
        </tr>
        <tr>
          <td><strong>Quantity</strong></td>
          <td><?php echo $readrow['STOCK'] ?></td>
        </tr>
        <tr>
          <td><strong>Seller name</strong></td>
          <td><?php echo $readrow['SELLER'] ?></td>
        </tr>
        <tr>
          <td><strong>Price</strong></td>
          <td>RM <?php echo $readrow['PRICE'] ?></td>
        </tr>
        
        
      </table>
     <!--  <div >
         <form action="index.php?page=cart" method="post">
            <center><input type="number" name="quantity" value="1" min="1" max="<?=$readrow['STOCK']?>" placeholder="Quantity"  required>
            <input type="hidden" name="product_id" value="<?=$readrow['ID']?>">
            <input type="submit" value="Add To Cart"></center>
            <br>
          </div>  -->
      </div>
    </div>
  </div>
</div>
 <br><br><br><br><br><br><br><br>
  <footer class="footer"> 
               
               <center>

                   <p>Copyright &copy DFOBB. All Rights Reserved.</p>

                   <p>This website is developed by Delta Group</p>
               </center>
               
           </footer>
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
    

  </body>
</html>