<?php
  include_once 'index.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");


?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <?=template_header('br_pr')?>  
  <link rel="shortcut icon" type="image/png" href="deltafish_logo.png" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Product Detail</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="css/style2.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

    <style >
       body {
              background-color: #74E1F5;
              padding: 0px 0px;
              justify-content: center;
            }
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
              flex-grow: 1;
              flex-basis: 0;
              justify-content: center;
              align-items: center;
              background-color: #FFFFFF;
          }
          header nav a {
              text-decoration: none;
              color: #555555;
              padding: 10px 10px;
              margin: 0 10px;
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
          footer{
                background-color: #FFFFFF;
                color:#555555;
                font-size:14px;
                font-weight:bold;
                margin-top:0px;  
                padding:5px;  
                bottom:0;
            }
            .footer { 
                background-color: #FFFFFF;
                position: relative; 
                bottom:0; 
                right:0;
                left:0;
            }
            main{
              max-width: 100%;
            }
    </style>
  </head>
  
  <body>
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
    <div>
    <div>
    <main class="container">
 
      <!-- Left Column / Headphones Image -->
      <div class="left-column" >
        <?php if ($readrow['PICTURE'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="pictures_sell/<?=$readrow['PICTURE'] ?>" class="w3-border w3-padding" style="width: 100%;">
      <?php } ?>
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Fish</span>
          <h1 class="name"><?=$readrow['NAME']?></h1>
          <p>"<?=$readrow['DESCRIPTION']?>"</p>
          <h3>Quantity: <?=$readrow['STOCK']?></h3>
          <span class="seller"><?=$readrow['SELLER']?></span>
        </div>

       <!-- Product Configuration -->
        <div class="product-configuration">
          
         

        <!-- Product Pricing -->
        <div class="product-price">
          <span class="price"> RM <?=$readrow['PRICE']?></span>
        </div>
         <div>
         <form action="index.php?page=cart" method="post">
            <input type="number" name="quantity" value="1" min="1" max="<?=$readrow['STOCK']?>" placeholder="Quantity"  required>
            <input type="hidden" name="product_id" value="<?=$readrow['ID']?>">
            <input type="submit" value="Add To Cart">
          </div> 
          <br><br><br>
          </form>
        </div>
      </div>
    </div>
    
    </div>

<div style="padding-bottom:50px"></div>
</main>

</div>
  </div>
   



    

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8">
      
    </script>


<footer class="footer"> 
               
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved. </p>
                   <p>This website is developed by Delta Group</p>
               </center>
               
           </footer>
  </body>
   
</html>
