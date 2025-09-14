<?php

/**
 * PATRÓN SINGLETON
 *
 * Propósito:
 * Asegurar que una clase solo tenga una única instancia y proporcionar un punto de acceso global a ella.
 * Es útil para gestionar recursos compartidos, como una conexión a base de datos, un gestor de configuración
 * o un sistema de logging.
 *
 * Componentes:
 * - La clase Singleton: Declara un método estático `getInstance` que devuelve la única instancia de la clase.
 * - El constructor, el método de clonación y el de deserialización se declaran como privados o protegidos
 * para evitar la creación de nuevas instancias.
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Singleton\n";
echo "  Categoría: Creational (Creacional)\n\n";
echo "  Caso de Uso: Gestor de configuración de la aplicación. Solo queremos una instancia \n";
echo "  de la configuración para que todos los componentes accedan a los mismos valores.\n";
echo "========================================\n\n";

use App\Creational\Singleton\UseCase01\Configuracion;

echo "Inicio de la aplicación.\n";

// Obtenemos la instancia de configuración
$config1 = Configuracion::getInstance();
echo "API Key: " . $config1->get('api_key') . "\n";

// Modificamos un valor
$config1->set('api_key', 'NUEVA-API-KEY-456');

// Obtenemos la instancia de nuevo en otra parte del código
// Debería ser la misma instancia, por lo que no se vuelve a cargar la config
$config2 = Configuracion::getInstance();
echo "API Key (obtenida de nuevo): " . $config2->get('api_key') . "\n";

if ($config1 === $config2) {
    echo "config1 y config2 son la misma instancia.\n";
} else {
    echo "Error: se crearon instancias diferentes.\n";
}

// Intentar crear una nueva instancia con `new` causaría un error:
// $error = new Configuracion(); // Error: Call to private __construct()