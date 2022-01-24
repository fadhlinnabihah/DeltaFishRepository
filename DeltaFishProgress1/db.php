<?php
session_start();

$servername = 'lrgs.ftsm.ukm.my';
$username = 'a174777';
$password = 'largeblackbird';
$dbname = 'a174777';

$db = null; 

$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'lrgs.ftsm.ukm.my';
    $DATABASE_USER = 'a174777';
    $DATABASE_PASS = 'largeblackbird';
    $DATABASE_NAME = 'a174777';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}


// Template header, feel free to customize this
function template_header($title) {
// Get the amount of items in the shopping cart, this will be displayed in the header.
$num_items_in_cart = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
echo <<<EOT
<!DOCTYPE html>
<html>

	<head>
		

		<meta charset="utf-8">
		<title>$title</title>
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
		<style>
			main .cart h1 {
				display: block;
				font-weight: normal;
				margin: 0;
				padding: 40px 0;
				font-size: 24px;
				text-align: center;
				width: 100%;
			}
			main .cart table {
				width: 100%;
			}
			main .cart table thead td {
				padding: 30px 0;
				border-bottom: 1px solid #EEEEEE;
			}
			main .cart table thead td:last-child {
				text-align: right;
			}
			main .cart table tbody td {
				padding: 20px 0;
				border-bottom: 1px solid #EEEEEE;
			}
			main .cart table tbody td:last-child {
				text-align: right;
			}
			main .cart table .img {
				width: 80px;
			}
			main .cart table .remove {
				color: #777777;
				font-size: 12px;
				padding-top: 3px;
			}
			main .cart table .remove:hover {
				text-decoration: underline;
			}
			main .cart table .price {
				color: #999999;
			}
			main .cart table a {
				text-decoration: none;
				color: #555555;
			}
			main .cart table input[type="number"] {
				width: 68px;
				padding: 10px;
				border: 1px solid #ccc;
				color: #555555;
				border-radius: 5px;
			}
			main .cart .subtotal {
				text-align: right;
				padding: 40px 0;
			}
			main .cart .subtotal .text {
				padding-right: 40px;
				font-size: 18px;
			}
			main .cart .subtotal .price {
				font-size: 18px;
				color: #999999;
			}
			main .cart .buttons {
				text-align: right;
				padding-bottom: 40px;
			}
			main .cart .buttons input[type="submit"] {
				margin-left: 5px;
				padding: 12px 20px;
				border: 0;
	
		</style>
	</head>
	<body>
        <header>
        
            <div class="content-wrapper">
                <h1>DFOBB</h1>
                <nav>
                    <a href="index.php">Home</a>
                    <a href="index.php?page=br_pr">Products</a>
                </nav>
                <div class="link-icons">
                    <a href="index.php?page=cart">
						<i class="fas fa-shopping-cart"></i>
						<span>$num_items_in_cart</span>
					</a>
                </div>
            </div>
        </header>

        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year, Delta Fish </p>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
EOT;
}

?>
<!-- @@ -0,0 +1,52 @@
@import url('https://fonts.googleapis.com/css2?family=Tourney:wght@700&display=swap');
*{
	/*font-family: 'Tourney', cursive;*/
}
html{
	scroll-behavior: smooth;
}
body{
	
}
 
.navbar{
	background:#ABB2B9;
	border: none;
	border-radius: 0px;
	margin-bottom: 10px;
}

.page-header{
	margin-top: 0px;
}

.navbar-brand{
	margin: 5px 0px;
	font-size: 30px;
}

.nav li a{
	color: black;
  	text-decoration: none;
  	font-size: 17px;
  	font-weight: 500;
  	padding: 10px 10px;
  	margin: 10px 5px;
	border-radius: 9px;
	letter-spacing: 1px;
	transition: all 0.3s ease;
}


#bs-example-navbar-collapse-1 ul li a:hover{
	color: black;
	background:#ffffff;
	box-shadow:  0 0 10px #EAECEE, 0 0 40px #EAECEE, 0 0 80px #EAECEE;
}

#role{

	font-size: 15px;

}
 -->