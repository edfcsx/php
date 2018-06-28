<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD LISTAR DBA</title>
</head>
<body>
<pre>
    <a href="crud_cadastrar.php">Cadastrar</a>
<?php
/**
CRUD = CREATE - READ - UPDATE - DELETE
 **/
require_once 'conexao.php';
echo "<h3>Lista de usuários</h3>";

if(isset($_SESSION['msg'])){
    echo "<p>".$_SESSION['msg']."</p>";
    unset($_SESSION['msg']);
}

$result_qtd_user = "SELECT COUNT(id) AS qtd_usuarios FROM usuarios";
$resultado_qtd_user = mysqli_query($conn,$result_qtd_user);
$row_qtd_user = mysqli_fetch_assoc($resultado_qtd_user);
echo "<h4>Quantidade de Usuarios: ".$row_qtd_user['qtd_usuarios']."</h4>";

$result_usuario = "SELECT user. *,
sit.nome nome_sit,
nivac.nome nome_niv,
user.nome nome_user
FROM usuarios AS user
INNER JOIN situacoes sit ON sit.id = user.situacao_id
INNER JOIN niveis_acessos nivac ON nivac.id = user.niveis_acesso_id ORDER BY id ASC";
$resultado_usuario = mysqli_query($conn,$result_usuario);
while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    echo "ID: ".$row_usuario['id']."<br/>";
    echo "Nome: ".$row_usuario['nome_user']."<br/>";
    echo "Email: ".$row_usuario['email']."<br/>";
    echo "Situação : ".$row_usuario['nome_sit']."<br/>";
    echo "Nivel de Acesso: ".$row_usuario['nome_niv']."<br/>";
    echo "<a href='crud_editar.php?id=".$row_usuario['id']."'>Editar</a><br/>";
    echo "<a href='crud_apagar.php?id=".$row_usuario['id']."'>Apagar</a><hr/>";
}
?>
</pre>
</body>
</html>
