<?php
  include 'product_detail_bid_crud.php'
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
                padding:0px;    
                bottom:0;
            }
            .footer { 
                background-color: #FFFFFF;
                position: absolute; 
                bottom:0; 
                right:0;
                left:0;
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
                
                /* To read the duedate of the product **/
                $duedate = $readrow['DUEDATE'];

                $rem = strtotime($duedate);
                ?>

                <!--To show the time in HTML-->
                <span class='blue' id='time_left'></span>
                
        </div>

       <!-- Product Configuration -->
        <div class="product-configuration">
          

        <!-- Product Pricing -->
        <div class="product-price">
          <center>
          <h2> RM <?php echo $readrow['HIGHESTBID'] ?></h2>
        </center>
        </div>
        <div> <h5> Current Bidder: <?php echo $readrow['HIGHESTBIDDER'] ?></h5></div>
        <div class="form__group field">
          <div class="container">
   <div>
        <div id="disablebid">
          <form method="POST" action="product_detail_bid.php">
            <input type="hidden" name="oldpid" value="<?php echo $readrow['ID']; ?>">  
            <p class="pb-1 username">Amount bid</p> 
           
            <input type="number" class=" name form-control mb-4" placeholder="RM" name="highestbid" min="<?php echo $readrow['HIGHESTBID'] ?>" >
            <!-- get buyer name -->
          <input type="hidden" name="highestbidder" value="<?php echo $_SESSION['user']['USERNAME']?>">
          <input type="hidden" name="seller" value="<?php echo $readrow['SELLER'] ?>">
            <div class="form-group">

               <center><button class="bid-btn" name="update">Bid Now</button></center>
      </div>        
  </div>
  </div>


          
        
      </div>
      <br>
    
     
    </main>

    <!-- Scripts for the timer-->
    <script type="text/javascript">
      
      //To set refresh every second
      setInterval(myTimer, 1000);
      var x= "<?php echo"$rem"?>" + "000";


      function myTimer() {
        /* get current date and due date to compare **/
        var date = new Date().getTime();
        var distance = (x) - (date)- "25200000";

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById("time_left").innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text 
      if (distance < 0) 
      {
        var childNodes = document.getElementById("disablebid").getElementsByTagName('*');
        for (var node of childNodes) {
            node.disabled = true;
        }
        clearInterval(x);
        document.getElementById("time_left").innerHTML = "BID CLOSED";

      }
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
    

  </body>
</html>