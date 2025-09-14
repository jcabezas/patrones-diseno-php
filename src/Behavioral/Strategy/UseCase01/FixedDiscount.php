<?php

namespace App\Behavioral\Strategy\UseCase01;

class FixedDiscount implements IDiscountStrategy
{
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function applyDiscount(float $total): float
    {
        echo "Aplicando descuento fijo de: -$" . number_format($this->amount, 2) . "\n";
        return max(0, $total - $this->amount); // El total no puede ser negativo
    }
}