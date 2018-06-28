<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Count DBA</title>
</head>
<body>
<pre>
<?php
/**
    A função count retorna o numero de linhas da pesquisa.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT COUNT(id) AS qnt_usuarios FROM usuarios WHERE situacao_id='1'";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);

echo "Quantidade de Usuarios: ".$row_usuario['qnt_usuarios']."<br/>";

?>
</pre>
</body>
</html>
