<?php

namespace App\Creational\FactoryMethod\UseCase01;

interface ILogger
{
    public function log(string $mensaje): void;
}