<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Update DBA</title>
</head>
<body>
<pre>


<?php
/**
Update é utilizado para atualizar registros em uma tabela.
 * mysqli_affected_rows() verifica se alguma linha do banco foi afetada.
 **/
require_once 'conexao.php';
$user = "Ana";
$result_usuario = "UPDATE usuarios SET situacao_id='2',modified=NOW() WHERE nome='$user' LIMIT 1";
$resultado_usuario = mysqli_query($conn,$result_usuario);

if(mysqli_affected_rows($conn)){
    echo "alterado com sucesso!";
}else{
    echo "erro ao alterar";
}
?>

</pre>
</body>
</html>
