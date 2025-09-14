<?php

namespace App\Structural\Adapter\UseCase01;

class OldPaymentGateway implements IPaymentGateway
{
    public function processPayment(float $amount): void
    {
        echo "Procesando pago de $" . $amount . " a través de la pasarela de pago antigua...\n";
    }
}