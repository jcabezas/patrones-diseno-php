<?php

namespace App\Creational\AbstractFactory\UseCase01;

class LightCheckbox implements ICheckbox
{
    public function render(): void
    {
        echo "<input type='checkbox' style='border: 1px solid #000;'> Checkbox Claro\n";
    }
}