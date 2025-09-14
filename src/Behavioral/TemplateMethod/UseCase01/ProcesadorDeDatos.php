<?php

namespace App\Behavioral\TemplateMethod\UseCase01;

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