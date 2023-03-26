<?php

namespace Ifsp\Desafio\Model;

abstract class Imposto
{
    private float $valorImposto;
    private float $porcentagemImposto;

    public function __construct(float $salario)
    {
        $this->valorImposto = $this->calculaImposto($salario);
    }

    abstract protected function calculaImposto(float $salario): float;

    public function retornaValorImposto(): float
    {
        return round($this->valorImposto, 2);
    }

    abstract public function retornaPorcentagemImposto(): string;
}
