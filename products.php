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
<div class=productcontainer>
    <div class="products">
<?php

    $sql = "SELECT * FROM products;";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);

    if ($resultCheck > 0) {
        while ($row = mysqli_fetch_assoc($result)) {


            echo '<div class="card">';
            echo    '<img src="fotos/products/'.$row['image'].'"style="width:100%">';
            echo    '<h1>'.$row['categorie'].'</h1>';
            echo    '<p>'.$row['smaak'].'</p>';
            echo    '<p class="price">€'.$row['prijs'].'</p>';
            echo    '<button onclick="switchProduct('.$row["productID"].');">View Product</button>';

           
        }
    }
?>
    </div>
</div>
<script>
    function switchProduct(id){
        window.location.href=`productpage2_test.php?id=${id}`
    }
</script>

</body>

</html>