<?php
  include_once 'index.php';

if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");


?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Detail</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <!-- CSS -->
    <link href="css/style2.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

    <style >
       body {
              background-color: #74E1F5;
              padding: 30px 10px;
              justify-content: center;
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
              flex-grow: 1;
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
  <?=template_header('products_detail_sell')?>  
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
    <main class="container">
 
      <!-- Left Column / Headphones Image -->
      <div class="left-column">
        <?php if ($readrow['PICTURE'] == "" ) {
        echo "No image";
      }
      else { ?>
      <img src="pictures_sell/<?=$readrow['PICTURE'] ?>" class="img-responsive">
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
          </form>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
