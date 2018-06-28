<?php
session_start();
require_once 'conexao.php';

$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
$id = filter_input(INPUT_POST,'id',FILTER_SANITIZE_NUMBER_INT);

$old_user = "SELECT * FROM usuarios WHERE id='$id' LIMIT 1";
$old_user_execute = mysqli_query($conn,$old_user);
$row_old_user = mysqli_fetch_assoc($old_user_execute);
$old = $row_old_user['nome'];

$result_usuario = "UPDATE usuarios SET
nome='$nome',
email='$email',
modified=NOW()
WHERE id='$id'";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_affected_rows($conn)){
    $_SESSION['msg'] = "<span style='color:green'>O usuario $old foi alterado com sucesso para $nome</span>";
    header("Location:crud_listar.php");
}else{
    $_SESSION['msg'] = "<span style='color:red'>Erro ao editar usuario</span>";
    header("Location:crud_editar.php");
}