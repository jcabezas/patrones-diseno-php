<?php

namespace App\Behavioral\Observer\UseCase01;

class Cliente implements \SplObserver
{
    private $nombre;

    public function __construct(string $nombre)
    {
        $this->nombre = $nombre;
    }

    // Este método es llamado por el sujeto cuando notifica
    /**
     * @param \App\Behavioral\Observer\UseCase01\Producto $subject
     */
    public function update(\SplSubject $subject): void
    {
        echo "  -> Hola {$this->nombre}, el producto '{$subject->getNombre()}' que te interesa ha vuelto a estar disponible!\n";
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }
}