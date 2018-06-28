<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Order By DBA</title>
</head>
<body>
<pre>


<?php
/**
Order by é utilizado para classificar o resultado por uma ou mais colunas
 Asc = Crescente Desc = Decrescente
 **/
require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios ORDER BY nome ASC";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome']."<br/>";
    echo "Email: ".$row_usuario['email']."<br/><hr/>";
}

?>

</pre>
</body>
</html>
