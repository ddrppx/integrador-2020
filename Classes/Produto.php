<?php
    namespace Classes;
        
        //Especificando a classe
    class Produto { //É uma classe abstrar mais ainda nao foi implementada, ficaria 'abstract class Produto'
        
            //Atributos da classe
        private $nome;
        private $valor;
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
        public function getValor() {
            return $this -> valor;
        }

            //Método SET
        public function setValor($valor) {
            $this -> valor = $valor;
        }

            //Método GET
        public function getDesconto() {
            return $this -> desconto;
        }
        
            //Método SET
        public function setDesconto($desc) {
            $this -> modoPreparo = $desc;
        }
    }
?>