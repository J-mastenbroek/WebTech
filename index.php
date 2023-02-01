<?php

    include_once 'header.php';
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
    <div class="container">
        <div class="left-container">
            <article>
                <h1>Revolutionary protein for working out</h1>
                <p>Welcome to <span>FITPOINTER.</span> This is the place to order your delicious Whey protein, pre-workout and other supplements.
                All of our products are <span>100% eco-friendly</span> and shipped within <span>2 business days</span>.
                We are here to support you on the way to becomming the best version of yourself!</p>
                <button onclick="window.location.href='products.php';" id="shop_button">SHOP NOW</button>
            </article>
        </div>
        <div class="right-container">
            <img src="fotos/creatine_scoop.jpg" class="picture">
            <div class="mobile_display">
                <article>
                    <h1 class="mobile_display" id="text">Revolutionary protein for working out</h1>
                    <button onclick="window.location.href='products.php';">SHOP NOW</button>
                </article>
            </div>
        </div>
    </div>
</body >

</html>