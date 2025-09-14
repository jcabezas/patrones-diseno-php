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

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Facade (Fachada)\n";
echo "  Categoría: Structural (Estructural)\n\n";
echo "  Caso de Uso: Conversión de video con diferentes formatos y compresión de audio. La fachada simplifica todo a una sola llamada.\n";
echo "========================================\n\n";

use App\Structural\Facade\UseCase01\ConvertidorVideoFacade;

// El cliente no necesita saber sobre LectorVideo, CompresorAudio, etc.
// Solo interactúa con la fachada.
$convertidor = new ConvertidorVideoFacade();
$convertidor->convertir('mi_video_vacaciones.mov', 'video_final.mp4', 'mp4');
