<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LEFT JOIN DBA</title>
</head>
<body>
<pre>
<?php
/**
A palavra chave LEFT JOIN permite obter não apenas os dados relacionados de duas tabelas, mas também os dados não relacionados;
 **/
require_once 'conexao.php';

$result_usuario = "SELECT nivac.nome nome_niv_ac,
user.id,user.nome nome_user,user.email,user.niveis_acesso_id
 FROM niveis_acessos nivac
 LEFT JOIN usuarios AS user ON user.niveis_acesso_id = nivac.id";

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
