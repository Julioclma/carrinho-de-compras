<?php

namespace app\interfaces;

interface CartInterface
{
    public function add(int $product): void;

    public function remove(int $product): void;

    public function quantity(int $product, int $quantity): void;
    public function clear(): void;

    public function cart(): array;

    public function dump(): void;
}
