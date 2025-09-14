<?php

namespace App\Creational\AbstractFactory\UseCase01;

class DarkButton implements IButton
{
    public function render(): void
    {
        echo "<button style='background-color: #333; color: #FFF;'>Botón Oscuro</button>\n";
    }
}