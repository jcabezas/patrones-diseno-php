<?php

namespace App\Structural\Adapter\UseCase01;

interface IPaymentGateway
{
    public function processPayment(float $amount): void;
}
