<?php

namespace App\Creational\FactoryMethod\UseCase01;

class FileLoggerFactory extends LoggerFactory
{
    private $filePath;

    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    // Implementación del Factory Method
    protected function createLogger(): ILogger
    {
        return new FileLogger($this->filePath);
    }
}