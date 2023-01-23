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
    <h1>Create an account</h1>
</div>
<section class="signup-form">
        <div class = signupform>
            <div class="singup-form-form">
                <form action="signup.inc.php" method="post">
                    <input type="text" name="name" placeholder="Full name">
                    <input type="text" name="email" placeholder="Email">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwdrepeat" placeholder="Repeat password">
                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
    </div>


    <?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "emptyinput") {
        echo "<p>Please fill in all fields.</p>";
    }
    elseif ($_GET["error"] == "invaliduid") {
        echo "<p>Please choose a proper username.</p>";
    }
    elseif ($_GET["error"] == "usernametoolong") {
        echo "<p>Username too long. Max 16 characters.</p>";
    }
    elseif ($_GET["error"] == "invalidemail") {
        echo "<p>Please choose a proper email.</p>";
    }
    elseif ($_GET["error"] == "passworddontmatch") {
        echo "<p>The passwords do not match</p>";
    }
    elseif ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong. Try again!</p>";
    }
    elseif ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken.</p>";
    }
    elseif ($_GET["error"] == "none") {
        echo "<p>You have signed up!.</p>";
    }
}

?>

</section>

<?php

if (isset($_GET["error"])) {
    if ($_GET["error"] == "") {
        echo "<p>Please fill in all fields.</p>";
    }
    elseif ($_GET["error"] == "invaliduid") {
        echo "<p>Please choose a proper username.</p>";
    }
    elseif ($_GET["error"] == "invalidemail") {
        echo "<p>Please choose a proper email.</p>";
    }
    elseif ($_GET["error"] == "passworddontmatch") {
        echo "<p>The passwords do not match</p>";
    }
    elseif ($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong. Try again!</p>";
    }
    elseif ($_GET["error"] == "usernametaken") {
        echo "<p>Username already taken.</p>";
    }
    elseif ($_GET["error"] == "none") {
        echo "<p>You have signed up!.</p>";
    }
}


?>


</body>

</html>
