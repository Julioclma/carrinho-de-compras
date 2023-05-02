<?php

session_start();


require_once __DIR__ . '/../vendor/autoload.php';

use app\classes\Cart;

$cart = new Cart;

$cart->clear();

header('Location: /cart.php');