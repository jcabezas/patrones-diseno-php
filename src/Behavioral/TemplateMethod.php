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

// Caso de Uso: Un sistema que procesa archivos de datos (ej: CSV, JSON).
// El algoritmo general es siempre el mismo: abrir, leer, procesar, cerrar.
// Sin embargo, la forma de leer y procesar los datos es diferente para cada tipo de archivo.

// --- 1. La Clase Abstracta ---
abstract class ProcesadorDeDatos
{
    /**
     * Este es el "Template Method". Define la estructura del algoritmo.
     * Es `final` para que las subclases no puedan alterarlo.
     */
    final public function procesarArchivo(string $ruta): void
    {
        $this->abrir($ruta);
        $datos = $this->leer();
        $datosProcesados = $this->procesarDatos($datos);
        $this->guardar($datosProcesados);
        $this->cerrar();
        echo "------------------\n";
    }

    // Pasos comunes que pueden ser sobrescritos (hooks)
    protected function abrir(string $ruta): void
    {
        echo "Abriendo archivo en la ruta: $ruta\n";
    }

    protected function cerrar(): void
    {
        echo "Cerrando el archivo.\n";
    }

    protected function guardar($datos): void
    {
        echo "Guardando datos procesados.\n";
    }

    // Pasos que DEBEN ser implementados por las subclases
    abstract protected function leer(): array;
    abstract protected function procesarDatos(array $datos): array;
}

// --- 2. Las Clases Concretas ---
class ProcesadorCSV extends ProcesadorDeDatos
{
    // Implementación específica para CSV
    protected function leer(): array
    {
        echo "Leyendo datos de un archivo CSV...\n";
        // Simulación
        return [
            ['id' => 1, 'nombre' => 'Ana'],
            ['id' => 2, 'nombre' => 'Juan'],
        ];
    }

    protected function procesarDatos(array $datos): array
    {
        echo "Procesando datos CSV (convirtiendo nombres a mayúsculas)...\n";
        foreach ($datos as &$fila) {
            $fila['nombre'] = strtoupper($fila['nombre']);
        }
        return $datos;
    }
}

class ProcesadorJSON extends ProcesadorDeDatos
{
    // Implementación específica para JSON
    protected function leer(): array
    {
        echo "Leyendo datos de un archivo JSON...\n";
        // Simulación
        return [
            ['usuario' => 'pedro', 'score' => 150],
            ['usuario' => 'maria', 'score' => 200],
        ];
    }

    protected function procesarDatos(array $datos): array
    {
        echo "Procesando datos JSON (incrementando el score)...\n";
        foreach ($datos as &$item) {
            $item['score'] += 10;
        }
        return $item;
    }
}

// --- Ejemplo de Uso ---
echo "Iniciando procesamiento de archivo CSV:\n";
$procesadorCsv = new ProcesadorCSV();
$procesadorCsv->procesarArchivo('/ruta/a/datos.csv');

echo "Iniciando procesamiento de archivo JSON:\n";
$procesadorJson = new ProcesadorJSON();
$procesadorJson->procesarArchivo('/ruta/a/datos.json');

?>
