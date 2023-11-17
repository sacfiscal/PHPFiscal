<?php

class SemRedBaseIcmsException
{

    function __construct()
    {
        return "Este CST/CSOSN não possui redução de base de ICMS. Verifique a propriedade 'PossuiRedBCIcmsProprio' antes de acionar o método de cálculo.";
    }

}