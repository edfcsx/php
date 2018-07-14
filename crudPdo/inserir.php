<?php
require_once 'classes/Crud.php';
$crud = new Crud();
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);

if (isset($dados['btnCadastrar'])){
    unset($dados['btnCadastrar']);
    $crud->cadastrarContato($dados);
}
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CRUD EM PDO</title>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="inserir.php">Inserir <span class="sr-only">(current)</span></a>
            </li>
    </div>
</nav>

<main role="main" class="container" style="margin-top: 60px;">
    <h3 class="text-center">Inserir Contatos</h3>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6" style="background-color: #a29bfe">
            <form action="" method="post" class="form-group">
                <label for="cNome">Nome:</label>
                <input type="text" id="cNome" name="nome" required class="form-control">
                <label for="cEmail">Email:</label>
                <input type="text" id="cEmail" name="email" required class="form-control">
                <label for="cAssunto">Assunto:</label>
                <input type="text" id="cAssunto" name="assunto" required class="form-control">
                <label for="cMensagem">Mensagem:</label>
                <textarea id="cMensagem" required name="mensagem" cols="4" rows="4" class="form-control"></textarea>
                <input style="margin-top: 10px;" type="submit" name="btnCadastrar" value="cadastrar" class="btn btn-sm btn-block btn-danger">
            </form>
        </div>
    </div>

</main>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
