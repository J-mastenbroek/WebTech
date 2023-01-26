<?php
    include_once('connection.php');
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

<div class="products">
<?php

    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {

            $product_id = $row['productID'];
            $product_smaak = $row['smaak'];
            $product_categorie = $row['categorie'];
            $product_prijs = $row['prijs'];
            $product_image = $row['image'];
            $product_leverancier = $row['leverancierID'];

            echo"
                <a href="productpage.php?pro_id=$product_id">


                </a>
            "


        }
    }
?>
</div>
<script>
    function switchProduct(){
        window.location.href="productpage.php"
    }
</script>

</body>

</html>