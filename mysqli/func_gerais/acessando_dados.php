<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Acessando DBA</title>
</head>
<body>
<pre>


<?php
/**
 Acessando dados no banco de dados.
 */

require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios";
$resultado_usuario = mysqli_query($conn,$result_usuario);
echo "<h4>Tabela usuarios</h4><br/>";
while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    //print_r($row_usuario);
    echo "ID: ".$row_usuario['id'].'<br/>';
    echo "Nome: ".$row_usuario['nome'].'<br/>';
    echo "Email: ".$row_usuario['email'].'<br/><hr/>';
}
$result_situacao = "SELECT * FROM situacoes";
$resultado_situacao = mysqli_query($conn,$result_situacao);
echo "<h4>Tabela situacao</h4><br/>";
while($row_situacao = mysqli_fetch_assoc($resultado_situacao)){
    echo "ID: ".$row_situacao['id'].'<br/>';
    echo "Situação: ".$row_situacao['nome'].'<br/><hr/>';
}
$result_niveis = "SELECT * FROM niveis_acessos";
$resultado_niveis = mysqli_query($conn,$result_niveis);
echo "<h4>Tabela niveis de acesso</h4><br/>";
while($row_niveis = mysqli_fetch_assoc($resultado_niveis)){
    echo "ID: ".$row_niveis['id'].'<br/>';
    echo "Nivel: ".$row_niveis['nome'].'<br/><hr/>';
}
?>

</pre>
</body>
</html>
