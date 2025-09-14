<?php

/**
 * PATRÓN ADAPTER (Adaptador)
 *
 * Propósito:
 * Permite que objetos con interfaces incompatibles colaboren entre sí. Actúa como un
 * traductor entre dos interfaces.
 *
 * Componentes:
 * - Target: La interfaz que el cliente espera o utiliza.
 * - Adaptee: La clase existente con una interfaz incompatible que necesita ser adaptada.
 * - Adapter: La clase que implementa la interfaz Target y envuelve al objeto Adaptee.
 * Realiza la "traducción" de las llamadas del Target a las del Adaptee.
 * - Client: El código que interactúa con el Adapter a través de la interfaz Target.
 */

// --- Ejemplo de Uso ---

echo "========================================\n";
echo "  Patrón: Adapter (Adaptador)\n";
echo "  Categoría: Structural (Estructural)\n\n";
echo "  Caso de Uso: Integrar una nueva pasarela de pago (NewPaymentApi) en un sistema existente sin modificar el código del cliente.\n";
echo "========================================\n\n";

use App\Structural\Adapter\UseCase01\OldPaymentGateway;
use App\Structural\Adapter\UseCase01\NewPaymentApi;
use App\Structural\Adapter\UseCase01\NewPaymentApiAdapter;
use App\Structural\Adapter\UseCase01\ShoppingCart;

echo "--- Usando la pasarela de pago antigua (si existiera una implementación) ---\n";
// (Imaginemos que hay una clase `OldPaymentGateway` que implementa IPaymentGateway)
$cart1 = new ShoppingCart(new OldPaymentGateway());
$cart1->checkout(150.75);

echo "\n--- Integrando la NUEVA pasarela de pago usando el Adapter ---\n";
// El cliente (ShoppingCart) no cambia. Sigue esperando un objeto IPaymentGateway.
// Creamos una instancia de la nueva API.
$newApi = new NewPaymentApi();
// Creamos el adaptador, pasándole la nueva API.
$adapter = new NewPaymentApiAdapter($newApi, 'user123');

// Le pasamos el adaptador al carrito de compras. El carrito no sabe que por dentro
// se está usando una API diferente.
$cart2 = new ShoppingCart($adapter);
$cart2->checkout(250.50);