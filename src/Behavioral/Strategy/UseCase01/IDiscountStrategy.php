<?php

namespace App\Behavioral\Strategy\UseCase01;

interface IDiscountStrategy
{
    public function applyDiscount(float $total): float;
}