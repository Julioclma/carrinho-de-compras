<?php

namespace app\interfaces;

interface CartInterface
{

    public function add($product): void;

    public function remove($product): void;

    public function quantity($product, $quantity): void;
    public function clear(): void;

    public function cart(): array;

    public function dump(): void;


}
