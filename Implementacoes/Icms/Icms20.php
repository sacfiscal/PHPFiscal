<?php

class Icms20 implements IIcms
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqIcmsProprio;
    private $AliqRedBcIcms;
    private $BaseCalculo;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqIcmsProprio,
                         $aliqRedBcIcms)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
        $this->BaseCalculo = new BaseReduzidaIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto, $this->AliqRedBcIcms);
    }

    public function PossuiIcmsProprio()
    {
        return true;
    }

    public function PossuiIcmsST()
    {
        return false;
    }

    public function PossuiRedBCIcmsProprio()
    {
        return true;
    }

    public function PossuiRedBCIcmsST()
    {
        return false;
    }

    public function BaseIcms()
    {
        return $this->BaseCalculo->GerarBaseReduzidaIcms();
    }

    public function ValorIcms()
    {
        $valorIcms = new ValorIcms($this->BaseIcms(), $this->AliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }

    public function BaseIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

    public function ValorIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

}