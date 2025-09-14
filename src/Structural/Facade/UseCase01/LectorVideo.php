<?php

namespace App\Structural\Facade\UseCase01;

class LectorVideo
{
    public function leer(string $archivo): string
    {
        echo "Leyendo archivo de video: $archivo\n";
        return "datos_video_brutos";
    }
}