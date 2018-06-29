<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 04/02/2018
 * Time: 13:02
 */

abstract class Pessoa{

    protected $nome;

    public function __construct($nome){
        $this->setNome($nome);
    }
    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
}