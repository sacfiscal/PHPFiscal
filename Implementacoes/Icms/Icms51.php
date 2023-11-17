<?php

class Icms51 implements IIcms
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqIcmsProprio;
    private $AliqDifIcms;
    private $BaseCalculo;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqIcmsProprio,
                         $aliqDifIcms)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
        $this->AliqDifIcms = $aliqDifIcms;
        $this->BaseCalculo = new BaseIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto);
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
        return $this->BaseCalculo->GerarBaseIcms();
    }

    public function ValorIcms()
    {
        $valorIcms = new ValorIcms($this->BaseIcms(), $this->AliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }

    public function ValorIcmsDiferido()
    {
        return ($this->ValorIcms() - (($this->ValorIcms() * ($this->AliqDifIcms / 100))));
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