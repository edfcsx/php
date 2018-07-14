<?php
require_once 'classes/Crud.php';
$crud = new Crud();
$id = filter_input(INPUT_GET,'id',FILTER_VALIDATE_INT);
$dados = filter_input_array(INPUT_POST,FILTER_DEFAULT);
if(isset($dados['alterarContato'])){
    unset($dados['alterarContato']);
    $crud->alterarContato($id,$dados);
}
$contato = $crud->carregarContato($id);

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
<script> function ativarForm(id) { document.getElementById(id).submit();}</script>
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
<h5 class="text-center">Contato</h5>
    <?php
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
    ?>
    <div class="card">
        <div class="card-header">
            Contato# <?php echo $id?>
        </div>
        <div class="card-body">
            <form action="" method="post" class="form-group" id="form1">
            <div class="row">
                <div class="col-md-2">
                    <input type="text" value="<?php echo $contato['data'];?>" name="data" readonly class="form-control">
                </div>
                <div class="col-md-10"></div>
                <div class="col-md-6">
                    <label for="cNome">Nome</label>
                    <input type="text" value="<?php echo $contato['nome'];?>" name="nome" id="cNome" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="cEmail">Email</label>
                    <input type="text" value="<?php echo $contato['email'];?>" name="email" id="cEmail" class="form-control" required>
                </div>
                <div class="col-md-10">
                    <label for="cAssunto">Assunto</label>
                    <input type="text" value="<?php echo $contato['assunto'];?>" name="assunto" id="cAssunto" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label for="cMensagem">Mensagem</label>
                    <textarea class="form-control" name="mensagem" id="cMensagem" required cols="4" rows="4"><?php echo $contato['mensagem'];?></textarea>
                </div>
                <input type="hidden" name="alterarContato">
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#exampleModal" style="margin-top: 20px;">
                    Alterar
                </button>
            </form>
        </div>
    </div>
</main>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Confirmar Alteração de cadastro ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="ativarForm('form1')">Sim</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
