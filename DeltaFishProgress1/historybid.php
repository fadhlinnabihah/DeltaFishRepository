<?php

  include_once 'historybid_crud.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <?=template_header('HISTORYBID')?>    
        <link rel="shortcut icon" href="img/lifestyleStore.png" />
        <title>DFOBB</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="css/style3.css" type="text/css">

        
        <style type="text/css">
         body {
           background-color: rgb(37, 150, 190);
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
            
            <div class="container">
                <div class="jumbotron">
                    <h1>Hi <?php echo $_SESSION['user']['USERNAME']?>!</h1>
                    <p>See your past bidding.</p>
                  
                </div>

            


    <div class="row" >

      <div class="container">
         <div class="jumbotron">
        <div class="page-header">
          <h2>History Bidding List</h2>
        </div>
        <table id="productlist" style="width: 100%; height: 100%;" class="table-dark  table-bordered hover" id="table">
          <thead>
          <tr>
            <th>Product ID</th>
            <th>Name</th>
            <th>Description</th> 
            <th>Highestbid</th>
            <th>Picture<br><small>(Clickable)</small></th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          <?php
          $id= $_SESSION['user']['USERNAME'];
          try {
            // $arr = get_defined_vars();
            // print_r($arr); 
            // die;
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            

            $stmt = $conn->prepare("SELECT * FROM tbl_productbid_delta WHERE HIGHESTBIDDER='$id'");
            $stmt->execute();
            $result = $stmt->fetchAll();
          }
          catch(PDOException $e){
            echo "Error: " . $e->getMessage();
          }
          foreach($result as $readrow) {
            ?>   
            <tr>
              <td><?php echo $readrow['ID'];?></td>
              <td><?php echo $readrow['NAME']; ?></td>
              <td><?php echo $readrow['DESCRIPTION']; ?></td>
              <td><?php echo 'RM'.$readrow['HIGHESTBID']; ?></td>
              
              <?php if(file_exists('pictures_bid/'. $readrow['PICTURE']) && isset($readrow['PICTURE'])){
                $img = 'pictures_bid/'.$readrow['PICTURE'];
                echo '<td><img data-toggle="modal" data-target="#'.$readrow['ID'].'" width=150px; src="'.$img.'"></td>';
              }
              else{
                $img = 'nophoto.jpg';
                echo '<td><img width=150px%; data-toggle="modal" data-target="#'.$readrow['ID'].'" src="nophoto.jpg"'.'></td>';
              } ?>

              <div id="<?php echo $readrow['ID']?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-body">
                  <img src="<?php echo $img ?>" class="img-responsive">
                </div>
              </div>


              <td>
                <a href="product_detail_bid_seller.php?pid=<?php echo $readrow['ID']; ?>" class="btn btn-warning btn-xs" role="button">Details</a>
                <a href="deliverytype.php?pid=<?php echo $readrow['ID']; ?>" class="btn btn-warning btn-xs" role="button">PAYMENT</a> 

               
                
              </td>
            </tr>

            <?php
          }
          $conn = null;
          ?>
          </tbody>
        </table>
      </div>
    </div>
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
<!-- <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js%22%3E"></script> -->
    </body>
</html>
