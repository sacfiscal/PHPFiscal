<?php

require_once '../IcmsExceptions/SemRedBaseIcmsSTException.php';
require_once 'ValorIcmsST.php';

class Icms10 implements IIcms
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqIcmsProprio;
    private $AliqIcmsST;
    private $Mva;
    private $BaseCalculo;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqIcmsProprio,
                         $aliqIcmsST,
                         $mva)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
        $this->AliqIcmsST = $aliqIcmsST;
        $this->Mva = $mva;
        $this->BaseCalculo = new BaseIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto);
    }

    public function PossuiIcmsProprio()
    {
        return true;
    }

    public function PossuiIcmsST()
    {
        return true;
    }

    public function PossuiRedBCIcmsProprio()
    {
        return false;
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

    public function BaseIcmsST()
    {
        $baseIcmsST = new BaseIcmsST($this->BaseIcms(), $this->Mva);
        return $baseIcmsST->GerarBaseIcmsST();
    }

    public function ValorIcmsST()
    {
        $valorIcmsST = new ValorIcmsST($this->BaseIcmsST(), $this->AliqIcmsST, $this->ValorIcms());
        return $valorIcmsST->GerarValorIcmsST();
    }

    public function ValorRedBaseIcms()
    {
        throw new Exception(new SemRedBaseIcmsException());
    }

    public function ValorRedBaseIcmsST()
    {
        throw new Exception(new SemRedBaseIcmsSTException());
    }

}