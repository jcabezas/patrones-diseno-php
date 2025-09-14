<?php

/**
 * PATRÓN FACTORY METHOD (Método de Fábrica)
 *
 * Propósito:
 * Define una interfaz para crear un objeto, pero permite que las subclases decidan qué clase concreta instanciar.
 * Permite a una clase delegar la responsabilidad de la instanciación a sus subclases.
 *
 * Componentes:
 * - Product (Producto): La interfaz para los objetos que la fábrica crea.
 * - ConcreteProduct (Producto Concreto): Implementaciones de la interfaz Product.
 * - Creator (Creador): Declara el método de fábrica (`factoryMethod`), que devuelve un objeto Product.
 * - ConcreteCreator (Creador Concreto): Sobrescribe el `factoryMethod` para devolver una instancia de un ConcreteProduct.
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Factory Method (Método de Fábrica)\n";
echo "  Categoría: Creational (Creacional)\n\n";
echo "  Caso de Uso: Crear diferentes tipos de loggers (archivo, base de datos, etc.) sin que el cliente conozca los detalles de implementación.\n";
echo "========================================\n\n";

// --- Ejemplo de Uso ---

use App\Creational\FactoryMethod\UseCase01\DatabaseLoggerFactory;
use App\Creational\FactoryMethod\UseCase01\FileLoggerFactory;

echo "--- Usando File Logger Factory ---\n";
// El cliente solo necesita saber qué fábrica usar, no cómo se crea FileLogger.
$fileLoggerFactory = new FileLoggerFactory('app.log');
$fileLoggerFactory->log('Este es un mensaje de prueba.');
$fileLoggerFactory->log('Otro mensaje importante.');

echo "\n--- Usando Database Logger Factory ---\n";
// El cliente puede cambiar fácilmente de un tipo de logger a otro.
$databaseLoggerFactory = new DatabaseLoggerFactory();
$databaseLoggerFactory->log('Error crítico en el sistema.');