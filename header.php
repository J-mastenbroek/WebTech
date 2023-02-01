<?php
    session_start();

if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

?>

<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</head>
<body>
<header>
    <nav>
            <input type="checkbox" id="check">    
            <label for="check">
                <i class="fas fa-bars" id="btn"></i>
            </label>
            <a href="index.php">
                <img src="fotos/fitpointer_logo.jpg" class="logo">
            </a>
            <ul>
                <li><a href="products.php" class="item">Products</a></li>
                <li><a href="contact.php" class="item">Contact</a></li>
                <li><a href="about.php" class = "item">About us</a></li>
                <?php
                if (!isset($_SESSION["useruid"])) {
                    echo '<li><a href="login.php" class = "item">Log in</a></li>';
                }
                else {
                    echo '<li><a href="my_orders.php" class = "item">My Orders</a></li>';

                    // test voor admin
                    include_once 'connection.php';
                    $username = $_SESSION["useruid"];


                    
                    if ($_SESSION["role"] == 'admin') {

                        echo '<li><a href="all_stocks.php" class = "item">Manage Stock</a></li>';

                    }
                }
                ?>
            </ul>
            <div class="icontainer">
            <a href="cart.php" class="icon_button">
                <img src="fotos/shopping_cart_icon.png" class="icons">
            </a> 
            <?php
                if (isset($_SESSION["useruid"])) {
                    echo '<a id="profileicon" onclick="showDropDown()">';
                    echo '<img src="fotos/user_icon.png" class="icons">';
                    echo '</a>';
                }
            ?>
            </div>
    </nav>
    <ul class="slide">
        <li class="textloader"><p id="text">guest</p></li> 
        <li><button onmousedown="window.location.href='logout.inc.php';">Log out</button></li>
    </ul>
</header>

<div class="cookies-eu-banner">
    Fitpointer uses cookies to enhance user experience. By clicking 'Accept' you agree to storing cookies on your device. For more information: <a href="cookies_policy.php">our cookies policy.</a>
  <button id="acceptCookies" onclick="setCookie()">Accept</button>
</div>

<style>
.cookies-eu-banner {
  visibility: hidden;
  background: #444;
  color: #fff;
  padding: 6px;
  font-size: 16px;
  text-align: center;
  position: fixed;
  bottom: 0;
  width: 100%;
  z-index: 10;
}

.cookies-eu-banner button {
  text-decoration: none;
  background: #222;
  color: #fff;
  border: none;
  cursor: pointer;
  padding: 4px 7px;
  margin: 2px 0;
  font-size: 13px;
  font-weight: 700;
  transition: background 0.07s, color 0.07s, border-color 0.07s;
  height: 50%;
  width: auto;
}

.cookies-eu-banner button:hover {
  background: #fff;
  color: #222;
}

.cookies-eu-banner a{
  padding: 6px;
  font-size: 16px;
  color: blue;

}
</style>

<script type='text/javascript'>
    //drop down menu for usericon
    let dropactive = false; 
    let slide = document.getElementsByClassName("slide");
        
    //function to show dropdown
    function showDropDown(){
        if (dropactive == false){
            slide[0].style.visibility = "visible";
            dropactive = true;
        }
        else{
            slide[0].style.visibility = "hidden";
            dropactive = false;
        }
    }

    //Change name on dropdown menu
    function changeText(name){
        document.getElementById("text").innerHTML = name;
    }

    <?php
        if (isset($_SESSION["useruid"])) {
            $current_name = $_SESSION["useruid"];
            echo json_encode($current_name);
        }
    ?>

    const username = '<?php if (isset($_SESSION["useruid"])) {$current_name = $_SESSION["useruid"]; echo json_encode($current_name);}?>';
    changeText(username);
    
    //show cookie banner
    function showCookies(){
        const cookieBanner = document.getElementsByClassName("cookies-eu-banner");
        cookieBanner[0].style.visibility = "visible";
    }

    //jquery + ajax cookies.php set cookie
    function setCookie() {
        $.ajax({
            type: "POST",
            url: "./cookies.php"
        }).done(function( msg ) {
            console.log("Cookie set: " + msg );
        });

        const cookieBanner = document.getElementsByClassName("cookies-eu-banner");
        cookieBanner[0].style.visibility = "hidden";
    }
    
</script>

    <?php if (!isset($_COOKIE["cookiescontrol"])) {
         echo '<script> showCookies();</script>';
    }
    ?>

    <?php if (isset($_COOKIE["cookiescontrol"])) {
         echo '<script> console.log("cookies initialized")</script>';
    }
    ?>

</body>
</html>