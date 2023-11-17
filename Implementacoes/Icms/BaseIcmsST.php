<?php

class BaseIcmsST
{
    private $BaseIcms;
    private $MVA;

    function __construct($baseIcms, $mva)
    {
        $this->BaseIcms = $baseIcms;
        $this->MVA = $mva;
    }

    public function GerarBaseIcmsST()
    {
        return ($this->BaseIcms) * (1 + ($this->MVA / 100));
    }

}