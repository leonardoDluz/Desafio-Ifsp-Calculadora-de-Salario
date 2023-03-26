<?php

namespace Ifsp\Desafio\View;

abstract class GeradorHtml
{
    private string $tituloPagina;
    private string $conteudo;

    abstract public function gerarHtml(): void;
}

