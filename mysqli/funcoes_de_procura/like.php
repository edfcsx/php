<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LIKE DBA</title>
</head>
<body>
<pre>


<?php
/**
O operador like é usado em uma clausula where para pesquisar um padrão especifico em uma coluna;
 * mysqli_affected_rows() verifica se alguma linha do banco foi afetada.
 * o % diz que pode ter texto texto inicio-> %a% -< texto no final;
 **/
require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios WHERE email LIKE '%gmail%'";
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
