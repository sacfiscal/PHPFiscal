<?php

class SemRedBaseIcmsSTException
{

    function __construct()
    {
        return "Este CST/CSOSN não possui redução de base de ICMS-ST. Verifique a propriedade 'PossuiRedBCIcmsST' antes de acionar o método de cálculo.";
    }

}