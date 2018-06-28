<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>BETWEEN DBA</title>
</head>
<body>
<pre>

<?php
/**
O operador Between e utilizado para selecionar valores dentro de um intervalo.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios WHERE id BETWEEN 1 AND 3";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome']."<br/><hr/>";
}

?>

</pre>
</body>
</html>
