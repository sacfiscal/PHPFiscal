<?php

require_once 'BaseReduzidaIcmsST.php';

class Icms70 implements IIcms
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqIcmsProprio;
    private $AliqRedBcIcms;
    private $AliqIcmsST;
    private $AliqRedBcIcmsST;
    private $Mva;
    private $BaseCalculo;
    private $BaseCalculoReduzida;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqIcmsProprio,
                         $aliqRedBcIcms,
                         $aliqIcmsST,
                         $aliqRedBcIcmsST,
                         $mva)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
        $this->AliqRedBcIcms = $aliqRedBcIcms;
        $this->AliqIcmsST = $aliqIcmsST;
        $this->AliqRedBcIcmsST = $aliqRedBcIcmsST;
        $this->Mva = $mva;
        $this->BaseCalculo = new BaseIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto);
        $this->BaseCalculoReduzida = new BaseReduzidaIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto, $this->AliqRedBcIcms);
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
        return ($this->AliqRedBcIcms > 0);
    }

    public function PossuiRedBCIcmsST()
    {
        return ($this->AliqRedBcIcmsST > 0);
    }

    public function BaseIcms()
    {
        if ($this->PossuiRedBCIcmsProprio()) {
            return $this->BaseCalculoReduzida->GerarBaseReduzidaIcms();
        } else {
            return $this->BaseCalculo->GerarBaseIcms();
        }
    }

    public function ValorIcms()
    {
        $valorIcms = new ValorIcms($this->BaseIcms(), $this->AliqIcmsProprio);
        return $valorIcms->GerarValorIcms();
    }

    public function BaseIcmsST()
    {
        if ($this->PossuiRedBCIcmsST()) {
            $baseReduzidaIcmsST = new BaseReduzidaIcmsST($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto, $this->AliqRedBcIcmsST);
            return $baseReduzidaIcmsST->GerarBaseReduzidaIcmsST();
        } else {
            $baseIcmsST = new BaseIcmsST($this->BaseIcms(), $this->Mva);
            return $baseIcmsST->GerarBaseIcmsST();
        }
    }

    public function ValorIcmsST()
    {
        return (($this->BaseIcmsST() * ($this->AliqIcmsST / 100)) - $this->ValorIcms());
    }

}