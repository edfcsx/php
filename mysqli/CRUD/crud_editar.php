<?php
session_start();
$id = filter_input(INPUT_GET,'id',FILTER_SANITIZE_NUMBER_INT);
require_once 'conexao.php';

$result_usuario = "SELECT * FROM usuarios WHERE id='$id' LIMIT 1";
$resultado_usuario = mysqli_query($conn,$result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD EDITAR DBA</title>
</head>
<body>
    <h1>Editar Usuario</h1>
    <a href="crud_listar.php">Listar</a>
<?php
    if(isset($_SESSION['msg'])){
    echo "<p>".$_SESSION['msg']."</p>";
    unset($_SESSION['msg']);
}
?>
    <form method="POST" action="crud_editar_final.php">

        <label for="inome">Nome:</label>
        <input type="text" required name="nome" id="inome" size="40" value="<?php echo $row_usuario['nome'];?>"/>
        <br/><br/>
        <label for="iemail">E-mail:</label>
        <input type="email" required name="email" id="iemail" size="40" value="<?php echo $row_usuario['email'];?>"/>
        <br/><br/>
        <input type="hidden" name="id" value="<?php echo $row_usuario['id'];?>"/>
        <input type="submit" value="editar"/>

    </form>
</body>
</html>
