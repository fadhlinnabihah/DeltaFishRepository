<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="img/fishwallpaper.jpg" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DELTA CHECKOUT PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

    <link href="css/body.css" rel="stylesheet">
</head>
<body><div class="container pt-4 pb-5">
    <div class="text-1"></div>
    <div class="text-2"></div>
    <br>
        <div class="text-center pt-3">
            <p class="display-7 fw-bold">Choose<span class="ps-1"> delivery method</span></p> <small class="d-flex align-items-center justify-content-center mb-3">

            </small>
        </div>
<br>

            <div class="row">
                <div class="col-md-12">
                    <div class="col-12 create">

            <a href="delivery.php">
            <input type="button" name="seller" value="Delivery" id="seller" class="btn btn-primary py-3 "><?php if (isset($_GET['edit'])) { ?>
                    <div class="align-items-center"> <a href="">
                        <?php } ?></div></a>

                        <br>
                <div class="col-md-12">
                    <div class="col-12 create">
                        <a href="pickup.php">
                        <input type="button" name="buyer" value="Pickup" id="buyer"  class="btn btn-primary py-3 "><?php if (isset($_GET['edit'])) { ?>
                    <div class="align-items-center">
                        <?php } ?>
                </div></a>

                <br>
            </div>
            </div>

           
            </div>
        </div>
    </form>
</div>
</body>
</html>