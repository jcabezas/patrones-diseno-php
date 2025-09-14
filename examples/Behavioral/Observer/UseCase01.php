<?php

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

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Observer (Observador)\n";
echo "  Categoría: Behavioral (Comportamiento)\n\n";
echo "  Caso de Uso: Un sistema de E-commerce que necesita notificar a los clientes\n";
echo "  cuando un producto que les interesa vuelve a estar en stock.\n";
echo "========================================\n\n";

use App\Behavioral\Observer\UseCase01\Cliente;
use App\Behavioral\Observer\UseCase01\Producto;

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