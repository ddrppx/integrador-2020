<?php
    namespace Classes;

    class Produto {
        private $nome;
        private $valor;
        private $desconto;

        public function getNome() {
            return $this -> nome;
        }
        
        public function setNome($nome) {
            $this -> nome = $nome;
        }

        public function getValor() {
            return $this -> valor;
        }
        
        public function setValor($valor) {
            $this -> valor = $valor;
        }

        public function getDesconto() {
            return $this -> desconto;
        }
        
        public function setDesconto($desc) {
            $this -> modoPreparo = $desc;
        }
    }
?>