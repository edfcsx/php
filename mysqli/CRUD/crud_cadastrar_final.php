<?php
session_start();
require_once 'conexao.php';

$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$email = filter_input_array(INPUT_POST,'email',FILTER_SANITIZE_STRING);
//$nome = isset($_POST['nome'])?$_POST['nome']:0;
//$email = isset($_POST['email'])?$_POST['email']:0;

$result_usuario = "INSERT INTO usuarios(nome,email,situacao_id,niveis_acesso_id,created) VALUES('$nome','$email',2,3,NOW())";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<span style='color:green'>O usuario $nome foi cadastrado com sucesso</span>";
    header("Location:crud_listar.php");
}else{
    $_SESSION['msg'] = "<span style='color:red'>Erro ao cadastrar usuario</span>";
    header("Location:crud_cadastrar.php");
}