<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>ALIASES DBA</title>
</head>
<body>
<pre>
<?php
/**
Alias SQL são usados para fornecer para a tabela, ou coluna, um nome temporario.
 * Os alias são frequentemente usados para tornar os nomes das colunas mais legiveis.
 * Um alias só existe durante a duração da consulta.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT id AS id_usuario, nome AS nome_usuario FROM usuarios";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while ($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id_usuario']."<br/>";
    echo "Nome: ".$row_usuario['nome_usuario']."<br/><hr/>";
}
?>
</pre>
</body>
</html>
