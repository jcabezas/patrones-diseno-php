<?php

namespace App\Structural\Decorator\UseCase01;

class ConChocolate extends CafeDecorator
{
    public function getCosto(): float
    {
        return parent::getCosto() + 3.0;
    }

    public function getDescripcion(): string
    {
        return parent::getDescripcion() . ', con chocolate';
    }
}