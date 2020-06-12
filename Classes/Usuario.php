<?php
namespace Classes;

        //Especificando a classe
    class Usuario{ 

        //Atributo(s) da classe
        private $customizacao;
    
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