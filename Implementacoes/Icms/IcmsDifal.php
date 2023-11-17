<?php

class IcmsDifal
{

    private $ValorProduto;
    private $ValorFrete;
    private $ValorSeguro;
    private $DespesasAcessorias;
    private $ValorIpi;
    private $ValorDesconto;
    private $AliqIcmsProprio;
    private $AliqIcmsInternoDestino;
    private $Fcp;
    private $Partilha;
    private $BaseCalculo;

    function __construct($valorProduto,
                         $valorFrete,
                         $valorSeguro,
                         $despesasAcessorias,
                         $valorIpi,
                         $valorDesconto,
                         $aliqIcmsProprio,
                         $aliqIcmsInternoDestino,
                         $fcp)
    {
        $this->ValorProduto = $valorProduto;
        $this->ValorFrete = $valorFrete;
        $this->ValorSeguro = $valorSeguro;
        $this->DespesasAcessorias = $despesasAcessorias;
        $this->ValorIpi = $valorIpi;
        $this->ValorDesconto = $valorDesconto;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
        $this->AliqIcmsInternoDestino = $aliqIcmsInternoDestino;
        $this->Fcp = $fcp;
        $this->BaseCalculo = new BaseIcms($this->ValorProduto, $this->ValorFrete, $this->ValorSeguro, $this->DespesasAcessorias, $this->ValorIpi, $this->ValorDesconto);

        $this->Partilha = 0;

        switch (date("Y")) {
            case 2016:
                $this->Partilha = 40;
                break;
            case 2017:
                $this->Partilha = 60;
                break;
            case 2018:
                $this->Partilha = 80;
                break;
            default:
                $this->Partilha = 100;
                break;
        }
    }

    public function BaseIcms()
    {
        return $this->BaseCalculo->GerarBaseIcms();
    }

    public function ValorFcpDestino()
    {
        $bcIcms = $this->BaseIcms();
        return ($this->Fcp / 100 * $bcIcms);
    }

    public function ValorDifal()
    {
        return $this->BaseIcms() * (($this->AliqIcmsInternoDestino - $this->AliqIcmsProprio) / 100);
    }

    public function ValorIcmsDestino()
    {
        return ($this->ValorDifal() * ($this->Partilha / 100));
    }

    public function ValorIcmsRemetente()
    {
        $difal = $this->BaseIcms() * (($this->AliqIcmsInternoDestino - $this->AliqIcmsProprio) / 100);
        return ($difal * ((100 - $this->Partilha) / 100));
    }

}