<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Offset DBA</title>
</head>
<body>
<pre>


<?php
/**
Offset serve para retornar um intervalo de dados ex: do usuario 2 ao 4.
 */
require_once 'conexao.php';

$result_usuario = "SELECT id,nome,email FROM usuarios LIMIT 2 OFFSET 2 ";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome']."<br/>";
    echo "Email: ".$row_usuario['email']."<br/><hr/>";
}

?>

</pre>
</body>
</html>
