<?php

namespace App\Behavioral\TemplateMethod\UseCase01;

class ProcesadorJSON extends ProcesadorDeDatos
{
    protected array $datos = [];

    protected function leer(): array
    {
         echo "Leyendo datos de un archivo JSON...\n";
        // Simulación
        return [
            ['usuario' => 'pedro', 'score' => 150],
            ['usuario' => 'maria', 'score' => 200],
        ];
    }

    protected function procesarDatos(array $datos): array
    {
        echo "Procesando datos JSON (incrementando el score)...\n";
        foreach ($datos as &$item) {
            $item['score'] += 10;
        }
        return $item;
    }
}