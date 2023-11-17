<?php

class Pis01_02 implements IPis
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorDesconto;
    private $AliqPis;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorDesconto,
                         $aliqPis)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqPis = $aliqPis;
    }

    public function BaseCalculo()
    {
        $BasePis = ($this->ValorProduto +
            $this->ValorFrete +
            $this->ValorSeguro +
            $this->DespesasAcessorias -
            $this->ValorDesconto);
        return $BasePis;
    }

    public function Valor()
    {
        return ($this->BaseCalculo() * ($this->AliqPis / 100));
    }

}