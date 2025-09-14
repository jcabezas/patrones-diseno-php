<?php

namespace App\Structural\Facade\UseCase01;

class CompresorVideo
{
    public function comprimir(string $datosVideo, string $formato): string
    {
        echo "Comprimiendo video a formato $formato\n";
        return "video_comprimido_$formato";
    }
}