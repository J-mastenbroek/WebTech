<?php
    session_start();
?>
<html>
<head>
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
                ?>
            </ul>
            <div class="icontainer">
            <img src="fotos/shopping_cart_icon.png" class="icons">
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
        <li class="textloader"><p id="text">Jesse</p></li> 
        <li><button onmousedown="window.location.href='logout.inc.php';">Log out</button></li>
    </ul>

    <script>
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

        // Change name on dropdown menu
        function changeText(name){
            document.getElementById("text").innerHTML = name;
        }

        <?php
        if (isset($_SESSION["useruid"])) {
            $current_name = $_SESSION["useruid"];
        }
        ?>

        let x = "<?php echo"$current_name"?>";
        changeText(x);
     </script>
</header>
</body>
</html>