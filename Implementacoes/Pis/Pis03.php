<?php

class Pis03 implements IPis
{

    private $ValorPisUnitario;
    private $QuantidadeTributavel;

    function __construct($valorPisUnitario,
                         $quantidadeTributavel)
    {
        $this->ValorPisUnitario = $valorPisUnitario;
        $this->QuantidadeTributavel = $quantidadeTributavel;
    }

    public function BaseCalculo()
    {
        return $this->QuantidadeTributavel;
    }

    public function Valor()
    {
        return ($this->QuantidadeTributavel * $this->ValorPisUnitario);
    }

}