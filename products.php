<?php
    include_once('connection.php');
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
    <body>
        <header>
            <nav>
                <input type="checkbox" id="check">    
                <label for="check">
                    <i class="fas fa-bars" id="btn"></i>
                </label>
                <a href="index.html">
                    <img src="fotos/fitpointer_logo.jpg" class="logo" onclick="window.loaction.href='index.html';">
                </a>
                <ul>
                    <li><a href="products.php" class="item">Products</a></li>
                    <li><a href="contact.html" class="item">Contact</a></li>
                    <li><a href="about.html" class = "item">About us</a></li>
                </ul>
                <div class="icontainer">
                    <img src="fotos/shopping_cart_icon.png" class="icons">
                    <img src="fotos/user_icon.png" class="icons">
                </div>
            </nav>
    </header>
<?php
    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['smaak'] . "<br>";

        }
    }


?>

</body>

</html>