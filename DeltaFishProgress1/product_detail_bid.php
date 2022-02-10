
<?php
  include_once 'product_detail_bid_crud.php';
?>

<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <?=template_header('br_pr_bid')?> 
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

 <div style="margin-top: 40px;">
         
   <?php
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT * FROM tbl_productbid_delta WHERE ID = :pid");
      $stmt->bindParam(':pid', $pid, PDO::PARAM_STR);
      $pid = $_GET['pid'];
      $stmt->execute();
      $readrow = $stmt->fetch(PDO::FETCH_ASSOC);
      // if (empty($readrow['fld_product_image']))
      //   $readrow['fld_product_image'] = "{$readrow['fld_product_num']}.jpg";
  }
    catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    $conn = null;
    ?>

    <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 col-sm-5 col-sm-offset-1 col-md-4 col-md-offset-2 well well-sm text-center">
    <?php if (!file_exists("pictures_bid/{$readrow['PICTURE']}")) {
        echo "No image";
      } else { ?>
      <img src="pictures_bid/<?php echo $readrow['PICTURE'] ?>" class="img-responsive" width="100%">
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
          <td><strong>Seller name</strong></td>
          <td><?php echo $readrow['SELLER'] ?></td>
        </tr>
        <tr>
          <td><strong>Time Left to Bid</strong></td>
          <td>
               <?php
                /* To read the duedate of the product **/
                $duedate = $readrow['DUEDATE'];
                $rem = strtotime($duedate);
                ?>
                <span id="time_left"></span>   
          </td>
        </tr>
        
      </table>
      </div>
    </div>
  </div>
</div>
 
  <div class="jumbotron" style="margin-left: 250px; margin-right: 250px;">
          

        <!-- Product Pricing -->
        <div class="product-price">
          <center>
          <h2> RM <?php echo $readrow['HIGHESTBID'] ?></h2>
        </center>
        </div>

        <div> <center><h5> Current Bidder: <?php echo $readrow['HIGHESTBIDDER'] ?></h5></center></div>

        <div class="form__group field">
          <div class="container">
   <div>
        <div id="disablebid">
          <form method="POST" action="product_detail_bid.php">
            <input type="hidden" name="oldpid" value="<?php echo $readrow['ID']; ?>">  
            <p class="pb-1 username">Amount bid</p> 
           
            <input type="number" pattern="[0-9]{0,9}" class=" name form-control mb-4" placeholder="RM" name="highestbid" min="<?php echo $readrow['HIGHESTBID'] ?>" required>
            <!-- get buyer name -->
          <input type="hidden" name="highestbidder" value="<?php echo $_SESSION['user']['USERNAME']?>">
          <input type="hidden" name="seller" value="<?php echo $readrow['SELLER'] ?>">
            <div class="form-group">
               <center><button class="bid-btn" name="update">Bid Now</button></center>
          </div>        
  </div>
</div>
      <input type="hidden" name="name" value="<?php echo $readrow['NAME'];?>">
      <input type="hidden" name="sellerr" value="<?php echo $readrow['SELLER'];?>">
      <input type="hidden" name="highestbidderr" value="<?php echo $readrow['HIGHESTBIDDER'];?>">
  <?php if( $readrow['HIGHESTBIDDER'] == $_SESSION['user']['USERNAME']) { ?>
  <div id="payment">
      <center><h1  style="color:white; background-color:#ffdf79 ;">WINNER!!!</h1></center>
      <center><h4><button class="btn btn-warning btn-xs" name="payment" >Payment</button></h4></center>
  </div>
<?php } ?>
</form>
  </div>


          
        
      </div>
     

    
     
    </main>

    <!-- Scripts for the timer-->
    <script type="text/javascript">
      
      //To set refresh every second
      setInterval(myTimer, 1000);
      var x= "<?php echo"$rem"?>" + "000";
      document.getElementById("payment").style.visibility="hidden";

      function myTimer() {
        /* get current date and due date to compare **/
        var date = new Date().getTime();
        var distance = (x) - (date)- "25200000";

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

      // Display the result in the element with id="demo"
      document.getElementById('time_left').innerHTML = days + "d " + hours + "h "
      + minutes + "m " + seconds + "s ";

      // If the count down is finished, write some text 
      if (distance < 0) {
        var childNodes = document.getElementById("disablebid").getElementsByTagName('*');
        for (var node of childNodes) {
            node.disabled = true;
        }
        clearInterval(x);
        document.getElementById('time_left').innerHTML = "BID CLOSED";

      }
      if(distance < 0){
         document.getElementById("payment").style.visibility="visible";
      }
      }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js" charset="utf-8"></script>
    <script src="script.js" charset="utf-8"></script>
    
<br><br><br><br><br><br><br><br>
           <footer class="footer">
               <div class="container">
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved. </p>
                   <p>This website is developed by Delta Group</p>
               </center>
               </div>
           </footer>
  </body>
</html>