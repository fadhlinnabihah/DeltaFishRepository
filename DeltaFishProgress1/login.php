<?php 
require_once "db.php";


// // if (isset($_SESSION['loggedin'])){
// //    header("LOCATION: index.php");
// // }

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (isset($_POST['username'], $_POST['pass'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    if (empty($username) || empty($password)) {
        $_SESSION['error'] = 'Please fill in the blanks.';
    } else {
        $stmt = $db->prepare("SELECT * FROM tbl_user_delta WHERE (USERNAME = :username)");
        $stmt->bindParam(':username', $username);

        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($user['USERNAME'])) {
            if ($user['PASS'] == $password) {
                unset($user['PASS']);
                $_SESSION['loggedin'] = true;
                $_SESSION['user'] = $user;
                echo "<script>
                alert('Successfully Login!');
                </script>";
                header("LOCATION: accounttype.php");
                exit();
            } else {
                $_SESSION['error'] = 'Invalid login credentials. Please try again.';
            }
        } else {
            $_SESSION['error'] = 'No account found.';
        }
    }

    header("LOCATION: " . $_SERVER['REQUEST_URI']);
    exit();
}

if (isset($_SESSION['loggedin']))
header("LOCATION: accounttype.php");







// include "db.php";

// if (isset($_POST['login_btn'])) {
    
//     $username = mysqli_real_escape_string($con, $_POST['username']);
//     $password = mysqli_real_escape_string($con,$_POST['pass']);
  


//     if ($username != "" && $password !="") {
//         $stmt = $con->prepare("SELECT * FROM tbl_tbl_user_delta WHERE (USERNAME = :Username) LIMIT 1");
//         $stmt->bindParam(':username', $Username);
//         $stmt->execute();
//         $user = $stmt->fetch(PDO::FETCH_ASSOC);


//        // $sql_query ="SELECT * FROM tbl_user_delta WHERE (username=$username and password = $password) ";
//         // $result =mysqli_query($con,$sql_query);
//         // $row=mysqli_fetch_array($result);



//         $count = $row['USERNAME'];

//         if ($count > 0) {
//             $_SESSION['username'] =$username;
//             header('LOCATION:home.php');
//         }
//         else{
//             echo "Invalid Username or Password";
//         }
        
//     }
// }
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DELTA LOGIN PAGE</title>
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
    <form method="post" action="login.php">
        <div class="text-center pt-3">
            <p class="display-7 fw-bold">Login<span class="ps-1"> Account</span></p> <small class="d-flex align-items-center justify-content-center mb-3">
               <p>New to this website?</p>
                <div> <a href="register.php" class="btn btn-primary">Register</a></div>
            </small>
        </div>
        
        <div class="row px-md-4 px-1 m-0">
            <div class="col-12">
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                <div>
                    <p class="pb-1 username">Username</p> <input maxlength="55" type="text" class=" name form-control mb-4" name="username" id="username" placeholder="Username" value="<?php if(isset($_GET['edit'])) echo $editrow['USERNAME']; ?>" required>
                </div>
            </div>

            <div class="col-12"> <p class="pb-1 password">Password</p>  <input maxlength="50" type="password" class="form-control mb-4" name="pass" id="pass" value="<?php if(isset($_GET['edit'])) echo $editrow['PASS']; ?>" placeholder="Password" required> </div>
            
            <div class="col-12 create">
                <div class="btn btn-primary py-3 ">
                     <div class="input-group">                     
                        <input  type="submit" name="login_btn" value="LOGIN" class="btn btn-primary"/> 
             


                              <?php if (isset($_GET['edit'])) {?>
                                <div class="d-flex align-items-center justify-content-between"></div>
                             <?php } ?>  
                    </div> 

                </div>
            </div>
        </form>
        </div>
        <br>
 <div class="text-center pt-3">
           <small class="d-flex align-items-center justify-content-center mb-3">
                <div> <a href="ForgotPassword.php" class="btn btn-primary">Forgot Password?</a></div>
            </small>
        </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>
