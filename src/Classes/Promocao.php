<?php 
    namespace Classes;

        //Especificando a classe
    class Promocao { 
            //Atributos da classe
        public $nome;
        public $desconto;

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
        public function setDesconto($newM) {
            $this -> desconto = $newM;
        }
            //Método construtor
        public function __construct($nome, $desconto) {
            $this -> nome = $nome;
            $this -> desconto = $desconto;
        }

            //Metodo toString
        public function __toString() {
            return "- Promoção -<br />
                    Nome: ". $this -> getNome(). "<br />
                    Desconto: ". $this -> getDesconto()."%";
        }
    }
?>