<?php
    include_once 'connection.php';
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
            <?php
            if (isset($_SESSION["useruid"])) {
                
                // dit is voor het ophalen van de userID
                if($stmt = $conn -> prepare("SELECT usersID FROM users WHERE username = ?;")) {
                    $stmt->bind_param("s", $_SESSION["useruid"]);
                    $stmt->execute();
                    $stmt->store_result();
                    $stmt->bind_result($userID);
                    $stmt->fetch();
                }
            }
            $sql = "SELECT * FROM orders WHERE usersID = $userID;";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            ?>
        </head>
    <body>
    <div class="under_nav">
        <h1></h1>
    </div>
    <div class="shopping_container" id="my-orders">
        <h1>My orders</h1>
        <?php
            if ($resultCheck > 0) {
           echo'<div class="project-order">
                    <div class="orders">
                    <div class="flexboxje">
                        <div class="shop" id="orders">';
                            while ($row = mysqli_fetch_assoc($result)) {
                                    
                            // hier komt alles te staan van een rij, in recusrie door loop
                            // variabelen voor de huidige rij
                                    $orderID = $row['orderID'];
                                    $orderprijs = $row['orderprice'];
                                    $description = $row['beschrijving'];
                                    
                                echo'<div class="product_container" id="order-container">
                                        <div class="container_content">';
                                echo '<h3>Order ID: ' . $orderID . '</h3>
                                <h3>Total price: ' . $orderprijs . '</h3>
                                <h3>Order Description: ' . $description . '</h3>';
                                echo '</div>';
                                echo '</div>';
                                echo '</div>';
                            }
                    }
                    ?>
                        </div>
                    </div>
                </div>
    </div>
</body>


</html>
