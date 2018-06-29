<?php
/**
 * Created by PhpStorm.
 * User: Eduardo Cipriano
 * Date: 04/02/2018
 * Time: 12:37
 */
require_once 'VisitasInterface.php';
class Visitas implements VisitasInterface {

   private $apartamento,$visitante,$funcionario;

   public function __construct($apartamento,$visitante,$funcionario){

       $this->setApartamento($apartamento);
       $this->setVisitante($visitante);
       $this->setFuncionario($funcionario);
       }


    public function getApartamento()
    {
        return $this->apartamento;
    }
    public function getVisitante()
    {
        return $this->visitante;
    }
    public function getFuncionario(){
        return $this->funcionario;
    }
    private function setApartamento($apartamento){
        $this->apartamento = $apartamento;
    }
    private function setVisitante($visitante){
        $this->visitante = $visitante;
    }
    private function setFuncionario($funcionario){
        $this->funcionario = $funcionario;
    }

    public function agendar(){
        echo "Agendamento de Visita<br/>";
        echo "Apartamento numero: ".$this->apartamento->getNum()."<br/>";
        echo "Visitante: ".$this->visitante->getNome()."<br/>";
        echo "Autorizado pelo func. ".$this->funcionario->getNome()."<br/>";
    }
}