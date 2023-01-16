<?php
    include_once 'includes/connection.php';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link rel="stylesheet" href="style.css">
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
                <img src="fitpointer_logo.jpg" class="logo">
                <ul>
                    <li><a href="#" class="item">Products</a></li>
                    <li><a href="#" class="item">Contact</a></li>
                    <li><a href="#" class = "item">About us</a></li>
                </ul>
                <div class="icontainer">
                    <img src="shopping_cart_icon.png" class="icons">
                    <img src="user_icon.png" class="icons">
                </div>
            </nav>
    </header>
    <div class="container">
        <div class="left-container">
            <article>
                <h1>Revolutionary protein for working out</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus feugiat et arcu in fermentum. 
                    Sed porta euismod nibh, vitae pretium sapien bibendum sit amet. Curabitur in accumsan tellus. 
                    Sed quis risus elit. Integer faucibus sed enim sit amet aliquet. Donec scelerisque vehicula imperdiet. 
                    Donec orci risus, sagittis nec lacus non, ornare laoreet lacus.</p>
                <button href="#">SHOP</button>
            </article>
        </div>
        <div class="right-container">
            <img src="placeholder.jpg" class="picture">
            <div class="mobile">
                <article>
                    <h1 class="mobile" id="text">Revolutionary protein for working out</h1>
                    <button href="#">SHOP</button> 
                </article>
            </div>
        </div>
    </div>
</body>

</html>