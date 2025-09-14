<?php

namespace App\Creational\AbstractFactory\UseCase01;

class Application
{
    private $factory;
    private $button;
    private $checkbox;

    public function __construct(IUIFactory $factory)
    {
        $this->factory = $factory;
    }

    public function createUI(): void
    {
        $this->button = $this->factory->createButton();
        $this->checkbox = $this->factory->createCheckbox();
    }

    public function renderUI(): void
    {
        $this->button->render();
        $this->checkbox->render();
    }
}