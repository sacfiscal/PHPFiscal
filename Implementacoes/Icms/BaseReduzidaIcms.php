<?php

class BaseReduzidaIcms
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqBcRedIcms;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqBcRedIcms)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqBcRedIcms = $aliqBcRedIcms;
    }

    public function GerarBaseReduzidaIcms()
    {
        $BaseNormal = ($this->ValorProduto +
            $this->ValorFrete +
            $this->ValorSeguro +
            $this->DespesasAcessorias -
            $this->ValorDesconto);

        return ($BaseNormal - ($BaseNormal * ($this->AliqBcRedIcms / 100))) + $this->ValorIpi;
    }

}