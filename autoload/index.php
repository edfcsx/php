<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Autoload</title>
</head>
    <body>
    <pre>
    <?php
        require_once 'inc/config.php';
        $apartamento = new Apartamento(15);
        $funcionario = new Funcionario("Jose");
        $visitante = new Visitante("Pedro");

        $visitas[0] = new Visitas($apartamento,$visitante,$funcionario);
        $visitas[0]->agendar();
    ?>
        </pre>
    </body>
</html>

