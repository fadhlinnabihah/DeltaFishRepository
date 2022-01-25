<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>


<html>
<head>
  <meta charset="utf-8">
   <link rel="shortcut icon" type="image/png" href="deltafish_logo.png" /> 
        <?=template_header('br_pr_bid')?>    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Delta Fish  : Products</title>
  <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css"/>
     <link rel="stylesheet" href="css/style3.css" type="text/css">
     <style type="text/css">
        
        input[type="file"] {
          display: none;
        }
        body {
           background-color: rgb(37, 150, 190);
          padding: 0px 0px;
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
        <h2 class="thick"; style="color: white;">BROWSE PRODUCT</h2>
      
      

      <div class="buttons">
    
    <a href="index.php?page=br_pr"><button class="btn-hover color-2">Buy</button></a>
    <a href="br_pr_bid.php"><button class="btn-hover color-9">Bid</button></a>
   
</div>
    
  </center>
</div>
</div>
</div>

<center><h2 class="thick" style="color: white;">Bidding Product List</h2></center> 
    <div class="row">

      <div class="container">
        
         
        

            
          <?php
          try {
            
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM tbl_productbid_delta WHERE DUEDATE >= NOW()-INTERVAL 5 MINUTE");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          } ?>
            
          <?php
          foreach($result as $readrow) {
              ?>
          <div class="col-md-3 d-flex align-items-stretch" >
            <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); max-width: 300px;  padding: 16px;  text-align: center; font-family: arial; margin-bottom: 10px; background-color: white;">   

              <?php if(file_exists('pictures_bid/'. $readrow['PICTURE']) && isset($readrow['PICTURE'])){
                $img = 'pictures_bid/'.$readrow['PICTURE'];
                echo '<td><img data-toggle="modal" data-target="#'.$readrow['ID'].'" width=200px height=200px; src="'.$img.'"></td>';
              }
              else{
                $img = 'nophoto.jpg';
                echo '<td><img width=200px%; data-toggle="modal" data-target="#'.$readrow['ID'].'" src="nophoto.jpg"'.'></td>';
              } ?>
              
              <p><?php echo $readrow['NAME']; ?></p>
              <p><?php echo $readrow['SELLER']; ?></p>
              <p><h2><?php echo 'RM'.$readrow['HIGHESTBID']; ?><h2></p>
              


              <td>
                <a href="product_detail_bid.php?pid=<?php echo $readrow['ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>

                
            
                
              </td>
            </div> 
          </div>
          
            <?php
          }
          $conn = null;
          ?>
            </div>
      </div>
      


         <br><br><br><br><br><br><br><br>
   <footer class="footer"> 
               
               <center>
<<<<<<< Updated upstream
                   <p>Copyright &copy DFOBB. All Rights Reserved. </p>
=======
                   <p>Copyright &copy DFOBB. All Rights Reserved.</p>
>>>>>>> Stashed changes
                   <p>This website is developed by Delta Group</p>
               </center>
               
           </footer>
      
 
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