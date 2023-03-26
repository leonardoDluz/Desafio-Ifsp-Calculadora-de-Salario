<?php

namespace Ifsp\Desafio\Model;

use Ifsp\Desafio\Model\ImpostoInss;
use Ifsp\Desafio\Model\ImpostoIrrf;

class CalculadoraSalario
{
    private float $salario;
    private ImpostoInss $inss;
    private ImpostoIrrf $irrf;

    public function __construct(float $salario)
    {
        $this->salario = $this->validaSalarario($salario);
        $this->inss = new ImpostoInss($this->salario);
        $this->irrf = new ImpostoIrrf($this->salario);
    }

    private function validaSalarario($salario): float
    {
        if ($salario < 0) {
            throw new \InvalidArgumentException('O salário não pode ser negativo');
        }
            return $salario;
    }

    public function retornaPorcentagens(): array
    {
        $porcentagens = [
            'irrf' => $this->irrf->retornaPorcentagemImposto(),
            'inss' => $this->inss->retornaPorcentagemImposto()
        ];

        return $porcentagens;
    }

    public function retornaValorImpostos(): array
    {
        $impostos = [
            'inss' => $this->inss->retornaValorImposto(),
            'irrf' => $this->irrf->retornaValorImposto()
        ];

        return $impostos;
    }

    public function retornaValorImpostosTotais()
    {
        $totalImpostos = $this->retornaValorImpostos()['inss'] + $this->retornaValorImpostos()['irrf'];
        return $totalImpostos;
    }

    public function retornaSalarioBruto(): float
    {
        return $this->salario;
    }

    public function retornaSalarioLiquido():float
    {
        $salario = $this->salario;
        $impostosTotais = $this->retornaValorImpostosTotais();
        $salarioLiquido = $salario - $impostosTotais;

        return $salarioLiquido;
    }
}
