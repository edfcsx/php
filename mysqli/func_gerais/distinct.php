<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Distinct DBA</title>
</head>
<body>
<pre>


<?php
/**
Utilizando a função distinct que retorna  valores distintos não os repete
 */
require_once 'conexao.php';

$result_usuario = "SELECT DISTINCT email FROM usuarios";
$resultado_usuario = mysqli_query($conn,$result_usuario);

while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "Email: ".$row_usuario['email']."<br/><hr/>";
}


?>

</pre>
</body>
</html>
