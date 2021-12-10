<?php
  include 'db.php'
?>


<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Delta Fish  : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/jpg" href="logo.jpg" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
     <style type="text/css">
        
        input[type="file"] {
          display: none;
        }
        body {
          background-color: #74E1F5;
          padding: 30px 10px;
          justify-content: center;
        }
      </style>

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
    background-image: linear-gradient(to right, #25aae1, #4481eb, #04befe, #3f86ed);
    box-shadow: 0 4px 15px 0 rgba(65, 132, 234, 0.75);
}
.thick {
  font-weight: bold;
}

</style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <div class="page-header">
      <center>
        <h2 class="thick">BROWSE PRODUCT</h2>
      
      

      <div class="buttons">
    
    <a href="br_pr.php"><button class="btn-hover color-2">Buy</button>
    <a href="br_pr_bid.php"><button class="btn-hover color-9">Bid</button>
   
</div>
    
  </center>
  </      
    <!-- Need to change later -->



      <table class="table table-bordered">
        <tr style="background: #89CFF0;color: #fff;">
          <th>Picture</th> 
          <th>Name</th>

          <th>Seller</th>
          <th>Current Bid</th>
          <th></th>         
      </tr>
      
       <?php
      // Read
      $per_page = 10;
      if (isset($_GET["page"]))
        $page = $_GET["page"];
      else
        $page = 1;
      $start_from = ($page-1) * $per_page;
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("select * from tbl_productbid_delta LIMIT $start_from, $per_page"); 
        $stmt->execute();
        $result = $stmt->fetchAll();
      }
      catch(PDOException $e){
            echo "Error: " . $e->getMessage();
      }
      foreach($result as $readrow) {
      ?>    
      <tr>
        <?php if(file_exists('pictures_bid/'. $readrow['PICTURE'])){
                $img = 'pictures_bid/'.$readrow['PICTURE'];
                 echo  '<td><img class="circular--square" data-toggle="modal" data-target="#'.$readrow['PICTURE'].'" width=150px; src="pictures_bid/'.$readrow['PICTURE'].'"></td>';
              }
              else{
                $img = 'pictures/nophoto.jpg';
                echo '<td><img class="circular--square" width=70%; data-toggle="modal" data-target="#'.$readrow['PICTURE'].'" src="pictures/nophoto.jpg"'.'></td>';
                
              }?>

              <div id="<?php echo $readrow['ID']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             
                </div>
              </div>

        

        <td><?php echo $readrow['NAME']; ?></td>
        <td><?php echo $readrow['SELLER']; ?></td>
        <td><?php echo $readrow['HIGHESTBID']; ?></td>
         
       
        
        <td>
          <a href="product_detail_bid.php?pid=<?php echo $readrow['ID']; ?>" class="btn btn-warning btn-xs" role="button" ">Details</a>
          
              </td>
         
      </tr>
      <?php
      }
      $conn = null;
      ?>
     


 
    <div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
      <nav>
          <!-- <ul class="pagination"> -->
          
          <?php
           try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_productbid_delta");
            $stmt->execute();
            $result = $stmt->fetchAll();
            $total_records = count($result);
          }
          catch(PDOException $e){
                echo "Error: " . $e->getMessage();
          }
          $total_pages = ceil($total_records / $per_page);
          ?>
          <!-- <?php if ($page==1) { ?> -->
           <!--  <li class="disabled"><span aria-hidden="true">«</span></li>
          <?php } else { ?>
            <li><a href="br_pr_bid.php?page=<?php echo $page-1 ?>" aria-label="Previous"><span aria-hidden="true">«</span></a></li>
          
          <?php
          }
          // for ($i=1; $i<=$total_pages; $i++)
          //   if ($i == $page)
          //     echo "<li class=\"active\"><a href=\"products.php?page=$i\">$i</a></li>";
          //   else
          //     echo "<li><a href=\"br_pr_bid.php?page=$i\">$i</a></li>";
          ?> -->
          <!-- <?php if ($page==$total_pages) { ?>
            <li class="disabled"><span aria-hidden="true">»</span></li>
          <?php } else { ?>
            <li><a href="br_pr_bid.php?page=<?php echo $page+1 ?>" aria-label="Previous"><span aria-hidden="true">»</span></a></li>
          <?php } ?>
        </ul>
      </nav> -->
    </div>
    
 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
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
    </script>
</body>
</html>