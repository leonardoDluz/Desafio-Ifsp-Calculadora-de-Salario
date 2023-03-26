<?php

namespace Ifsp\Desafio\Model;

class ImpostoInss extends Imposto
{
    private float $valorImposto;
    private float $porcentagemImposto;

    protected function calculaImposto(float $salario): float
    {  
        $valorImposto = 0;

        if ($salario <= 1302) {
            $valorImposto = $salario * 0.075;
            $this->porcentagemImposto = 0.075;
        }
        elseif ($salario > 1302 && $salario <= 2571.29){
            $valorImposto = (1302 * 0.075) + (($salario - 1302) * 0.09);
            $this->porcentagemImposto = 0.09;
        }
        elseif ($salario > 2571.29 && $salario <= 3856.94){
            $valorImposto = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + (($salario - 2571.29) * 0.12);
            $this->porcentagemImposto = 0.12;
        }
        elseif ($salario > 3856.94 && $salario <= 7507.49){
            $valorImposto = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ((3856.94 - 2571.29) * 0.12) + (($salario - 3856.94) * 0.14);
            $this->porcentagemImposto = 0.14;
        }
        else {
            $valorImposto = (1302 * 0.075) + ((2571.29 - 1302) * 0.09) + ((3856.94 - 2571.29) * 0.12) + ((7507.49 - 3856.94) * 0.14);
            $this->porcentagemImposto = 0.14;
        }
        
        return $valorImposto;
    }

    public function retornaPorcentagemImposto(): string
    {
        $porcentagemImposto = $this->porcentagemImposto * 100;
        return "$porcentagemImposto%";
    }
}
