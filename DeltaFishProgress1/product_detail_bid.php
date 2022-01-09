<?php
  include 'db.php'
?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product Detail</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <!-- CSS -->
    <link href="css/style2.css" rel="stylesheet">
    <meta name="robots" content="noindex,follow" />

    <style >
       body {
              background-color: #74E1F5;
              padding: 30px 10px;
              justify-content: center;
            }
    </style>
  </head>

  <body>
    <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_productbid_delta WHERE ID = :pid");
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
      <img src="pictures_bid/<?php echo $readrow['PICTURE'] ?>" class="img-responsive">
      <?php } ?>
      </div>


      <!-- Right Column -->
      <div class="right-column">

        <!-- Product Description -->
        <div class="product-description">
          <span>Fish</span>
          <h1><?php echo $readrow['NAME'] ?></h1>
          <p><?php echo $readrow['DESCRIPTION'] ?></p>
          <span><?php echo $readrow['SELLER'] ?></span>

          			<?php echo"</span><br /><br />
								&nbsp&nbsp Time Left to Bid: <span class='blue'>";?>
								<?php
								
								$duedate = $readrow['DUEDATE'];
                
                $rem = strtotime($duedate) - time();
                $day = floor($rem / 86400);
                $hr  = floor((($rem % 86400) / 3600)-7);
                $min = floor(($rem % 3600) / 60);
                $sec = ($rem % 60);
                /*if($day) echo "$day Days ";
                if($hr) echo "$hr Hours ";
                if($min) echo "$min Minutes ";
                if($sec) echo "$sec Seconds ";
                echo "Remaining...";**/
                

                 if( $day < 0 && $hr < 0 && $sec < 0){
                ?>
                   <h3> <?php echo 'Bid closed'; ?><h3>
                <?php
                }
                else{
              ?> <h3> <!-- <?php echo $day . 'Days '?> -->
                 <?php echo $hr . 'Hours '?>
                 <?php echo $min . 'Minutes '?>
                 <?php echo $sec . 'Seconds '?></h3>
                <?php 
                }
                ?>
               
        </div>

       <!-- Product Configuration -->
        <div class="product-configuration">
          
          

         

        <!-- Product Pricing -->
        <div class="product-price">
          <center>
          <h2> RM <?php echo $readrow['HIGHESTBID'] ?></h2>
        </center>
        </div>
        <div class="form__group field">
          <div class="container">
   <div>
        <div>
            <p class="pb-1 username">Amount bid</p> <input type="text" class=" name form-control mb-4" placeholder="RM">
      </div>        
  </div>
  </div>

          
        <div>
          <a href="#" class="bid-btn">Bid Now</a>
        </div>
      </div>
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
  </body>
</html>
