<?php
    include_once 'connection.php';
    include_once 'header.php';
?>


<?php
    if(isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE productID = $id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                $smaak = $row['smaak'];
                $foto = $row['image'];
                $prijs = $row['prijs'];
                
                $leverancier_id =  $row['leverancierID'];
                $leverancier_sql = "SELECT * FROM leveranciers WHERE leverancierID = $leverancier_id;";
                $leverancierResult = mysqli_query($conn, $leverancier_sql);
                $leverancier_resultCheck = mysqli_num_rows($leverancierResult);

                if ($leverancier_resultCheck > 0) {
                    while ($rij = mysqli_fetch_assoc($leverancierResult)) {
                        $leverancier_naam = $rij['leverancier'];
            
                    }
                }

            }
        }

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
    <section class="productcontainer">
      <div class="flex-box">
        <div class="left">
          <div class="big-img">
            <?php echo '<img src="fotos/products/'.$foto.'"style="width:100%">'; ?>
          </div>
        </div>
        <div class="right">
          <div class="url">Home > Products > Protein</div>
          <div class="pname"><?php echo $smaak;?></div>
          <div class="pdeliverer">
            <p>Made by <?php echo $leverancier_naam  ?></p>
          </div>
          <div class="pdescription">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
              blandit turpis cursus in hac habitasse platea dictumst. Imperdiet
              sed euismod nisi porta lorem mollis.
            </p>
          </div>
          <div class="price">€<?php echo $prijs ?></div>
          <div class="quantity">
            <p>Quantity:</p>
            <div class="qcontainer">
              <div class="radiogroup">
                <div class="radio-tile-group">
                  <input id="1" type="radio" name="radio" />
                  <div class="radio-tile">
                    <label for="1">1</label>
                  </div>
                </div>

                <div class="radio-tile-group">
                  <input id="2" type="radio" name="radio" />
                  <div class="radio-tile">
                    <label for="2">2</label>
                  </div>
                </div>

                <div class="radio-tile-group">
                  <input id="3" type="radio" name="radio" />
                  <div class="radio-tile">
                    <label for="3">3</label>
                  </div>
                </div>

                <div class="radio-tile-group">
                  <input id="4" type="radio" name="radio" />
                  <div class="radio-tile">
                    <label for="4">4</label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="btn-box">
            <button class="cart-btn">Add to Cart</button>
          </div>
        </div>
      </div>
    </section>


    
    <?php
    /*
    if(isset($_GET['id'])) {


#        $stmt = $conn->prepare("SELECT * FROM products WHERE productID = ?) VALUES (?)");
#        $stmt->bind_param("s", $id);


        $id = $_GET['id'];
        $sql = "SELECT * FROM products WHERE productID = $id;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
    
        if ($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

                echo    '<p>'.$row['smaak'].'</p>';
                


            }
        }

    }
    */
    ?>

    <!--   INJECTION CODE!

    $sql = "SELECT * FROM products WHERE productID = ?;";
    $stmt = mysqli_stmt_init($conn);
    
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: product.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $_GET['id']);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_Get_result($stmt);

    echo $resultData;
    return $result;

    mysqli_stmt_close($stmt);
    -->

  </body>
</html>
