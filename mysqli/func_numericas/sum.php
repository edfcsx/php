<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>SUM DBA</title>
</head>
<body>
<pre>
<?php
/**
A função SUM retorna a soma total de uma coluna numerica.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT SUM(quantidade_acessos) AS qtd FROM usuarios WHERE situacao_id = '1' AND niveis_acesso_id = '3'";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
echo "A soma total dos acessos é : ".(int)$row_usuario['qtd']."<br/>";

?>
</pre>
</body>
</html>
