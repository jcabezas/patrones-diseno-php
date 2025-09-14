<?php

namespace App\Structural\Decorator\UseCase01;

class CafeSimple implements Cafe
{
    public function getCosto(): float
    {
        return 10.0;
    }

    public function getDescripcion(): string
    {
        return 'Café simple';
    }
}