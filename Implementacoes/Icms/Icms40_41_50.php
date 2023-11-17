<?php

class Icms40_41_50 implements IIcms
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

    public function BaseIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function BaseIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

    public function ValorIcms()
    {
        throw new Exception(new SemBasePropriaException());
    }

    public function ValorIcmsST()
    {
        throw new Exception(new SemICMSSTException());
    }

}