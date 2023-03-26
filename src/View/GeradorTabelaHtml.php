<?php

namespace Ifsp\Desafio\View;

use Ifsp\Desafio\Model\CalculadoraSalario;

class GeradorTabelaHtml extends GeradorHtml
{  
    private CalculadoraSalario $calculadoraSalario;
    private string $tituloPagina;
    private string $conteudo;
    
    public function __construct(string $tituloPagina, float $salario)
    {
        $this->tituloPagina = $tituloPagina;
        $this->calculadoraSalario = new CalculadoraSalario($salario);
        $this->conteudo = $this->gerarTabela();
    }

    public function gerarHtml(): void
    {
        $conteudo = $this->conteudo;
        $tituloPagina = $this->tituloPagina;

        echo <<<END
        <!DOCTYPE html>
        <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="css/reset.css">
            <link rel="stylesheet" href="css/style.css">
            <title>$tituloPagina</title>
        </head>
        <body>
            $conteudo
        </body>
        </html>
        END;
    }

    protected function gerarTabela(): string
    {  
        $calculadora = $this->calculadoraSalario;
        $porcentagemInss = $calculadora->retornaPorcentagens()['inss'];
        $porcentagemIrrf = $calculadora->retornaPorcentagens()['irrf'];

        $salarioBruto = $calculadora->retornaSalarioBruto();
        $salarioLiquido = $calculadora->retornaSalarioLiquido();

        $valorInss = $calculadora->retornaValorImpostos()['inss'];
        $valorIrrf = $calculadora->retornaValorImpostos()['irrf'];
        $valorImpostosTotais = $calculadora->retornaValorImpostosTotais();

        $table = <<<END
        <div class="container">

            <table border="1" class="container">
                <tr>
                    <th>Descrição</th>
                    <th>Alíquota</th>
                    <th>Proventos</th>
                    <th>Descontos</th>
                </tr>
                <tr>
                    <th>salário Bruto</th>
                    <td></td>
                    <td>R$  $salarioBruto</td>
                    <td></td>
                </tr>
                <tr>
                    <th>INSS</th>
                    <td>$porcentagemInss</td>
                    <td></td>
                    <td>R$ -$valorInss </td>
                </tr>
                <tr>
                    <th>IRRF</th>
                    <td>$porcentagemIrrf</td>
                    <td></td>
                    <td>R$ -$valorIrrf</td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td></td>
                    <td>R$ $salarioBruto</td>
                    <td>R$ -$valorImpostosTotais</td>
                </tr>
                <tr>
                    <th colspan="2">Valor do Salário Líquido</th>
                    <td colspan="2">R$ $salarioLiquido</td>
                </tr>
            </table>
            <a href="index.php" class="botao">Voltar</a>
        </div>
        END;

        return $table;
    }
}