<?php

session_start();

print_r($_SESSION['cart']);

use app\classes\Cart;

require_once __DIR__ . '/../vendor/autoload.php';

$products = require_once __DIR__ . '/../app/helpers/products.php';

$productsInCart = count((new Cart)->cart());

// (new Cart)->clear();     

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
</head>
<style>
    #lista {
        margin: 25px 0;
    }
</style>

<body>
    <section id="container">
        <div>Cart: <?= $productsInCart ?> | <a href="cart.php">Go to Cart</a></div>
        <ul>
            <?php foreach ($products as $index => $product) : ?>
                <div id="lista">
                    <li><?= $product['name'] ?> | <?= number_format($product['price'], 2, ',', '.') ?></li>
                    <a href="add.php?id=<?= $index ?>">add to cart </a>
                </div>
            <?php endforeach ?>
        </ul>
    </section>

</body>

</html>