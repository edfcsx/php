<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>INNER JOIN DBA</title>
</head>
<body>
<pre>
<?php
/**
A palavra chave Inner Join seleciona registros que possuem valores correspondentes em ambas tabelas.
 On significa igual.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT user.id,user.email,user.niveis_acesso_id,user.nome nome_usuario,nivac.nome nome_niv_ac
FROM usuarios AS user
INNER JOIN niveis_acessos AS nivac ON nivac.id = user.niveis_acesso_id";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Email: ".$row_usuario['nome_usuario']."<br/>";
    echo "Email: ".$row_usuario['email']."<br/>";
    echo "Cargo: ".$row_usuario['nome_niv_ac']."<br/>";
    echo "Nivel de acesso: ".$row_usuario['niveis_acesso_id']."<br/><hr/>";
}

?>
</pre>
</body>
</html>
