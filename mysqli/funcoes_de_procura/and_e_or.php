<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>And & Or DBA</title>
</head>
<body>
<pre>


<?php
/**
O AND(e) & OR(ou) operadores são usados para filtrar registros em mais de uma condição.
 **/
require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios WHERE situacao_id=1 AND niveis_acesso_id=1 OR niveis_acesso_id=2";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){

    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome']."<br/>";
    echo "Ativo ? ".$row_usuario['situacao_id']."<br/>";
    echo "Função: ".$row_usuario['niveis_acesso_id']."<br/><hr/>";
}

?>

</pre>
</body>
</html>
