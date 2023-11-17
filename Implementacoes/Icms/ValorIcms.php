<?php

class ValorIcms
{

    private $BaseCalculo;
    private $AliqIcmsProprio;

    function __construct($baseCalculo,
                         $aliqIcmsProprio)
    {
        $this->BaseCalculo = $baseCalculo;
        $this->AliqIcmsProprio = $aliqIcmsProprio;
    }

    public function GerarValorIcms()
    {
        return ($this->AliqIcmsProprio / 100 * $this->BaseCalculo);
    }

}