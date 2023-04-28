<?php

namespace app\classes;

use app\interfaces\CartInterface;

class CartProducts
{
    private CartInterface $cartInterface;

    public function __construct(CartInterface $cartInterface)
    {
        $this->cartInterface = $cartInterface;
    }

    public function products(): array
    {

        $products = [];

        $productsInCart = $this->cartInterface->cart();

        $productsInDatabase = require_once __DIR__ . '/../helpers/products.php';
        

        foreach ($productsInCart as $index => $quantity) {
            
            $product = $productsInDatabase[$index];

            $products[] = [
                'id' => $index,
                'product' => $product['name'],
                'price' => $product['price'],
                'quantity' => $quantity,
                'subtotal' => $quantity * $product['price']
            ];

            $total += $quantity * $product['price'];
            //     if (isset($_SESSION['cart'][$index])){
            // $productsInCart[] = $product['name']
            //     }
        }

        return ['products' => $products, 'total' => $total];
    }
}
