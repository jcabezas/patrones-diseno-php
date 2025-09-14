<?php

namespace App\Structural\Facade\UseCase01;

class ConvertidorVideoFacade
{
    protected $lector;
    protected $compresorAudio;
    protected $compresorVideo;
    protected $escritor;

    public function __construct()
    {
        // La fachada crea o recibe las instancias del subsistema
        $this->lector = new LectorVideo();
        $this->compresorAudio = new CompresorAudio();
        $this->compresorVideo = new CompresorVideo();
        $this->escritor = new EscritorArchivo();
    }

    /**
     * El método simplificado que oculta toda la complejidad.
     */
    public function convertir(string $archivoEntrada, string $archivoSalida, string $formato): bool
    {
        echo "--- Iniciando conversión con la Fachada ---\n";
        $videoBruto = $this->lector->leer($archivoEntrada);
        // (Imaginemos que aquí se extrae el audio del video)
        $audioComprimido = $this->compresorAudio->comprimir("audio_bruto");
        $videoComprimido = $this->compresorVideo->comprimir($videoBruto, $formato);
        // (Imaginemos que aquí se unen el audio y el video)
        $this->escritor->guardar($archivoSalida, "datos_finales");
        echo "--- Conversión completada ---\n";
        return true;
    }
}