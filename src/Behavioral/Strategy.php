<?php

namespace App\Behavioral;

/**
 * PATRÓN STRATEGY (Estrategia)
 *
 * Propósito:
 * Define una familia de algoritmos, encapsula cada uno de ellos y los hace intercambiables.
 * Permite que el algoritmo varíe independientemente de los clientes que lo utilizan.
 *
 * Componentes:
 * - Context (Contexto): Mantiene una referencia a un objeto Strategy. Delega la ejecución
 * del algoritmo a su estrategia.
 * - Strategy (Estrategia): Interfaz común para todos los algoritmos soportados.
 * - ConcreteStrategy (Estrategia Concreta): Implementa un algoritmo específico usando la
 * interfaz Strategy.
 */

// Caso de Uso: Un sistema de E-commerce que necesita aplicar diferentes tipos de
// descuentos a un pedido (ej: descuento por porcentaje, descuento fijo, sin descuento).
// La estrategia de descuento puede cambiar en tiempo de ejecución.

// --- 1. Interfaz de la Estrategia (Strategy) ---
interface IDiscountStrategy
{
    public function applyDiscount(float $total): float;
}

// --- 2. Estrategias Concretas (ConcreteStrategy) ---
class PercentageDiscount implements IDiscountStrategy
{
    private $percentage;

    public function __construct(float $percentage)
    {
        $this->percentage = $percentage;
    }

    public function applyDiscount(float $total): float
    {
        $discountAmount = $total * ($this->percentage / 100);
        echo "Aplicando descuento del {$this->percentage}%: -$" . number_format($discountAmount, 2) . "\n";
        return $total - $discountAmount;
    }
}

class FixedDiscount implements IDiscountStrategy
{
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function applyDiscount(float $total): float
    {
        echo "Aplicando descuento fijo de: -$" . number_format($this->amount, 2) . "\n";
        return max(0, $total - $this->amount); // El total no puede ser negativo
    }
}

class NoDiscount implements IDiscountStrategy
{
    public function applyDiscount(float $total): float
    {
        echo "No se aplica ningún descuento.\n";
        return $total;
    }
}

// --- 3. El Contexto (Context) ---
class Order
{
    private $total;
    private $discountStrategy;

    public function __construct(float $total)
    {
        $this->total = $total;
        // Por defecto, no hay descuento
        $this->discountStrategy = new NoDiscount();
    }

    public function getTotal(): float
    {
        return $this->total;
    }

    // Permite cambiar la estrategia en tiempo de ejecución
    public function setDiscountStrategy(IDiscountStrategy $strategy): void
    {
        $this->discountStrategy = $strategy;
    }

    public function calculateFinalPrice(): float
    {
        echo "Total del pedido: $" . number_format($this->total, 2) . "\n";
        return $this->discountStrategy->applyDiscount($this->total);
    }
}


// --- Ejemplo de Uso ---

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

?>
