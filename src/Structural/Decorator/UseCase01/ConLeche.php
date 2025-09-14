<?php

namespace App\Structural\Decorator\UseCase01;

class ConLeche extends CafeDecorator
{
    public function getCosto(): float
    {
        // Añade el costo del extra al costo del café envuelto
        return parent::getCosto() + 2.5;
    }

    public function getDescripcion(): string
    {
        // Añade la descripción del extra
        return parent::getDescripcion() . ', con leche';
    }
}