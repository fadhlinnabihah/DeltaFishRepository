
<?php  
require_once "db.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['fpass_login'])) {
    //echo "hello";
    $UserID = htmlspecialchars($_POST['username']);
    $FPassQ = $_POST['fpassq'];
     $FPass = $_POST['fpass'];
    $stmt = $conn->prepare("SELECT * FROM tbl_user_delta WHERE (USERNAME = :user) LIMIT 1");
     $stmt->bindParam(':user', $UserID);
        $stmt->execute();
         $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ( $user['FPASS'] == $FPass) {
        echo "<script>
      alert('Please enter new password');
      window.location.href='EditPassword.php';
      </script>";
    
    }else{
         echo "<script>
      alert('Wrong answer!');
      window.location.href='login.php';
      </script>";
      
    }
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>FORGOT PASSWORD</title>
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
    <form method="post" action="ForgotPassword.php">
       
        <div class="row px-md-4 px-1 m-0">
            <div>
                    <p class="pb-1 username">Username</p> <input type="text" class=" name form-control mb-4" name="username" id="username" placeholder="Username" value="<?php if(isset($_GET['edit'])) echo $editrow['USERNAME']; ?>" required>
                </div>
            <div class="col-12">
                <div class="col-12">Forgot Password Question <select type="fpassq" class="form-control mb-4" name="fpassq" id="fpassq" required>
                <option value="" selected>Select</option>
                <option value="mothername" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your mother name?") echo "selected"; ?>>What is your mother name?</option>
                <option value="birthplace"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your birthplace?") echo "selected"; ?>>What is your birthplace?</option>
                <option value="primaryschool"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your first primary school?") echo "selected"; ?>>What is your first primary school?</option>
                <option value="petname" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your first pet name") echo "selected"; ?>>What is your first pet name?</option>
                <option value="fcolour" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your favourite colour?") echo "selected"; ?>>What is your favourite colour?</option>
            </select>
        </div>
         <div class="col-12">Forgot Password Answer<input type="text" class="form-control mb-4" name="fpass" id="fpass" placeholder="answer" value="<?php if(isset($_GET['edit'])) echo $editrow['FPASS']; ?>" required></div>
            </div>
            <div class="col-12 create">
                <div class="btn btn-primary py-3 ">
                     <div class="input-group">
                     
                        <button class="btn btn-primary" type="submit" name="fpass_login">LOGIN</button>        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>