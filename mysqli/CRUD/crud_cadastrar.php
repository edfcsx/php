<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <title>CRUD CADASTRAR DBA</title>
</head>
<body>
<h1>Cadastrar Usuario</h1>

<form method="POST" action="crud_cadastrar_final.php">

    <label for="inome">Nome:</label><input type="text" required name="nome" id="inome" size="40"/>
    <br/><br/>
    <label for="iemail">E-mail:</label><input type="email" required name="email" id="iemail" size="40"/>
    <br/><br/>
    <input type="submit" value="cadastrar"/>

</form>

<a href="crud_listar.php">Listar</a>

<?php
/**
CRUD = CREATE - READ - UPDATE - DELETE
 **/
if(isset($_SESSION['msg'])){
    echo "<p>".$_SESSION['msg']."</p>";
    unset($_SESSION['msg']);
}

?>

</body>
</html>
