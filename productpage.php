<?php
    include_once 'header.php';
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
            <img src="fotos/placeholder.jpg" />
          </div>
        </div>
        <div class="right">
          <div class="url">Home > Products > Protein</div>
          <div class="pname">Protein for gym</div>
          <div class="pdeliverer">
            <p>Made by Fitpointer.</p>
          </div>
          <div class="pdescription">
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
              eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis
              blandit turpis cursus in hac habitasse platea dictumst. Imperdiet
              sed euismod nisi porta lorem mollis.
            </p>
          </div>
          <div class="price">999 euro</div>
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
  </body>
</html>
