<?php

/**
 * PATRÓN ABSTRACT FACTORY (Fábrica Abstracta)
 *
 * Propósito:
 * Proporciona una interfaz para crear familias de objetos relacionados o dependientes
 * sin especificar sus clases concretas. Es una "fábrica de fábricas".
 *
 * Componentes:
 * - AbstractFactory: Interfaz para crear los productos abstractos.
 * - ConcreteFactory: Implementación de la AbstractFactory. Crea una familia de productos concretos.
 * - AbstractProduct: Interfaz para un tipo de producto.
 * - ConcreteProduct: Implementación de un producto concreto, creado por una ConcreteFactory.
 * - Client: Utiliza solo las interfaces de AbstractFactory y AbstractProduct.
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Abstract Factory (Fábrica Abstracta)\n";
echo "  Categoría: Creational (Creacional)\n\n";
echo "  Caso de Uso: Crear una interfaz de usuario (UI) que puede tener diferentes temas (por ejemplo, Light y Dark).\n";
echo "  Cada tema tiene sus propios componentes (botones, checkboxes) que deben ser consistentes.\n";
echo "  La Abstract Factory se asegurará de que si elegimos el tema \"Dark\", todos los componentes creados sean oscuros.\n";
echo "========================================\n\n";

use App\Creational\AbstractFactory\UseCase01\LightThemeFactory;
use App\Creational\AbstractFactory\UseCase01\DarkThemeFactory;
use App\Creational\AbstractFactory\UseCase01\Application;

// Decidimos qué tema usar en tiempo de ejecución
$theme = 'Dark'; // Puede venir de una configuración o preferencia del usuario
$factory = null;

if ($theme === 'Light') {
    $factory = new LightThemeFactory();
} else {
    $factory = new DarkThemeFactory();
}

$app = new Application($factory);
$app->createUI();
$app->renderUI();