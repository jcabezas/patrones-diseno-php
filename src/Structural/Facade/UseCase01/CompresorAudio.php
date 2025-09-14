<?php

namespace App\Structural\Facade\UseCase01;

class CompresorAudio
{
    public function comprimir(string $datosAudio): string
    {
        echo "Comprimiendo audio a formato MP3\n";
        return "audio_mp3";
    }
}