<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Limit DBA</title>
</head>
<body>
<pre>


<?php
/**
Limit é uma cláusula de limite que é usado para especificar o número de registros a serem
 * retornados.
 */
require_once 'conexao.php';

$result_usuario = "SELECT id,nome,email FROM usuarios LIMIT 3";
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
