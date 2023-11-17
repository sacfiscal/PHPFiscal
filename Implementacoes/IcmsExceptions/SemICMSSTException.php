<?php

class SemICMSSTException
{
    function __construct()
    {
        return "Este CST/CSOSN não possui base ou valor de ICMS-ST. Verifique a propriedade 'PossuiIcmsST' antes de acionar o método de cálculo.";
    }
}