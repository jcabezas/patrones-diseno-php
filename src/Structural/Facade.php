<?php

/**
 * PATRÓN FACADE (Fachada)
 *
 * Propósito:
 * Proporciona una interfaz unificada y simplificada a un conjunto de interfaces
 * en un subsistema complejo. La fachada define una interfaz de alto nivel que
 * hace que el subsistema sea más fácil de usar.
 *
 * Componentes:
 * - Facade (Fachada): Sabe a qué clases del subsistema delegar las peticiones.
 * - Subsystem classes (Clases del Subsistema): Implementan la funcionalidad del subsistema.
 * No tienen conocimiento de la fachada.
 */

// Caso de Uso: Un sistema de conversión de video. Internamente, puede tener
// clases complejas para leer el archivo, extraer el audio, comprimir el video, etc.
// La fachada simplifica todo a una sola llamada: `convertir(...)`.

// --- 1. El Subsistema Complejo ---
class LectorVideo
{
    public function leer(string $archivo): string
    {
        echo "Leyendo archivo de video: $archivo\n";
        return "datos_video_brutos";
    }
}

class CompresorAudio
{
    public function comprimir(string $datosAudio): string
    {
        echo "Comprimiendo audio a formato MP3\n";
        return "audio_mp3";
    }
}

class CompresorVideo
{
    public function comprimir(string $datosVideo, string $formato): string
    {
        echo "Comprimiendo video a formato $formato\n";
        return "video_comprimido_$formato";
    }
}

class EscritorArchivo
{
    public function guardar(string $archivoSalida, $datos): void
    {
        echo "Guardando archivo final en: $archivoSalida\n";
    }
}

// --- 2. La Fachada (Facade) ---
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


// --- Ejemplo de Uso ---

// El cliente no necesita saber sobre LectorVideo, CompresorAudio, etc.
// Solo interactúa con la fachada.
$convertidor = new ConvertidorVideoFacade();
$convertidor->convertir('mi_video_vacaciones.mov', 'video_final.mp4', 'mp4');

?>
