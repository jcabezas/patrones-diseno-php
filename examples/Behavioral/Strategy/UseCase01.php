<?php

/**
 * PATRÓN STRATEGY (Estrategia)
 *
 * Propósito:
 * Permite definir una familia de algoritmos, encapsular cada uno de ellos y hacerlos intercambiables.
 * El patrón Strategy permite que el algoritmo varíe independientemente de los clientes que lo utilizan.
 *
 * Componentes:
 * - Contexto: Mantiene una referencia a un objeto Strategy y puede cambiarlo en tiempo de ejecución.
 * - Strategy: Interfaz común para todas las estrategias concretas.
 * - ConcreteStrategy: Implementaciones específicas de la interfaz Strategy.
 *
 * El patrón Strategy permite que el algoritmo varíe independientemente de los clientes que lo utilizan.
 *
 * Componentes:
 * - Contexto: Mantiene una referencia a un objeto Strategy y puede cambiarlo en tiempo de ejecución.
 * - Strategy: Interfaz común para todas las estrategias concretas.
 * - ConcreteStrategy: Implementaciones específicas de la interfaz Strategy.
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Strategy (Estrategia)\n";
echo "  Categoría: Behavioral (Comportamiento)\n\n";
echo "  Caso de Uso: Un sistema de E-commerce que necesita aplicar diferentes tipos de\n";
echo "  descuentos a un pedido (ej: descuento por porcentaje, descuento fijo, sin descuento).\n";
echo "  La estrategia de descuento puede cambiar en tiempo de ejecución.\n";
echo "========================================\n\n";

use App\Behavioral\Strategy\UseCase01\Order;
use App\Behavioral\Strategy\UseCase01\PercentageDiscount;
use App\Behavioral\Strategy\UseCase01\FixedDiscount;


// Creamos un pedido
$pedido = new Order(200.0);

// Calculamos el precio final sin ninguna estrategia de descuento
echo "--- Caso 1: Sin Descuento ---\n";
$precioFinal = $pedido->calculateFinalPrice();
echo "Precio final a pagar: $" . number_format($precioFinal, 2) . "\n";

// Ahora aplicamos una estrategia de descuento por porcentaje (ej: cupón del 15%)
echo "\n--- Caso 2: Descuento por Porcentaje (15%) ---\n";
$pedido->setDiscountStrategy(new PercentageDiscount(15));
$precioFinal = $pedido->calculateFinalPrice();
echo "Precio final a pagar: $" . number_format($precioFinal, 2) . "\n";

// Cambiamos a una estrategia de descuento fijo (ej: tarjeta de regalo de $50)
echo "\n--- Caso 3: Descuento Fijo ($50) ---\n";
$pedido->setDiscountStrategy(new FixedDiscount(50));
$precioFinal = $pedido->calculateFinalPrice();
echo "Precio final a pagar: $" . number_format($precioFinal, 2) . "\n";
