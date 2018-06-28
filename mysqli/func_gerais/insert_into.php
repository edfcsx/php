<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Insert In DBA</title>
</head>
<body>
<pre>

<?php
/**
A instrução insert into é utilizada para inserir novos registros em uma tabela.
 * NOW() pega hora e data atual do servidor;
 **/
require_once 'conexao.php';

$nome = "Carlos";
$email = "carlos@celke.com.br";

$result_usuario = "INSERT INTO usuarios (nome,email,situacao_id,niveis_acesso_id,created) VALUES ('$nome','$email','2','3',NOW())";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_insert_id($conn)){
    echo "Inserido com sucesso";
    echo mysqli_insert_id($conn);
}else{
    echo "Erro ao inserir";
}

?>
</pre>
</body>
</html>
