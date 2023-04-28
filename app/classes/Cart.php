<?php

namespace app\classes;

use app\interfaces\CartInterface;

class Cart implements CartInterface
{

    public function add($product): void
    {
        if (!isset($_SESSION)) {
            $_SESSION['cart'] = [];
        }

        if (!isset($_SESSION['cart'][$product])) {  
            $_SESSION['cart'][$product] = 1;
            return;
        }

        if (isset($_SESSION['cart'][$product])) {
            $_SESSION['cart'][$product] += 1;
        }
    }

    public function remove($product): void
    {
        if (isset($_SESSION['cart'][$product])) {
            unset($_SESSION['cart'][$product]); 
        }
    }

    public function quantity($product, $quantity): void
    {

        if(isset($_SESSION['cart'][$product])){
            if ($quantity === 0 || $quantity === '') {
                $this->remove($product);
                return;
            } 
        }

        $_SESSION['cart'][$product] = $quantity;
    }
    public function clear(): void
    {
        if (isset($_SESSION['cart'])) {
            unset($_SESSION['cart']);
        }
    }

    public function cart(): array
    {
        if (isset($_SESSION['cart'])) {
            return $_SESSION['cart'];
        }
        return [];
    }

    public function dump(): void
    {
        if (isset($_SESSION['cart'])) {
            print_r($_SESSION['cart']);
        }
    }
}
