<?php

/**
 * PATRÓN BUILDER (Constructor)
 *
 * Propósito:
 * Separa la construcción de un objeto complejo de su representación final. Esto permite
 * que el mismo proceso de construcción pueda crear diferentes representaciones del objeto.
 * Es muy útil cuando un objeto tiene muchas opciones de configuración.
 *
 * Componentes:
 * - Product (Producto): El objeto complejo que se está construyendo.
 * - Builder (Constructor): Interfaz que especifica los pasos para construir el producto.
 * - ConcreteBuilder (Constructor Concreto): Implementa la interfaz Builder y construye
 * una representación específica del producto. Mantiene un registro del producto que construye.
 * - Director (Director): Clase que utiliza el Builder para construir el objeto. El Director
 * conoce la secuencia de pasos de construcción, pero no los detalles de implementación. (Es opcional).
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Builder (Constructor)\n";
echo "  Categoría: Creational (Creacional)\n\n";
echo "  Caso de Uso: Construir una consulta SQL. Una consulta puede tener SELECT, WHERE, ORDER BY, LIMIT, etc.\n";
echo "  y no todas las partes son obligatorias. El Builder nos permite añadir estas partes paso a paso.\n";
echo "========================================\n\n";

use App\Creational\Builder\UseCase01\MySQLQueryBuilder;

// --- Ejemplo de Uso (sin Director) ---
echo "--- Construyendo una consulta SQL paso a paso ---\n";

$builder = new MySQLQueryBuilder();

// El cliente controla el proceso de construcción
$query = $builder
    ->select(['id', 'nombre', 'email'])
    ->from('usuarios')
    ->where('edad > 18')
    ->where("estado = 'activo'")
    ->limit(10)
    ->orderBy('nombre', 'DESC')
    ->getQuery();

echo $query; // Imprime la consulta SQL completa