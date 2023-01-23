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


<div class="title">
     <h1>Log in</h1>
</div>
<section class="signup-form">
    <div class="loginpage">
        <div class="singup-form-form">      
            <form action="login.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username/Email...">
                <input type="password" name="pwd" placeholder="Password...">
                <button type="submit" name="submit">Log In</button>
            </form>
        </div>
    </div>
<div class="registerwarning">
    <p>Don't have an account? Click <a href="signup.php"><span>here</span></a> to register!</p>
</div>
    <?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields.</p>";
    }
    elseif ($_GET["error"] == "wronglogin") {
        echo "<p>Incorrect login information.</p>";
}
}

?>


</section>

</body>

</html>
