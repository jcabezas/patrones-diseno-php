<?php

namespace App\Structural\Adapter\UseCase01;

class NewPaymentApiAdapter implements IPaymentGateway
{
    private $newPaymentApi;

    public function __construct(NewPaymentApi $newPaymentApi)
    {
        $this->newPaymentApi = $newPaymentApi;
    }

    public function processPayment(float $amount): void
    {
        $this->newPaymentApi->makePayment($amount);
    }
}
