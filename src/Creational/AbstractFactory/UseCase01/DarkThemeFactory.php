<?php

namespace App\Creational\AbstractFactory\UseCase01;

class DarkThemeFactory implements IUIFactory
{
    public function createButton(): IButton
    {
        return new DarkButton();
    }

    public function createCheckbox(): ICheckbox
    {
        return new DarkCheckbox();
    }
}