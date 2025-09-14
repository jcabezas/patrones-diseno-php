<?php

namespace App\Behavioral\Strategy\UseCase01;

class PercentageDiscount implements IDiscountStrategy
{
    private $percentage;

    public function __construct(float $percentage)
    {
        $this->percentage = $percentage;
    }

    public function applyDiscount(float $total): float
    {
        $discountAmount = $total * ($this->percentage / 100);
        echo "Aplicando descuento del {$this->percentage}%: -$" . number_format($discountAmount, 2) . "\n";
        return $total - $discountAmount;
    }
}