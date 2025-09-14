<?php

namespace App\Structural\Decorator\UseCase01;

class ConAzucar extends CafeDecorator
{
    public function getCosto(): float
    {
        return parent::getCosto() + 0.5;
    }

    public function getDescripcion(): string
    {
        return parent::getDescripcion() . ', con azúcar';
    }
}