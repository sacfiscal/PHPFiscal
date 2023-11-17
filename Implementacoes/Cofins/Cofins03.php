<?php

class Cofins03 implements ICofins
{

    private $ValorCofinsUnitario;
    private $QuantidadeTributavel;

    function __construct($valorCofinsUnitario,
                         $quantidadeTributavel)
    {
        $this->ValorCofinsUnitario = $valorCofinsUnitario;
        $this->QuantidadeTributavel = $quantidadeTributavel;
    }

    public function BaseCalculo()
    {
        return $this->QuantidadeTributavel;
    }

    public function Valor()
    {
        return ($this->QuantidadeTributavel * $this->ValorCofinsUnitario);
    }

}