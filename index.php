<?php

require_once 'autoload.php';

use Ifsp\Desafio\View\GeradorFormularioHtml;

$form = new GeradorFormularioHtml('Calculadora de Salário Liquido');
$form->gerarHtml();