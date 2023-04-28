<?php

use app\classes\Cart;

session_start();

use app\classes\CartProducts;

require_once __DIR__ . '/../vendor/autoload.php';

$productsInCart = (new CartProducts(new Cart))->products();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h2>Cart | <a href="/">Home</a></h2>
    <hr>

    <section id="container">

    <?php foreach ($productsInCart['products'] as $index => $product) : ?>
        <?= $product['product'] ?>
        <hr>
        <?php endforeach ?>
    </section>
</body>

</html>