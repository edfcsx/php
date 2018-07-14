<?php
class Conexao{
    
    public static $host = 'localhost';
    public static $dbname = 'treino';
    public static $user = 'root';
    public static $pass = '';

    private static $connect = null;

    private static function conectar(){
        try{
            if (self::$connect == null){
                self::$connect = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname.';charset=utf8', self::$user,self::$pass);
            }
        }catch (PDOException $e){
            echo 'Não foi possivel conectar ao banco ', $e->getMessage();
            die();
        }
        self::$connect->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND,'SET NAMES utf8');
        self::$connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return self::$connect;
    }

    function getConexao(){
        return self::conectar();
    }

}

