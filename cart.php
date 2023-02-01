<script>
//function to switch pages as an alternative to header
function switchPage(page){
	window.location.href = "https://webtech-ki27.webtech-uva.nl/" + page;
}
</script>
<script src="api-client.js"></script>

<?php

include_once 'connection.php';
require_once 'functions.inc.php';

include_once 'header.php'; 




if(isset($_GET['id']) && isset($_GET['quantity'])) {
	$productID = $_GET['id'];
	$quantity = $_GET['quantity'];

// info uit tabel products
$stmt = $conn->prepare("SELECT smaak, categoryID, prijs, image, leverancierID, description, in_stock
FROM products WHERE productID = ?;");
$stmt->bind_param("i", $productID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($smaak, $categoryID, $prijs, $image, $leverancierID, $description, $inStock);
$stmt->fetch();


// info uit tabel leveranciers
$stmt = $conn->prepare("SELECT leverancier FROM leveranciers WHERE leverancierID = ?;");
$stmt->bind_param("i", $leverancierID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($leverancierNaam);
$stmt->fetch();

// info uit tabel categories
$stmt = $conn->prepare("SELECT category_name, category_weight FROM categories WHERE categoryID = ?;");
$stmt->bind_param("i", $categoryID);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($category_name, $category_weight);
$stmt->fetch();

// subtotaal is de prijs keer de quantity
$subtotaal = ($prijs * $quantity);

}

function add_to_cart($image, $productID, $smaak, $category_name ,$quantity, $prijs, $subtotaal, $current_stock) {
    $cart_item = array(
		'image' => '<img src="fotos/products/'.$image.'"style="width:25%; height:80%;">',
        'productID' => $productID,
		'smaak' => $smaak,
		'categorie' => $category_name,
        'quantity' => $quantity,
		'prijs' => $prijs,
		'subtotaal' => $subtotaal,
		'current_stock' => $current_stock
    );
    array_push($_SESSION['cart'], $cart_item);
}
  
function display_cart($conn) {
	if (empty($_SESSION['cart'])) {
	  echo '<div class="shopping_container">
	  			<h1>Your cart is empty.</h1>
				</div>';
	} else {
	   // Hier komt alle info van elke cart item

		$totaalprijs = 0;

		echo '
		<div class="shopping_container">
		<h1>Shopping Cart</h1>
		';
	
		foreach ($_SESSION['cart'] as $cart_item) {

		$totaalprijs = number_format((float)$totaalprijs + $cart_item['subtotaal'], 2, '.', '');

// units, button-area, button2, right-bar, indication
		echo '
		<div class="project">
			<div class="flexboxje"
			<div class="shop">
				<div class="product_container">';
		echo    $cart_item['image'];
		echo 	'<div class="container_content">';
		echo    '<h3>' . $cart_item['smaak']. ' '.  $cart_item['categorie'] .'</h3>';
		echo    '<h4>' . $cart_item['subtotaal'] . '</h4>';
		echo    '<p class="units"> Quantity: '. $cart_item['quantity'] . '</p>';
		echo    '<p class="button-area">';
		echo 	'<form method="post" action="cart.php">
					<button type="submit" class="button2" name="remove_button">Remove</button>';
					if (isset($_POST["remove_button"])) {
						remove_from_cart($cart_item);
						exit();
					};
		echo 	'</form></p>';
		echo '	</div>
				</div>
				</div>
				</div>';
		}

		$totaalprijs_inc_shipping = number_format((float)$totaalprijs + 2.95, 2, '.', '');
		echo	'<div class="right-bar">
					<p><span class="indication">Subtotal: </span>
					<span>€' . $totaalprijs . '</span>
					</p>
					<p><span class="indication">Shipping: </span>
					<span>€2.95</span>
					</p>
					<hr>
					<p><span class="indication">Total: </span>
					<span>€' . number_format((float)$totaalprijs + 2.95, 2, '.', '') . '</span>
					</p>
					<div class="buttons">
					<form method="post">
								<button type="submit" name="remove_all">Clear Cart</button>
					</form>';
								if (isset($_POST["remove_all"])) {
									unset($_SESSION['cart']);
									echo '<script>switchPage("cart.php");</script>';
								}
						
							echo'
							<form method="post">
								<button type="submit" name="place_order">Place Order</button>';
								if (isset($_POST["place_order"])) {

									$beschrijving = '';

									foreach ($_SESSION['cart'] as $cart_item) {

										$beschrijving .= $cart_item['categorie'] . " " . $cart_item['smaak'] . " " . $cart_item['quantity'] . "x,  ";
										
										// de stock verlagen met de hoeveelheid die is gekozen
										$new_stock = $cart_item['current_stock'] - $cart_item['quantity'];
									
										lower_stock($conn, $new_stock, $cart_item['productID']);
									}

									add_order($conn, $_SESSION['userid'], $totaalprijs_inc_shipping, $beschrijving);
									unset($_SESSION['cart']);
									echo '<script>switchPage("my_orders.php");</script>';
								
									// info uit tabel products
									$stmt = $conn->prepare("SELECT fullname, usersID, email FROM users WHERE usersID = ?;");
									$stmt->bind_param("i", $_SESSION['userid']);
									$stmt->execute();
									$stmt->store_result();
									$stmt->bind_result($fullname, $userID, $email);
									$stmt->fetch();
								}
					
					echo 	'</form>
					</div>
					
				</div>

		</div>
		</div>';

	}
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Shop</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" crossorigin="anonymous">
        <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet'>
    </head>

	<?php

if(isset($_GET['id']) && isset($_GET['quantity'])) {
	add_to_cart($image, $productID, $smaak, $category_name, $quantity, $prijs, $subtotaal, $inStock);
	echo '<script>switchPage("cart.php");</script>';
}
display_cart($conn);

	?>
	<body>
	<div class="under_nav">
      <h1></h1>
    </div>

</body>
</html>