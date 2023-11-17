<?php

class SemBasePropriaException
{

    function __construct()
    {
        return "Este CST/CSOSN não possui base ou valor própria de ICMS. Verifique a propriedade 'PossuiIcmsProprio' antes de acionar o método de cálculo.";
    }

}