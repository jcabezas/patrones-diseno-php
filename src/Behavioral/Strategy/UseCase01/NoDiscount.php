<?php

namespace App\Behavioral\Strategy\UseCase01;

class NoDiscount implements IDiscountStrategy
{
    public function applyDiscount(float $total): float
    {
        echo "No se aplica ningún descuento.\n";
        return $total;
    }
}