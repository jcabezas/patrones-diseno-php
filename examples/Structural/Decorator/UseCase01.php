<?php

namespace App\Structural;

/**
 * PATRÓN DECORATOR (Decorador)
 *
 * Propósito:
 * Permite añadir funcionalidades o responsabilidades a un objeto de forma dinámica,
 * sin necesidad de modificar su clase. Los decoradores envuelven al objeto original.
 * Es una alternativa flexible a la herencia para extender la funcionalidad.
 *
 * Componentes:
 * - Component: La interfaz común tanto para los objetos a decorar como para los decoradores.
 * - ConcreteComponent: La clase del objeto original al que se le quieren añadir funcionalidades.
 * - Decorator: Clase abstracta que implementa la interfaz Component y tiene una referencia
 * a un objeto Component. Delega las operaciones a este objeto.
 * - ConcreteDecorator: Clases que extienden Decorator y añaden su propia funcionalidad
 * antes o después de delegar la llamada al objeto envuelto.
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Decorator (Decorador)\n";
echo "  Categoría: Structural (Estructural)\n\n";
echo "  Caso de Uso: Preparar un café con diferentes ingredientes como leche, azúcar, chocolate, etc. Cada extra tiene un costo y modifica la descripción.\n";
echo "========================================\n\n";

use App\Structural\Decorator\UseCase01\CafeSimple;
use App\Structural\Decorator\UseCase01\ConLeche;
use App\Structural\Decorator\UseCase01\ConAzucar;
use App\Structural\Decorator\UseCase01\ConChocolate;

// Creamos un café simple
$miCafe = new CafeSimple();
echo "Pedido: " . $miCafe->getDescripcion() . " - Costo: $" . $miCafe->getCosto() . "\n";

// Ahora lo decoramos dinámicamente
// 1. Añadimos leche
$miCafe = new ConLeche($miCafe);
echo "Pedido: " . $miCafe->getDescripcion() . " - Costo: $" . $miCafe->getCosto() . "\n";

// 2. Añadimos azúcar
$miCafe = new ConAzucar($miCafe);
echo "Pedido: " . $miCafe->getDescripcion() . " - Costo: $" . $miCafe->getCosto() . "\n";

// 3. Y también chocolate
$miCafe = new ConChocolate($miCafe);
echo "Pedido: " . $miCafe->getDescripcion() . " - Costo: $" . $miCafe->getCosto() . "\n";

echo "\n--- Otro pedido diferente ---\n";
// Un café simple solo con chocolate
$otroCafe = new ConChocolate(new CafeSimple());
echo "Pedido: " . $otroCafe->getDescripcion() . " - Costo: $" . $otroCafe->getCosto() . "\n";
