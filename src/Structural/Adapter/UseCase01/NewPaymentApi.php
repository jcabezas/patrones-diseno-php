<?php

namespace App\Structural\Adapter\UseCase01;

class NewPaymentApi
{
    public function makePayment(float $amount): void
    {
        echo "Procesando pago de $" . $amount . " a través de la nueva API de pagos...\n";
    }
}
