<?php

namespace app\classes;

use app\classes\database\models\Read;
use app\interfaces\CartInterface;

class CartProducts
{
    public function products(CartInterface $cartInterface): array
    {

        $products = [];
        $total = 0;

        $productsInCart = $cartInterface->cart();

        // $productsInDatabase = require_once __DIR__ . '/../helpers/products.php';



        $productsInDatabase = (new Read)->all('products');



        foreach ($productsInCart as $productId => $quantity) {

            $product = [... array_filter($productsInDatabase, fn ($product) => (int)$product->id === $productId)];

            var_dump($product);
            //     $product = $productsInDatabase[$index];
            //   var_dump($productsInDatabase[$productId]) ;
            //   exit();  
              $products[] = [
                    'id' => $productId,
                    'product' => $product[0]->name,
                    'price' => $product[0]->price,
                    'quantity' => $quantity,
                    'subtotal' => $quantity * $product[0]->price
                ];

                $total += $quantity * $product[0]->price;
                //     if (isset($_SESSION['cart'][$index])){
                // $productsInCart[] = $product['name']
                //     }
        }

        return ['products' => $products, 'total' => $total];
    }
}
