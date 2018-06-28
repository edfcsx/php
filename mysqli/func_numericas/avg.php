<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AVG DBA</title>
</head>
<body>
<pre>
<?php
/**
A função avg retorna o valor médio de uma coluna númerica;
 **/
require_once 'conexao.php';

$result_usuario = "SELECT AVG (quantidade_acessos) AS qnt_acessos FROM usuarios";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

echo "Media de acessos: ".(int)$row_usuario['qnt_acessos']."<br/>";
?>
</pre>
</body>
</html>
