<?php

namespace App\Creational\FactoryMethod\UseCase01;

abstract class LoggerFactory
{
    // Este es el "Factory Method". Las subclases deben implementarlo.
    abstract protected function createLogger(): ILogger;

    public function log(string $mensaje): void
    {
        $logger = $this->createLogger();
        $logger->log($mensaje);
    }
}