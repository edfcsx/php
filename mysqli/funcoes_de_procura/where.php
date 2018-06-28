<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Where DBA</title>
</head>
<body>
<pre>


<?php
/**
Ela é usada para extrair apenas os registros que satisfaçam um criterio especifico
 **/
require_once 'conexao.php';

$result_usuario = "SELECT id,nome,email,situacao_id FROM usuarios WHERE situacao_id=1";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome']."<br/>";
    echo "Email: ".$row_usuario['email']."<br/>";
    echo "Situação: ".$row_usuario['situacao_id']."<br/><hr/>";
}
?>

</pre>
</body>
</html>
