<?php
namespace Classes;

        //Especificando a classe
    class Usuario{ 

        //Atributo(s) da classe
        private $customizacao;
    
        public function __construct(){
            $this -> pedido = new Pedido(null, null);
        }
        
        //Método GET
        public function getCustom() {
            return $this -> customizacao;
        }

        //Método SET
        public function setCustom($newCustom) {
            $this -> customizacao = $newCustom;
        }

        public function customizar(){
            $customizar = $this -> pedido -> produto -> lanche -> ingredient;
        }
    }
?>