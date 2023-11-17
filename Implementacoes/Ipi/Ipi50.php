<?php

class Ipi50 implements IIpi
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $AliqIpi;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $aliqIpi)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->AliqIpi = $aliqIpi;
    }

    public function BaseCalculo()
    {
        $BaseIpi = ($this->ValorProduto +
            $this->ValorFrete +
            $this->ValorSeguro +
            $this->DespesasAcessorias);
        return $BaseIpi;
    }

    public function Valor()
    {
        return (($this->AliqIpi / 100) * $this->BaseCalculo());
    }

}