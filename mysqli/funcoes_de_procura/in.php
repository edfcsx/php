<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>IN DBA</title>
</head>
<body>
<pre>

<?php
/**
O operador IN permite especificar vários valores em uma clausula where.
 * O operador in é uma abreviatura para multiplas condições OR.
 * mysqli_affected_rows() verifica se alguma linha do banco foi afetada.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios WHERE niveis_acesso_id IN (1,2)";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome']."<br/>";
    echo "Nivel de acesso: ".$row_usuario['niveis_acesso_id']."<br/><hr/>";
}


?>

</pre>
</body>
</html>
