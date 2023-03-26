<?php

require_once 'autoload.php';

use Ifsp\Desafio\Model\CalculadoraSalario;
use Ifsp\Desafio\View\GeradorErroHtml;
use Ifsp\Desafio\View\GeradorTabelaHtml;

$salario = filter_input(INPUT_POST, 'salario', FILTER_VALIDATE_FLOAT);
try {
    //$calculadoraSalario = new CalculadoraSalario($salario);
    $table = new GeradorTabelaHtml('Resultado da Calculadora de Salário Liquido', $salario);
    $table->gerarHtml();

} catch (\InvalidArgumentException) {
    $erro = new GeradorErroHtml('pagina de erro');
    $erro->gerarHtml(); 
}





