<?php

namespace Ifsp\Desafio\Model;

class ImpostoIrrf extends Imposto
{
    private float $valorImposto;
    private float $porcentagemImposto;

    protected function calculaImposto(float $salario): float
    {
        $parcelaDedutivelIrrf = 0;
        $valorImposto = 0;
        $this->porcentagemImposto = 0;

        if ($salario > 1903.98 && $salario <= 2826.65) {
            $parcelaDedutivelIrrf = 142.8;
            $valorImposto = $salario * 0.075;
            $this->porcentagemImposto = 0.075;
        }elseif ($salario > 2865.65 && $salario <= 3751.05) {
            $parcelaDedutivelIrrf = 354.8;
            $valorImposto = $salario * 0.15;
            $this->porcentagemImposto = 0.15;
        }elseif ($salario > 3751.05 && $salario <= 4664.68) {
            $parcelaDedutivelIrrf = 636.13;
            $valorImposto = $salario * 0.225;
            $this->porcentagemImposto = 0.225;
        }elseif ($salario > 4664.68) {
            $parcelaDedutivelIrrf = 869.36;
            $valorImposto = $salario * 0.275;
            $this->porcentagemImposto = 0.275; 
        }

        return $valorImposto - $parcelaDedutivelIrrf;
    }

    public function retornaPorcentagemImposto(): string
    {
        $porcentagemImposto = $this->porcentagemImposto * 100;
        return "$porcentagemImposto%";
    }
}
