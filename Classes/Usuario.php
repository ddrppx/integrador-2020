<?php
namespace Classes;

    class Usuario{
        private $customizacao;
    
        public function getCustom() {
            return $this -> customizacao;
        }

        public function setCustom($newCustom) {
            $this -> customizacao = $newCustom;
        }
    }
?>