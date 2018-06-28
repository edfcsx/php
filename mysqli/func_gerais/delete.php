<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Delete DBA</title>
</head>
<body>
<pre>


<?php
/**
A instrução delete e utilizado para excluir registros em uma tabela.
 * mysqli_affected_rows() verifica se alguma linha do banco foi afetada.
 **/
require_once 'conexao.php';

$result_usuario = "DELETE FROM usuarios WHERE id='8'";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_affected_rows($conn)){
    echo "Registro excluido com sucesso";
}else{
    echo "Erro ao apagar";
}

?>

</pre>
</body>
</html>
