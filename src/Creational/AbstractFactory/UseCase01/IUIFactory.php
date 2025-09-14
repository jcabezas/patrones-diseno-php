<?php

namespace App\Creational\AbstractFactory\UseCase01;

interface IUIFactory
{
    public function createButton(): IButton;
    public function createCheckbox(): ICheckbox;
}