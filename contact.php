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
        <div class="under_nav">
            <h1 id="form_h1"></h1>
        </div>
        <div class="bg">
            <form>
                <div class="form_row">
                    <div class="input-group">
                        <input type="text" id="name" required>
                        <label for="name">Your Name</label>
                    </div>
                    <div class="input-group">
                        <input type="text" id="number" required>
                        <label for="number">Phone No.</label>
                    </div>
                </div>
                <div class="input-group">
                    <input type="email" id="email" required>
                    <label for="email">Your Email</label>
                </div>
                <div class="input-group">
                    <textarea id="message" rows="8" required></textarea>
                    <label for="message">Your Message</label>
                </div>
                <button type="submit" id="contact_button">Submit</button>
            </form>
        </div>
    </body>
</html>