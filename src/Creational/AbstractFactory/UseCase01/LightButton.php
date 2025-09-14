<?php

namespace App\Creational\AbstractFactory\UseCase01;

class LightButton implements IButton
{
    public function render(): void
    {
        echo "<button style='background-color: #EEE; color: #000;'>Botón Claro</button>\n";
    }
}