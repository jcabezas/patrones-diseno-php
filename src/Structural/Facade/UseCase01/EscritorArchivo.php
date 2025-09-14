<?php

namespace App\Structural\Facade\UseCase01;

class EscritorArchivo
{
    public function guardar(string $archivoSalida, $datos): void
    {
        echo "Guardando archivo final en: $archivoSalida\n";
    }
}