<?php

use app\classes\Cart;

session_start();

use app\classes\CartProducts;

require_once __DIR__ . '/../vendor/autoload.php';

$productsInCart = (new CartProducts())->products(new Cart);

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

        <?php if (count($productsInCart['products']) === 0) : ?>
            <p>Nenhum produto encontrado no carrinho!</p>
        <?php else : ?>
            <?php foreach ($productsInCart['products'] as $index => $product) : ?>
                <?= $product['product'] ?>
                <form action="quantidade.php" method="get">
                    <input type="text" name="qtd" value="<?= $product['quantity'] ?>" id="cart-input-quantity">
                    <input type="hidden" name="id" value="<?= $product['id'] ?>">
                </form> x <?= number_format($product['price'],2 ,',', '.') ?> = <?= number_format($product['subtotal'],2 ,',', '.') ?> 
| <a href="remove.php?id=<?= $product['id']?>" id="cart-remove">remove</a>    
                <hr>
            <?php endforeach ?>

            <div id="cart-total-clear">
                <span id="cart-total">Total: R$ <?= $productsInCart['total'] ?></span> 
                <span id="cart-clear"><a href="clear.php">Clear Cart</a></span>
            </div>        
        <?php endif ?>
    </section>
</body>

</html>