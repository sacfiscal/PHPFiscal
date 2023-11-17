<?php

class BaseIcms
{
    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
    }

    public function GerarBaseIcms()
    {
        $BaseIcms = ($this->ValorProduto +
            $this->ValorFrete +
            $this->ValorSeguro +
            $this->DespesasAcessorias +
            $this->ValorIpi -
            $this->ValorDesconto);
        return $BaseIcms;
    }

}