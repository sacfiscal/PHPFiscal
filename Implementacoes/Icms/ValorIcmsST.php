<?php

class ValorIcmsST
{

    private $BaseCalculoST;
    private $AliqIcmsST;
    private $ValorIcms;

    function __construct($baseCalculoST, $aliqIcmsST, $valorIcms)
    {
        $this->BaseCalculoST = $baseCalculoST;
        $this->AliqIcmsST = $aliqIcmsST;
        $this->ValorIcms = $valorIcms;
    }

    public function GerarValorIcmsST()
    {
        return (($this->BaseCalculoST * ($this->AliqIcmsST / 100)) - $this->ValorIcms);
    }

}