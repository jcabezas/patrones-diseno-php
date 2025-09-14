<?php

namespace App\Structural\Decorator\UseCase01;

abstract class CafeDecorator implements Cafe
{
    protected $cafe;

    public function __construct(Cafe $cafe)
    {
        $this->cafe = $cafe;
    }

    // Delega la llamada al objeto envuelto
    public function getCosto(): float
    {
        return $this->cafe->getCosto();
    }

    public function getDescripcion(): string
    {
        return $this->cafe->getDescripcion();
    }
}