<?php
//session_start();
include_once 'signup.php';
//if(isset($_SESSION['signup'])){
  //header("location: mainpage.php");
  //die();
  //}
 ?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DELTA REGISTRATION PAGE</title>
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
            <p class="display-7 fw-bold">Create<span class="ps-1">account</span></p> <small class="d-flex align-items-center justify-content-center mb-3">
                <p>Already have an account?</p>
                <div> <a href="login.php" class="btn btn-primary">Sign In</a></div>

            </small>
        </div>


<form action="register.php" method ="post" class="form-horizontal">
        <div class="row px-md-4 px-1 m-0">
            <div class="col-12">
                <div>Username
                    <p class="pb-1 username"> </p> <input name="username" id="username"  pattern="[A-Za-z0-9]+"type="text" class=" name form-control mb-4" placeholder="Username" value="<?php if(isset($_GET['edit'])) echo $editrow['USERNAME']; ?>" required>
                </div>
            </div>

            <div class="col-12">Password<input type="password" class="form-control mb-4" name="pass" id="pass" placeholder="*********" value="<?php if(isset($_GET['edit'])) echo $editrow['PASS']; ?>" required></div>

            <div class="col-6">Full Name <input type="text" class="form-control mb-4" name="name" id="name" placeholder="Full Name" value="<?php if(isset($_GET['edit'])) echo $editrow['NAME']; ?>" required> </div>

            <div class="col-6">Phone Number<input type="text" class="form-control mb-4" name="phone" id="phone" placeholder="###-#######" value="<?php if(isset($_GET['edit'])) echo $editrow['PHONE']; ?>" required> </div>
            
            <div class="col-12">Email<input type="email" class="form-control mb-4" name="email" id="email" placeholder="###@#####.com" value="<?php if(isset($_GET['edit'])) echo $editrow['EMAIL']; ?>" required> </div>
            
            <div class="col-12">Forgot Password Question <select type="fpassq" class="form-control mb-4" name="fpassq" id="fpassq" required>
                <option value="" selected>Select</option>
                <option value="mothername" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your mother name?") echo "selected"; ?>>What is your mother name?</option>
                <option value="birthplace"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your birthplace?") echo "selected"; ?>>What is your birthplace?</option>
                <option value="primaryschool"  <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your first primary school?") echo "selected"; ?>>What is your first primary school?</option>
                <option value="petname" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your first pet name") echo "selected"; ?>>What is your first pet name?</option>
                <option value="fcolour" <?php if(isset($_GET['edit'])) if($editrow['FPASSQ']=="What is your favourite colour?") echo "selected"; ?>>What is your favourite colour?</option>
            </select>
        </div>

        <div class="col-12">Forgot Password Answer<input type="text" class="form-control mb-4" name="fpass" id="fpass" placeholder="Answer" value="<?php if(isset($_GET['edit'])) echo $editrow['FPASS']; ?>" required></div>

            

            <div class="col-12 create">
                
                <div> <input type="submit" name="create" value="Create Your Account"class="btn btn-primary py-3 ">  
                    <?php if (isset($_GET['edit'])) { ?>
                    <div class="d-flex align-items-center justify-content-between">
                        <?php } ?>

                        
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</body>
</html>