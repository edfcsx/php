<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>RIGHT JOIN DBA</title>
</head>
<body>
<pre>
<?php
/**
A palavra chave RIGHT JOIN retorna todos os dados encontrados na tabela à direita de JOIN. caso não
 * existam dados associados entre as tabelas à esquerda e à direita de join serão retornados valores
 * nulos.
 **/
require_once 'conexao.php';


$result_usuario = "SELECT nivac.nome nome_niv_ac,
user.id,user.nome nome_user,user.email,user.niveis_acesso_id
 FROM niveis_acessos nivac
 RIGHT JOIN usuarios AS user ON user.niveis_acesso_id = nivac.id";

$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome_user']."<br/>";
    echo "Email: ".$row_usuario['email']."<br/>";
    echo "Cargo: ".$row_usuario['nome_niv_ac']."<br/><hr/>";
}

?>
</pre>
</body>
</html>
