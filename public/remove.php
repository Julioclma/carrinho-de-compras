
<?php

session_start();


require_once __DIR__ . '/../vendor/autoload.php';

use app\classes\Cart;

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$cart = new Cart;

$cart->remove($id);

header('Location: /');