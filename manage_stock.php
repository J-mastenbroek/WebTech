<?php
    include_once 'connection.php';
    include_once 'header.php';
?>


<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        // Info uit tabel products
        $stmt = $conn->prepare("SELECT smaak, categoryID, prijs, image, leverancierID, description, in_stock
                               FROM products WHERE productID = ?;");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($smaak, $categoryID, $prijs, $image, $leverancierID, $description, $inStock);

        $stmt->fetch();

        // info uit tabel leveranciers
        $stmt = $conn->prepare("SELECT leverancier FROM leveranciers WHERE leverancierID = ?;");
        $stmt->bind_param("i", $leverancierID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($leverancierNaam);

        $stmt->fetch();

        // info uit tabel categories
        $stmt = $conn->prepare("SELECT category_name, category_weight FROM categories WHERE categoryID = ?;");
        $stmt->bind_param("i", $categoryID);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($category_name, $category_weight);

        $stmt->fetch();

    }

?>



<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shop</title>
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      crossorigin="anonymous"
    />
    <link
      href="https://fonts.googleapis.com/css?family=Oswald"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="under_nav">
      <h1></h1>
    </div>
    <section class="productcontainer">
      <div class="flex-box">
        <div class="left">
          <div class="big-img">
            <?php echo '<img src="fotos/products/'.$image.'"style="width:100%">'; ?>
          </div>
        <div class="mobile_display" id="scrolldown"> 
          <div class="pname"><?php echo $smaak . " " . $category_name;?></div>
          <div class="pdeliverer">
            <p>Made by <?php echo "hallo" ; ?></p>
          </div>
          <div class="pdescription">
              <?php echo $description; ?>
          </div>
          <div class="price">€<?php echo $prijs ;?> <br>
            <?php if ($inStock > 0){  echo $inStock . ' In Stock'; }
                  else { echo 'Out Of Stock'; } ?>
          </div>
          <div class="quantity">
          </div>
          <div class="btn-box">
            <button class="cart-btn" name="add" onclick="handleAmount()">Add to Cart</button>
          </div>
        </div>
        </div>


        <div class="right">
          <div class="pname"><?php echo $smaak . " " . $category_name;?></div>
          <div class="pdeliverer">
            <p>Made by <?php echo $leverancierNaam ; ?></p>
          </div>
          <div class="pdescription">
              <?php echo $description; ?>
          </div>
          <div class="price">€<?php echo $prijs ?> <br>
            <?php if ($inStock > 0){  echo $inStock . ' In Stock'; }
                  else { echo 'Out Of Stock'; } ?>
            </div>

            <?php
            echo  '
                    <form method="post">
                        <p> Change Stock To: </p>
                        <input type="number" name="stockswitch">
                        <button type="submit" name="Submit">Change Stock</button>
                    </form>    
                    </div>'; 
            ?>

            <?php
            if (isset($_POST["Submit"])) {
    
                $newstock = $_POST["stockswitch"];
                if ($newstock > 0) {
                    $sql1 = "UPDATE `products` SET `in_stock`=$newstock WHERE productID=$id;";
                    $result1 = mysqli_query($conn, $sql1);
                }
                else {
                    $sql1 = "UPDATE `products` SET `in_stock`=0 WHERE productID=$id;";
                    $result1 = mysqli_query($conn, $sql1);
                }

    
            } ?>

        </div>
      </div>
    </section>

    </script>
  </body>
</html>


