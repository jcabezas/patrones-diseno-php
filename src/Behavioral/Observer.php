<?php

namespace App\Behavioral;

/**
 * PATRÓN OBSERVER (Observador)
 *
 * Propósito:
 * Define una dependencia de uno a muchos entre objetos. Cuando un objeto (el "Subject" o "Sujeto")
 * cambia su estado, todos sus dependientes (los "Observers" u "Observadores") son notificados
 * y actualizados automáticamente.
 *
 * Componentes:
 * - Subject (Sujeto): Mantiene una lista de observadores y proporciona métodos para agregar,
 * eliminar y notificar a los observadores.
 * - Observer (Observador): Define una interfaz de actualización para los objetos que deben ser
 * notificados de los cambios en un sujeto.
 * - ConcreteSubject (Sujeto Concreto): Almacena el estado de interés para los ConcreteObservers
 * y envía una notificación a sus observadores cuando su estado cambia.
 * - ConcreteObserver (Observador Concreto): Implementa la interfaz Observer para manejar la
 * actualización de su estado.
 *
 * Nota: PHP tiene interfaces nativas para este patrón: `SplSubject` y `SplObserver`.
 */

// Caso de Uso: Una tienda online (Sujeto) que notifica a sus clientes (Observadores)
// cuando un producto que les interesa vuelve a estar en stock.

// --- 1. Sujeto (usando la interfaz nativa de PHP) ---
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
    public function attach(\SplObserver $observer): void
    {
        echo "Producto '{$this->nombre}': Cliente '{$observer->getNombre()}' se ha suscrito.\n";
        $this->observadores->attach($observer);
    }

    // Quitar un observador
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

// --- 2. Observador (usando la interfaz nativa de PHP) ---
class Cliente implements \SplObserver
{
    private $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    // Este método es llamado por el sujeto cuando notifica
    public function update(\SplSubject $subject): void
    {
        echo "  -> Hola {$this->nombre}, el producto '{$subject->getNombre()}' que te interesa ha vuelto a estar disponible!\n";
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}


// --- Ejemplo de Uso ---

// Creamos los observadores (clientes)
$cliente1 = new Cliente('Ana');
$cliente2 = new Cliente('Juan');
$cliente3 = new Cliente('Maria');

// Creamos el sujeto (producto)
$producto = new Producto('iPhone 15 Pro');

// Los clientes se suscriben para ser notificados
$producto->attach($cliente1);
$producto->attach($cliente2);

// María también se suscribe
$producto->attach($cliente3);

// Juan decide que ya no quiere ser notificado
$producto->detach($cliente2);

// El producto llega al almacén
$producto->reponerStock();

?>
