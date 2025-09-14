<?php

namespace App\Creational\Singleton\UseCase01;

class Configuracion
{
    /** @var Configuracion La única instancia de la clase */
    private static $instancia = null;

    /** @var array Almacena los datos de configuración */
    private $configuraciones = [];

    /**
     * El constructor es privado para prevenir la creación de instancias
     * con el operador `new`.
     */
    private function __construct()
    {
        // Simulamos la carga de un archivo de configuración
        $this->configuraciones = [
            'db_host' => 'localhost',
            'db_user' => 'root',
            'db_pass' => 'secret',
            'api_key' => 'XYZ-123-ABC',
        ];
        echo "Cargando configuración por primera vez.\n";
    }

    /**
     * Previene la clonación de la instancia.
     */
    private function __clone() {}

    /**
     * Previene la deserialización de la instancia.
     */
    public function __wakeup()
    {
        throw new \Exception("No se puede deserializar un Singleton.");
    }

    /**
     * El punto de acceso global a la instancia.
     */
    public static function getInstance(): Configuracion
    {
        if (self::$instancia === null) {
            self::$instancia = new self();
        }
        return self::$instancia;
    }

    /**
     * Obtiene un valor de la configuración.
     *
     * @param string $clave
     * @return mixed|null
     */
    public function get(string $clave)
    {
        return $this->configuraciones[$clave] ?? null;
    }

    /**
     * Establece un valor en la configuración.
     *
     * @param string $clave
     * @param mixed $valor
     */
    public function set(string $clave, $valor): void
    {
        $this->configuraciones[$clave] = $valor;
    }
}