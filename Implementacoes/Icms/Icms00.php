<?php

require_once 'ValorIcms.php';
require_once '../IcmsExceptions/SemICMSSTException.php';

class Icms00
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqIcmsProprio;
    private $BaseCalculo;

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
        return false;
    }

    public function PossuiRedBCIcmsST()
    {
        return false;
    }

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqIcmsProprio)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
        $this->BaseCalculo = new BaseIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto);
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
        throw new Exception(new SemICMSSTException());
    }

    public function ValorIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

}