<?php

namespace App\Creational\AbstractFactory\UseCase01;

class LightThemeFactory implements IUIFactory
{
    public function createButton(): IButton
    {
        return new LightButton();
    }

    public function createCheckbox(): ICheckbox
    {
        return new LightCheckbox();
    }
}