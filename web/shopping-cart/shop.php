<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>Shop | Shopping Cart | CTE341</title>

    <link rel="stylesheet" href="css/shop.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&Oswald&display=swap" rel="stylesheet">

</head>

<body>
<main>
<section class="container content-section">
<div id="cart_button" ><a href="https://murmuring-coast-84451.herokuapp.com/shopping-cart/cart.php">
  <img src="images/products/cart-icon-823x669.png">
  <input type="button" id="total_items" value=""></a>
</div>

<div id="mycart">
</div>
            <h2 class="section-header">Our Products</h2>
            <div class="product-display">
                <div class="product">
                    <span class="product-title">Bomb</span>
                    <img class="product-image" src="images/products/bomb.png">
                    <div class="product-details">
                        <span class="product-price">$199.99</span>
                        <button class="btn btn-primary product-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="product">
                    <span class="product-title">Trap</span>
                    <img class="product-image" src="images/products/trap.jpg">
                    <div class="product-details">
                        <span class="product-price">$24.99</span>
                        <button class="btn btn-primary product-button"type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="product">
                    <span class="product-title">TnT</span>
                    <img class="product-image" src="images/products/tnt.png">
                    <div class="product-details">
                        <span class="product-price">$49.99</span>
                        <button class="btn btn-primary product-button" type="button">ADD TO CART</button>
                    </div>
                </div>
                <div class="product">
                    <span class="product-title">Anvil</span>
                    <img class="product-image" src="images/products/anvil.png">
                    <div class="product-details">
                        <span class="product-price">$19.99</span>
                        <button class="btn btn-primary product-button" type="button">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </section>
       
</main>
<script type="text/javascript" src="js/shopping-cart.js"></script>

</body>
</html>