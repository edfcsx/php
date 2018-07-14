<?php
require_once 'classes/Crud.php';
$crud = new Crud();

$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if (!isset($_GET['pagina'])){
    header("location:?pagina=1");
}

if(isset($dados['btnApagar'])){
    $crud->apagarContato($dados['btnApagar']);
    unset($dados['btnApagar']);
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
    <h3 class="text-center">Contatos</h3>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="card">
        <h5 class="card-header">Contatos</h5>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <h5 class="card-header">Pesquisar Contatos</h5>
                        <div class="card-body">
                            <form action="" method="post" class="form-group">
                                <label for="cChave">Chave de pesquisa:</label>
                                <input type="text" id="cChave" class="form-control" name="chave"
                                       placeholder="Digite a chave de pesquisa" style="margin-bottom: 10px;">
                                <input type="submit" value="Pesquisar" name="pesquisar" class="btn btn-sm btn-info">
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table table-striped table-sm" style="margin-top: 20px;">
                <thead>
                <tr>
                    <th>nome</th>
                    <th>email</th>
                    <th>assunto</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php
                if (isset($dados['pesquisar'])){
                    if ($dados['chave'] == ""){
                        $crud->exibirContatos('default',$_GET['pagina']);
                    }else{
                        $crud->exibirContatos('pesquisa',$_GET['pagina'],$dados['chave']);
                    }
                }else{
                    $crud->exibirContatos('default',$_GET['pagina']);
                }

                ?>
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <div style="margin-top: 20px;">
                <?php
                if (isset($dados['chave'])){
                    if ($dados['chave'] == ""){
                        $crud->paginacao('default',$_GET['pagina']);
                    }else{
                        $crud->paginacao('chave',$_GET['pagina'],$dados['chave']);
                    }
                }else{
                    $crud->paginacao('default',$_GET['pagina']);
                }
                ?>
            </div>
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
