<?php

class BaseReduzidaIcmsST
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqRedBaseIcmsST;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqRedBaseIcmsST)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqRedBaseIcmsST = $aliqRedBaseIcmsST;
    }

    public function GerarBaseReduzidaIcmsST()
    {
        $BaseIcms = ($this->ValorProduto +
            $this->ValorFrete +
            $this->ValorSeguro +
            $this->DespesasAcessorias -
            $this->ValorDesconto);

        return ($BaseIcms - ($BaseIcms * ($this->AliqRedBaseIcmsST / 100))) + $this->ValorIpi;
    }

}