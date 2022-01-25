
<?php
include_once 'db.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");

if(isset($_SESSION['user']['BANKNO']) &&  isset($_SESSION['user']['BANKNAME']))
    header("LOCATION: sellerhome.php");


$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['submit_btn'])) {
    $stmt = $conn->prepare("INSERT INTO tbl_user_delta(BANKNO, BANKNAME) VALUES (:bankno, :bankname)");

    $stmt->bindParam(':bankno', $pass, PDO::PARAM_INT);
    $stmt->bindParam(':bankname', $name, PDO::PARAM_STR);


     $bankno = $_POST['bankno'];
      $bankname = $_POST['bankname'];

       $stmt->execute();

       echo "<script>
      alert('Successfully Register!');
      window.location.href='login.php';
      </script>";

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SELLER VERIFICATION PAGE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">

    <link href="css/body.css" rel="stylesheet">
</head>
<body><div class="container pt-4 pb-5">
    <div class="text-1"></div>
    <div class="text-2"></div>
    <div class="text-3"></div>
    
        <div class="text-center pt-3">
            <p class="display-7 fw-bold">Seller<span class="ps-1"> bank account </span></p> <small class="d-flex align-items-center justify-content-center mb-3">
            </small>
        </div>


<form action="sellerverification.php" method ="post" class="form-horizontal">
        <div class="row px-md-4 px-1 m-0">
            <div class="col-12">
                <div>Bank Account Number
                    <p class="pb-1 bankno"> </p> <input name="bankno" id="bankno" type="text" class=" name form-control mb-4" placeholder="Bank Account Number" value="<?php if(isset($_GET['edit'])) echo $editrow['BANKNO']; ?>" required>
                </div>
            </div>

            <div class="col-12">Bank Name<input type="text" class="form-control mb-4" name="bankname" id="bankname" placeholder="Bank Name" value="<?php if(isset($_GET['edit'])) echo $editrow['BANKNAME']; ?>" required> </div>

            <div class="col-12 create">
                
                <a href="sellerhome.php">
            <input type="button" name="seller" value="Submit" id="seller" class="btn btn-primary py-3 "><?php if (isset($_GET['edit'])) { ?>
                    <div class="d-flex align-items-center justify-content-between"> <a href="">
                        <?php } ?></div></a>

                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>