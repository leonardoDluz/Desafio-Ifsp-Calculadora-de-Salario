<?php

namespace Ifsp\Desafio\View;

class GeradorFormularioHtml extends GeradorHtml
{
    private string $tituloPagina;
    private string $conteudo;

    public function __construct(string $tituloPagina)
    {
        $this->tituloPagina = $tituloPagina;
        $this->conteudo = $this->gerarFormulario();
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

    private function gerarFormulario(): string
    {
        $form = <<<END
        <form action="resultado.php" method="post" class="container">
            <h1>Cálculo de Salário Líquido</h1>

            <label for="salario">Salário Bruto</label>
            <input type="number" name="salario" required
            placeholder="R$0,00">

            <button type="submit" class="botao">Calcular</button>
        </form>
        END;
       
       
        return $form;
    }
}