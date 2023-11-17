<?php

class Icms90 implements IIcms
{

    private $Icms;

    function __construct($icms)
    {
        $this->Icms = $icms;
    }

    public function PossuiIcmsProprio()
    {
        return $this->Icms->PossuiIcmsProprio;
    }

    public function PossuiIcmsST()
    {
        return $this->Icms->PossuiIcmsST;
    }

    public function PossuiRedBCIcmsProprio()
    {
        return $this->Icms->PossuiRedBCIcmsProprio;
    }

    public function PossuiRedBCIcmsST()
    {
        return $this->Icms->PossuiRedBCIcmsST;
    }

    public function BaseIcms()
    {
        return $this->Icms->BaseIcms();
    }

    public function BaseIcmsST()
    {
        return $this->Icms->BaseIcmsST();
    }

    public function ValorIcms()
    {
        return $this->Icms->ValorIcms();
    }

    public function ValorIcmsST()
    {
        return $this->Icms->ValorIcmsST();
    }

}