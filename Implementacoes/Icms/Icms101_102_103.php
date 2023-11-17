<?php

class Icms101_102_103 implements IIcms
{

    public function PossuiIcmsProprio()
    {
        return false;
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

    function __construct()
    {
    }

    public function BaseIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function ValorIcms()
    {
        throw new Exception(new SemBasePropriaException());
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