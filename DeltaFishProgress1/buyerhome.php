<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="img/fishwallpaper.jpg" />
        <title>DFOBB BUYER HOME PAGE</title>
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
    </head>
    <body>
        <div>
           <?php
            require 'header.php';
           ?>
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Welcome to DFOBB</h1>
                       <p>Delta Fish Online Buying & Bidding</p>
                       <a href="br_pr.php" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
         </div>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved. | Contact Us: +05 40000 00000</p>
                   <p>This website is developed by Delta Group</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>