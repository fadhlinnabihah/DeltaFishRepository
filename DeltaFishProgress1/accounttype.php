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
    <title>DELTA ACCOUNT PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

    <link href="css/body.css" rel="stylesheet">
</head>
<body><div class="container pt-4 pb-5">
    <div class="text-1"></div>
    <div class="text-2"></div>
    
        <div class="text-center pt-3">
            <p class="display-7 fw-bold">You<span class="ps-1"> are a ?</span></p> <small class="d-flex align-items-center justify-content-center mb-3">

            </small>
        </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="col-12 create">

            <a href="sellerverification.php">
            <input type="button" name="seller" value="Seller" id="seller" class="btn btn-primary py-3 "><?php if (isset($_GET['edit'])) { ?>
                    <div class="d-flex align-items-center justify-content-between"> <a href="">
                        <?php } ?></div></a>
                </div>

                <div class="col-md-6">
                    <div class="col-12 create">
                        <a href="index.php?page=buyerhome">
                        <input type="button" name="buyer" value="Buyer" id="buyer"  class="btn btn-primary py-3 "><?php if (isset($_GET['edit'])) { ?>
                    <div class="d-flex align-items-center justify-content-between">
                        <?php } ?>
                </div></a>


            </div>
            </div>

           
            </div>
        </div>
    </form>
</div>
</body>
</html>