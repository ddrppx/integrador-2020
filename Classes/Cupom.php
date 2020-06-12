<?php 
    namespace Classes;

        //Especificando a classe
    class Cupom {
            //Atributos da classe
        private $codigo;
        private $desconto;

            //Metodo GET
        public function getCodigo() {
            return $this -> codigo;
        }
            //Metodo SET
        public function setCodigo($newC) {
            $this -> codigo = $newM;
        }
            //Metodo GET
        public function getDesconto() {
            return $this -> desconto;
        }   
            //Metodo SET
        public function setDesconto($newD) {
            $this -> marca = $newM;
        }
    }
?>