<?php

namespace App\Creational\FactoryMethod\UseCase01;

class DatabaseLogger implements ILogger
{
    public function log(string $mensaje): void
    {
        // Lógica para guardar en una base de datos
        echo "Log guardado en base de datos: $mensaje\n";
    }
}