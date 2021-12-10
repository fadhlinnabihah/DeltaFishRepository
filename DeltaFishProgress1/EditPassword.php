
<?php  
require_once "db.php";
 //include "ForgotPassword.php";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // $conn = mysqli_connect($servername,$username,$password,$dbname);

if (isset($_POST['fpass_change'])) {
 
    //$USER = $_POST['username']
      $UserID = htmlspecialchars($_POST['username']);
    $NPass = $_POST['npass'];
    $RePass = $_POST['repass'];

    if ($NPass == $RePass) {
        $hash = $NPass;
         $stmt = $conn->prepare("UPDATE tbl_user_delta SET PASS = :pass WHERE USERNAME = :user");
          $stmt->bindParam(':user', $UserID);
            $stmt->bindParam(':pass', $hash, PDO::PARAM_STR);
            // $PASS = $_POST['pass'];
         $stmt->execute();
        // // $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // $hash = md5($NPass);
        // $update = "UPDATE tbl_tbl_user_delta SET PASS = $hash WHERE USERNAME = $UserID";
        // $result = mysqli_query($conn, $update);



        echo "<script>
      alert('Your password is successfully change');
      window.location.href='accounttype.php';
      </script>";
    }else {
         echo "<script>
      alert('Wrong answer!');
      window.location.href='EditPassword.php';
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
    <form method="post" action="EditPassword.php">
       
        <div class="row px-md-4 px-1 m-0">
          <p class="pb-1 username">Username</p> <input type="text" class=" name form-control mb-4" name="username" id="username" placeholder="Username" value="<?php if(isset($_GET['edit'])) echo $editrow['USERNAME']; ?>" required>
    
        <div class="col-12">New Password<input type="password" class="form-control mb-4" name="npass" id="npass" placeholder="*********" value="<?php if(isset($_GET['edit'])) echo $editrow['PASS']; ?>" required></div>
        <div class="col-12">Re-Enter Password<input type="password" class="form-control mb-4" name="repass" id="repass" placeholder="*********" required></div>

            <div class="col-12 create">
                <div class="btn btn-primary py-3 ">
                     <div class="input-group">
                     
                        <button class="btn btn-primary" type="submit" name="fpass_change">CHANGE PASSWORD</button>        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>