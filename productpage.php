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
            <p>Made by <?php echo $leverancierNaam ; ?></p>
          </div>
          <div class="pdescription">
              <?php echo $description; ?>
          </div>
          <div class="price">€<?php echo $prijs ;?> <br>
            <?php if ($inStock > 0){  echo $inStock . ' In Stock'; }
                  else { echo 'Out Of Stock'; } ?>
          </div>
          <div class="quantity">
            <p>Quantity:</p>
            <div class="qcontainer">
              <div class="radiogroup">
          
          <?php if ($inStock >= 1) {
            echo '    
                <div class="radio-tile-group">
                  <input id="1" type="radio" name="radio" value="1"/>
                  <div class="radio-tile">
                    <label for="1">1</label>
                  </div>
                </div>
                '; } ?>

          <?php if ($inStock >= 2) {
            echo '
                <div class="radio-tile-group">
                  <input id="2" type="radio" name="radio" value="2"/>
                  <div class="radio-tile">
                    <label for="2">2</label>
                  </div>
                </div>
                '; } ?>

          <?php if ($inStock >= 3) {
            echo '
                <div class="radio-tile-group">
                  <input id="3" type="radio" name="radio" value="3"/>
                  <div class="radio-tile">
                    <label for="3">3</label>
                  </div>
                </div>
                '; } ?>
          
          <?php if ($inStock >= 4) {
            echo '
                <div class="radio-tile-group">
                  <input id="4" type="radio" name="radio" value="4"/>
                  <div class="radio-tile">
                    <label for="4">4</label>
                  </div>
                </div>
                '; } ?>

              </div>
            </div>
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
          <div class="quantity">
            <p>Quantity:</p>
            <div class="qcontainer">
              <div class="radiogroup">
          
          <?php if ($inStock >= 1) {
            echo '    
                <div class="radio-tile-group">
                  <input id="1" type="radio" name="radio" value="1"/>
                  <div class="radio-tile">
                    <label for="1">1</label>
                  </div>
                </div>
                '; } ?>

          <?php if ($inStock >= 2) {
            echo '
                <div class="radio-tile-group">
                  <input id="2" type="radio" name="radio" value="2"/>
                  <div class="radio-tile">
                    <label for="2">2</label>
                  </div>
                </div>
                '; } ?>

          <?php if ($inStock >= 3) {
            echo '
                <div class="radio-tile-group">
                  <input id="3" type="radio" name="radio" value="3"/>
                  <div class="radio-tile">
                    <label for="3">3</label>
                  </div>
                </div>
                '; } ?>
          
          <?php if ($inStock >= 4) {
            echo '
                <div class="radio-tile-group">
                  <input id="4" type="radio" name="radio" value="4"/>
                  <div class="radio-tile">
                    <label for="4">4</label>
                  </div>
                </div>
                '; } ?>

              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="cart-btn" name="add" onclick="handleAmount()">Add to Cart</button>
          </div>
        </div>
      </div>
    </section>

    <script>
      //checks the amount selected from radiobuttons when add to cart is clicked
      function handleAmount() {
        let productid = <?php echo json_encode($id); ?>;

        const radioButtons = document.querySelectorAll('input[name="radio"]');
        let selectedAmount = 0;

        for (const rb of radioButtons) {
          if (rb.checked) {
            selectedAmount = rb.value;
            break;
          }
        }
        if (selectedAmount > 0) {

            
          <?php if (isset($_SESSION["useruid"])) {
            ?> window.location.href=("cart.php?id=" + productid + "&quantity=" + selectedAmount);                
          <?php } 
            else {
           ?> window.location.href=("login.php"); <?php }?>


          }
        }





    </script>
  </body>
</html>


