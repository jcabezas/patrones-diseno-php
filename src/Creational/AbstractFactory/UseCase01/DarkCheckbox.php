<?php

namespace App\Creational\AbstractFactory\UseCase01;

class DarkCheckbox implements ICheckbox
{
    public function render(): void
    {
        echo "<input type='checkbox' style='border: 1px solid #FFF; background-color: #555;'> Checkbox Oscuro\n";
    }
}