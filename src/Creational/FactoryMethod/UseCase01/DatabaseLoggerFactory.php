<?php

namespace App\Creational\FactoryMethod\UseCase01;

class DatabaseLoggerFactory extends LoggerFactory
{
    // Implementación del Factory Method
    protected function createLogger(): ILogger
    {
        return new DatabaseLogger();
    }
}