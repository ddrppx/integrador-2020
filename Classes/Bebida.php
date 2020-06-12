<?php
    namespace Classes;

        //Especificando a classe
    class Bebida extends Produto {
        
            //Atributos da classe
        private $marca;
        private $tamanho;

            //Metodo GET
        public function getMarca() {
            return $this -> marca;
        }

            //Metodo SET
        public function setMarca($newM) {
            $this -> marca = $newM;
        }

            //Metodo GET
        public function getTamanho() {
            return $this -> tamanho;
        }
            //Metodo SET
        public function setTamanho($tam) {
            $this -> tamanho = $tam;
        }
    }
?>