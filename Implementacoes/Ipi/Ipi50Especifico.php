<?php

class Ipi50Especifico implements IIpi
{

    private $ValorIpiUnitario;
    private $QuantidadeTributavel;

    function __construct($valorIpiUnitario,
                         $quantidadeTributavel)
    {
        $this->ValorIpiUnitario = $valorIpiUnitario;
        $this->QuantidadeTributavel = $quantidadeTributavel;
    }

    public function BaseCalculo()
    {
        return $this->QuantidadeTributavel;
    }

    public function Valor()
    {
        return ($this->QuantidadeTributavel * $this->ValorIpiUnitario);
    }

}