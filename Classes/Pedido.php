<?php
namespace Classes;

        //Especificando a classe
    class Pedido {

            //Atributos da classe
        private $hora;
        private $modoPreparo;
        private $metodoPagamento;
        private $valorT;
        
            //Método GET
        public function getHora() {
            return $this -> hora;
        }
        
            //Método GET
        public function getModoPreparo() {
            return $this -> modoPreparo;
        }
            //Método SET
        public function setModoPreparo($mp) {
            $this -> modoPreparo = $mp;
        }
        
            //Traduz o atributo de boolean para String
        public function __ModoPreparo() {
            if ($this -> getModoPreparo() == 0) {
                return "Comer no estabelecimento";
            } else if ($this -> getModoPreparo() == 1) {
                return "Para viagem";
            } else {
                return "Opção inválida";
            }
        }

            //Traduz o atributo de boolean para String
        public function __MetodoPagamento() {
            if ($this -> getMetodoPagamento() == 0) {
                return "Cartão";
            } else if ($this -> getMetodoPagamento() == 1) {
                return "Dinheiro";
            } else {
                return "Opção inválida";
            }
        }

            //Método GET
        public function getMetodoPagamento() {
            return $this -> metodoPagamento;
        }
        
            //Método SET
        public function setMetodoPagamento($mp2) {
            $this -> metodoPagamento = $mp2;
        }

            //Metodo construtor
        public function __construct($modoP, $metodoP) {
            $this -> hora = date('m/d/Y h:i:s a', time()); //Receberá a hora atual
            $this -> modoPreparo = $modoP;
            $this -> metodoPagamento = $metodoP;
        }

            //Método toString
        public function __toString() {
            return "-- Informações do Pedido --<br />
            Hora: ". $this -> getHora(). "<br />
            Modo de Preparo: ". $this -> __ModoPreparo(). "<br />
            Metodo de Pagamento: ". $this -> __MetodoPagamento();
        }
    }
?>