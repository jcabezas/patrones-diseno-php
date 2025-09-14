<?php

namespace App\Creational\FactoryMethod\UseCase01;

class FileLogger implements ILogger
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    public function log(string $mensaje): void
    {
        file_put_contents($this->filePath, date('Y-m-d H:i:s') . ' - ' . $mensaje . PHP_EOL, FILE_APPEND);
        echo "Log guardado en archivo: $mensaje\n";
    }
}