<?php

class Cofins01_02 implements ICofins
{

    private $AliqCofins;
    private $DespesasAcessorias;
    private $ValorFrete;
    private $ValorProduto;
    private $ValorSeguro;
    private $ValorIpi;

    function __construct($aliqCofins,
                         $despesasAcessorias,
                         $valorFrete,
                         $valorProduto,
                         $valorSeguro,
                         $valorIpi)
    {
        $this->AliqCofins = $aliqCofins;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorFrete = $valorFrete;
        $this->ValorProduto = $valorProduto;
        $this->ValorSeguro = $valorSeguro;
        $this->ValorIpi = $valorIpi;
    }

    public function BaseCalculo()
    {
        $BasePis = ($this->ValorProduto +
            $this->ValorFrete +
            $this->ValorSeguro +
            $this->DespesasAcessorias +
            $this->ValorIpi);
        return $BasePis;
    }

    public function Valor()
    {
        return ($this->BaseCalculo() * ($this->AliqCofins / 100));
    }

}