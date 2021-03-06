<?php
include_once 'index.php';
  
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>

<!DOCTYPE html>
<html>
    <head>
         <link rel="shortcut icon" type="image/png" href="deltafish_logo.png" /> 
        <?=template_header('Home')?>    
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
              /*flex-grow: 1;*/
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
                padding:10px;    
                bottom:0;
            }
            .footer { 
                background-color: #FFFFFF;
                position: absolute; 
                bottom:0; 
                right:0;
                left:0;
            }
            #bannerImage{
                padding-top:75px;
                padding-bottom:50px;
                margin-bottom: 20px;
                text-align:center;
                color:lightgrey;
                background:url(img/wallpaper.jpg);
                background-size:cover;
            }

            #bannerContent{
                position:relative;
                color: #FFFFFF;
                padding-top:6%;
                padding-bottom:6%;
                margin-top:12%;
                margin-bottom:12%;
                background-color:rgba(0,0,0,0.7);
                background-blend-mode: screen;
                max-width:660px;
            }
        </style>
    </head>
    <body>

        <div>
          
           <div id="bannerImage">
               <div class="container">
                   <center>
                   <div id="bannerContent">
                       <h1>Welcome to DFOBB</h1>
                       <p>Delta Fish Online Buying & Bidding</p>
                       <a href="index.php?page=br_pr" class="btn btn-danger">Shop Now</a>
                   </div>
                   </center>
               </div>
           </div>
         </div>
           <footer class="footer"> 
               <div class="container">
               <center>
                   <p>Copyright &copy DFOBB. All Rights Reserved.</p>
                   <p>This website is developed by Delta Group</p>
               </center>
               </div>
           </footer>
        </div>
    </body>
</html>