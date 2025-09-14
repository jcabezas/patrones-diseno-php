<?php

namespace App\Structural\Adapter\UseCase01;

class ShoppingCart
{
    private $paymentGateway;

    public function __construct(IPaymentGateway $gateway)
    {
        $this->paymentGateway = $gateway;
    }

    public function checkout(float $total): void
    {
        echo "Iniciando proceso de pago por un total de $" . $total . "...\n";
        $this->paymentGateway->processPayment($total);
    }
}