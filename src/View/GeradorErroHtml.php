<?php

namespace Ifsp\Desafio\View;

class GeradorErroHtml extends GeradorHtml
{
    private string $tituloPagina;
    private string $conteudo;

    public function __construct(string $tituloPagina)
    {
        $this->tituloPagina = $tituloPagina;
        $this->conteudo = $this->gerarErro();
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

    private function gerarErro(): string
    {
        $erro = <<<END
        <div class="container">
            <h1>O Salário a calcular precisa ser positivo</h1>
            <a href="index.php" class="botao">Voltar</a>
        </div>
        END;
        return $erro;
    }
}