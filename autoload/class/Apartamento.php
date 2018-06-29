<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 04/02/2018
 * Time: 12:26
 */

class Apartamento{

    private $num;

    public function __construct($num){
        $this->setNum($num);
    }

    public function getNum(){
        return $this->num;
    }
    private function setNum($num){
        $this->num = $num;
    }

}