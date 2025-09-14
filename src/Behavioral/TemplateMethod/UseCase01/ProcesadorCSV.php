<?php

namespace App\Behavioral\TemplateMethod\UseCase01;

class ProcesadorCSV extends ProcesadorDeDatos
{
    protected array $datos = [];

    protected function leer(): array
    {
        echo "Leyendo datos de un archivo CSV...\n";
        // Simulación
        return [
            ['id' => 1, 'nombre' => 'Ana'],
            ['id' => 2, 'nombre' => 'Juan'],
        ];
    }

    protected function procesarDatos(array $datos): array
    {
        echo "Procesando datos CSV (convirtiendo nombres a mayúsculas)...\n";
        foreach ($datos as &$fila) {
            $fila['nombre'] = strtoupper($fila['nombre']);
        }
        return $datos;
    }
}