<?php
namespace Classes;

        //Especificando a classe
    class Usuario{ 

        //Atributo(s) da classe
        private $customizacao = array();
    
        public function __construct($cst) {
            $this -> customizacao = $cst;
        }
        
        //Método GET
        public function getCustom() {
            return $this -> customizacao;
        }

        //Método SET
        public function setCustom($newCustom) {
            $this -> customizacao = $newCustom;
        }
    }
?>