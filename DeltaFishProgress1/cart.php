<?php
include_once 'index.php';
if (!isset($_SESSION['loggedin']))
    header("LOCATION: login.php");
?>
<?php
// If the user clicked the add to cart button on the product page we can check for the form data
if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    // Set the post variables so we easily identify them, also make sure they are integer
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    // Prepare the SQL statement, we basically are checking if the product exists in our databaser
    $stmt = $pdo->prepare('SELECT * FROM tbl_productsell_delta WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);
    // Fetch the product from the database and return the result as an Array
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    // Check if the product exists (array is not empty)
    if ($product && $quantity > 0) {
        // Product exists in database, now we can create/update the session variable for the cart
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
                // Product exists in cart so just update the quanity
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
                // Product is not in cart so add it
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
            // There are no products in cart, this will add the first product to cart
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
// Remove product from cart, check for the URL param "remove", this is the product id, make sure it's a number and check if it's in the cart
if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {
    // Remove the product from the shopping cart
    unset($_SESSION['cart'][$_GET['remove']]);
}

// Update product quantities in cart if the user clicks the "Update" button on the shopping cart page
if (isset($_POST['update']) && isset($_SESSION['cart'])) {
    // Loop through the post data so we can update the quantities for every product in cart
    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
            // Always do checks and validation
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
                // Update new quantity
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    // Prevent form resubmission...
    header('location: index.php?page=cart');
    exit;
}
// Check the session variable for products in cart
$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
$products = array();
$subtotal = 0.00;
$cidu = $_SESSION['user']['USERNAME'];
$seller='';
// Send the user to the place order page if they click the Place Order button, also the cart should not be empty
if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM tbl_productsell_delta WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) {
        if($product['SELLER'] != $seller){
            try {
                $stmt = $db->prepare("INSERT INTO tbl_order_delta(fld_order_num, fld_seller_user,fld_customer_user) VALUES(:oid, :sid, :cid)");
               
                $stmt->bindParam(':oid', $oid, PDO::PARAM_STR);
                $stmt->bindParam(':sid', $sid, PDO::PARAM_STR);
                $stmt->bindParam(':cid', $cid, PDO::PARAM_STR);
                   
                $oid = uniqid('O', true);
                $soid = $oid;
                $sid = $product['SELLER'];
                $cid = $cidu;
                 
                $stmt->execute();
                }
             
              catch(PDOException $e)
              {
                  echo "Error: " . $e->getMessage();
              }
            $seller=$product['SELLER']; 
        }

        try {
                $stmt = $db->prepare("INSERT INTO tbl_order_detail_delta( fld_order_detail_num, fld_order_num, fld_product_num, fld_order_detail_quantity) VALUES(:odid, :oid, :name, :quantity)");
               
                $stmt->bindParam(':odid', $odid, PDO::PARAM_STR);
                $stmt->bindParam(':oid', $soid, PDO::PARAM_STR);
                $stmt->bindParam(':name', $name, PDO::PARAM_STR);
                $stmt->bindParam(':quantity', $quantity, PDO::PARAM_STR);
                   
                $odid = uniqid('D', true);
                $soid = $oid;
                $name = $product['NAME'];
                $quantity = $products_in_cart[$product['ID']];
                 
                $stmt->execute();
                }
             
              catch(PDOException $e)
              {
                  echo "Error: " . $e->getMessage();
              }
       
    }
    
    
    header('Location: deliverytype.php');
    exit;
}


// If there are products in cart
if ($products_in_cart) {
    // There are products in the cart so we need to select those products from the database
    // Products in cart array to question mark string array, we need the SQL statement to include IN (?,?,?,...etc)
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM tbl_productsell_delta WHERE id IN (' . $array_to_question_marks . ')');
    // We only need the array keys, not the values, the keys are the id's of the products
    $stmt->execute(array_keys($products_in_cart));
    // Fetch the products from the database and return the result as an Array
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // Calculate the subtotal
    foreach ($products as $product) { 
    $subtotal += (float)$product['PRICE'] * (int)$products_in_cart[$product['ID']];    
    }
}

?>

<?=template_header('cart')?>
<style type="text/css">
    * {
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, "segoe ui", roboto, oxygen, ubuntu, cantarell, "fira sans", "droid sans", "helvetica neue", Arial, sans-serif;
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
}
html {
    height: 100%;
}
body {
    position: relative;
    min-height: 100%;
    color: #555555;
    background-color: #FFFFFF;
    margin: 0;
    padding-bottom: 100px; /* Same height as footer */
}
h1, h2, h3, h4, h5 {
    color: #394352;
}
.content-wrapper {
    width: 1050px;
    margin: 0 auto;
}
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
    flex-grow: 1;
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
    color: #FFFFFF;
    font-size: 12px;
    line-height: 16px;
    width: 16px;
    height: 16px;
    font-weight: bold;
    position: absolute;
    top: 22px;
    right: 0;
}
main .featured {
    display: flex;
    flex-direction: column;
    background-image: url(imgs/featured-image.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 500px;
    align-items: center;
    justify-content: center;
    text-align: center;
}
main .featured h2 {
    display: inline-block;
    margin: 0;
    width: 1050px;
    font-family: Rockwell, Courier Bold, Courier, Georgia, Times, Times New Roman, serif;
    font-size: 68px;
    color: #FFFFFF;
    padding-bottom: 10px;
}
main .featured p {
    display: inline-block;
    margin: 0;
    width: 1050px;
    font-size: 24px;
    color: #FFFFFF;
}
main .recentlyadded h2 {
    display: block;
    font-weight: normal;
    margin: 0;
    padding: 40px 0;
    font-size: 24px;
    text-align: center;
    width: 100%;
    border-bottom: 1px solid #EEEEEE;
}
main .recentlyadded .products, main .products .products-wrapper {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
    justify-content: space-between;
    padding: 40px 0 0 0;
}
main .recentlyadded .products .product, main .products .products-wrapper .product {
    display: block;
    overflow: hidden;
    text-decoration: none;
    width: 25%;
    padding-bottom: 60px;
}
main .recentlyadded .products .product img, main .products .products-wrapper .product img {
    transform: scale(1);
    transition: transform 1s;
}
main .recentlyadded .products .product .name, main .products .products-wrapper .product .name {
    display: block;
    color: #555555;
    padding: 20px 0 2px 0;
}
main .recentlyadded .products .product .price, main .products .products-wrapper .product .price {
    display: block;
    color: #999999;
}
main .recentlyadded .products .product .rrp, main .products .products-wrapper .product .rrp {
    color: #BBBBBB;
    text-decoration: line-through;
}
main .recentlyadded .products .product:hover img, main .products .products-wrapper .product:hover img {
    transform: scale(1.05);
    transition: transform 1s;
}
main .recentlyadded .products .product:hover .name, main .products .products-wrapper .product:hover .name {
    text-decoration: underline;
}
main > .product {
    display: flex;
    padding: 40px 0;
}
main > .product > div {
    padding-left: 15px;
}
main > .product h1 {
    font-size: 34px;
    font-weight: normal;
    margin: 0;
    padding: 20px 0 10px 0;
}
main > .product .price {
    display: block;
    font-size: 22px;
    color: #999999;
}
main > .product .rrp {
    color: #BBBBBB;
    text-decoration: line-through;
    font-size: 22px;
    padding-left: 5px;
}
main > .product form {
    display: flex;
    flex-flow: column;
    margin: 40px 0;
}
main > .product form input[type="number"] {
    width: 400px;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    color: #555555;
    border-radius: 5px;
}
main > .product form input[type="submit"] {
    background: #4e5c70;
    border: 0;
    color: #FFFFFF;
    width: 400px;
    padding: 12px 0;
    text-transform: uppercase;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
    cursor: pointer;
}
main > .product form input[type="submit"]:hover {
    background: #434f61;
}
main > .products h1 {
    display: block;
    font-weight: normal;
    margin: 0;
    padding: 40px 0;
    font-size: 24px;
    text-align: center;
    width: 100%;
}
main > .products .buttons {
    text-align: right;
    padding-bottom: 40px;
}
main > .products .buttons a {
    display: inline-block;
    text-decoration: none;
    margin-left: 5px;
    padding: 12px 20px;
    border: 0;
    background: #4e5c70;
    color: #FFFFFF;
    font-size: 14px;
    font-weight: bold;
    border-radius: 5px;
}
main > .products .buttons a:hover {
    background: #434f61;
}
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
    background: #4e5c70;
    color: #FFFFFF;
    font-size: 14px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
}
main .cart .buttons input[type="submit"]:hover {
    background: #434f61;
}
main .placeorder h1 {
    display: block;
    font-weight: normal;
    margin: 0;
    padding: 40px 0;
    font-size: 24px;
    text-align: center;
    width: 100%;
}
main .placeorder p {
    text-align: center;
}
footer {
    position: absolute;
    bottom: 0;
    border-top: 1px solid #EEEEEE;
    padding: 20px 0;
    width: 100%;
}
</style>
<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=products_detail_sell&id=<?=$readrow['ID']?>">
                            <img src="pictures_sell/<?=$product['PICTURE']?>" width="50" height="50" alt="<?=$product['NAME']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=products_detail_sell&id=<?=$product['ID']?>"><?=$product['NAME']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['ID']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">RM <?=$product['PRICE']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['ID']?>" value="<?=$products_in_cart[$product['ID']]?>" min="1" max="<?=$product['STOCK']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">RM <?=$product['PRICE'] * $products_in_cart[$product['ID']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">RM <?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
        </div>
    </form>
</div>
