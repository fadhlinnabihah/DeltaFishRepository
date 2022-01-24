<?php 
require 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DFOBB Log out</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="css/main.css" rel="stylesheet"/>

    <link rel="shortcut icon" type="image/jpg" href="logo.jpg" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container center-wrapper text-center">
    <?php
    unset($_SESSION);
    session_destroy();
    header( "refresh:7;url=login.php");
    ?>
    <div style="padding:;border-radius: 5px;">
        <h1>Logged Out</h1>
        <p> You have been log out from DFOBB</p>
        <a class="btn btn-primary" href="login.php" role="button">Okey</a>
    </div>

</div>
