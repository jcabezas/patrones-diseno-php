<?php

namespace App\Behavioral\Observer\UseCase01;

class Producto implements \SplSubject
{
    private $nombre;
    private $enStock = false;
    private $observadores; // Almacenará los observadores

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
        $this->observadores = new \SplObjectStorage(); // Estructura para almacenar objetos
    }

    // Añadir un observador
    /**
     * @param \App\Behavioral\Observer\UseCase01\Cliente $observer
     */
    public function attach(\SplObserver $observer): void
    {
        echo "Producto '{$this->nombre}': Cliente '{$observer->getNombre()}' se ha suscrito.\n";
        $this->observadores->attach($observer);
    }

    // Quitar un observador
    /**
     * @param \App\Behavioral\Observer\UseCase01\Cliente $observer
     */
    public function detach(\SplObserver $observer): void
    {
        echo "Producto '{$this->nombre}': Cliente '{$observer->getNombre()}' ha cancelado su suscripción.\n";
        $this->observadores->detach($observer);
    }

    // Notificar a todos los observadores
    public function notify(): void
    {
        echo "Producto '{$this->nombre}': Notificando a todos los suscriptores...\n";
        foreach ($this->observadores as $observer) {
            $observer->update($this); // Pasamos la instancia del sujeto
        }
    }

    // Lógica de negocio que cambia el estado
    public function reponerStock(): void
    {
        echo "\nProducto '{$this->nombre}' ahora está en stock!\n";
        $this->enStock = true;
        $this->notify(); // Notificamos del cambio de estado
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}