<?php

$servidor = "127.0.0.1";
$usuario = "root";
$senha = "";
$dbname = "celkee";

$conn = mysqli_connect($servidor,$usuario,$senha,$dbname);

if(!$conn){
    die("Fala na oonexão<br/>".mysqli_connect_error());
}
else{

}