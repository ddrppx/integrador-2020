<?php
namespace Classes;

    class Pedido {
        private $hora;
        private $modoPreparo;
        private $metodoPagamento;
        private $valorT;
        
        public function getHora() {
            return $this -> hora;
        }
        
        public function getModoPreparo() {
            return $this -> modoPreparo;
        }
        
        public function setModoPreparo($mp) {
            $this -> modoPreparo = $mp;
        }
        
        public function getMetodoPagamento() {
            return $this -> metodoPagamento;
        }
        
        public function setMetodoPagamento($mp2) {
            $this -> metodoPagamento = $mp2;
        }
        
    }
?>