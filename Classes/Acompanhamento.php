<?php
    namespace Classes;

        //Especificando a classe
    class Acompanhamento extends Produto {
            //Atributo da classe
        private $tamanho;

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