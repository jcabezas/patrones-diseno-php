<?php

namespace App\Behavioral\Strategy\UseCase01;

class Order
{
    private $total;
    private $discountStrategy;

    public function __construct(float $total)
    {
        $this->total = $total;
        // Por defecto, no hay descuento
        $this->discountStrategy = new NoDiscount();
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    // Permite cambiar la estrategia en tiempo de ejecución
    public function setDiscountStrategy(IDiscountStrategy $strategy): void
    {
        $this->discountStrategy = $strategy;
    }

    public function calculateFinalPrice(): float
    {
        echo "Total del pedido: $" . number_format($this->total, 2) . "\n";
        return $this->discountStrategy->applyDiscount($this->total);
    }
}