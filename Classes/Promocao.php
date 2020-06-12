<?php 
    namespace Classes;

        //Especificando a classe
    class Promocao { 
            //Atributos da classe
        private $nome;
        private $desconto;

            //Método GET
        public function getNome() {
            return $this -> nome;
        }
            //Método SET
        public function setNome($nome) {
            $this -> nome = $nome;
        }

            //Método GET
        public function getDesconto() {
            return $this -> desconto;
        }

            //Método SET
        public function setDesconto($newD) {
            $this -> marca = $newM;
        }
    }
?>