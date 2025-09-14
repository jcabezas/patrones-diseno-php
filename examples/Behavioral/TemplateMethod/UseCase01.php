<?php

/**
 * PATRÓN TEMPLATE METHOD (Método Plantilla)
 *
 * Propósito:
 * Define el esqueleto de un algoritmo en una operación (el "template method"),
 * delegando algunos de sus pasos a las subclases. Permite que las subclases
 * redefinan ciertos pasos de un algoritmo sin cambiar la estructura del algoritmo.
 *
 * Componentes:
 * - AbstractClass (Clase Abstracta): Contiene el "template method" (que es final para
 * evitar que las subclases lo sobrescriban) y define las operaciones primitivas
 * (pasos) que las subclases deben implementar.
 * - ConcreteClass (Clase Concreta): Implementa los pasos abstractos definidos en la
 * clase abstracta.
 */


// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Template Method (Método Plantilla)\n";
echo "  Categoría: Behavioral (Comportamiento)\n\n";
echo "  Caso de Uso: Un sistema que procesa archivos de datos (ej: CSV, JSON).\n";
echo "  El algoritmo general es siempre el mismo: abrir, leer, procesar, cerrar.\n";
echo "  Sin embargo, la forma de leer y procesar los datos es diferente para cada tipo de archivo.\n";
echo "========================================\n\n";

use App\Behavioral\TemplateMethod\UseCase01\ProcesadorCSV;
use App\Behavioral\TemplateMethod\UseCase01\ProcesadorJSON;

// --- Ejemplo de Uso ---
echo "Iniciando procesamiento de archivo CSV:\n";
$procesadorCsv = new ProcesadorCSV();
$procesadorCsv->procesarArchivo('/ruta/a/datos.csv');

echo "Iniciando procesamiento de archivo JSON:\n";
$procesadorJson = new ProcesadorJSON();
$procesadorJson->procesarArchivo('/ruta/a/datos.json');