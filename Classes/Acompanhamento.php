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

        public function __construct($nome, $valor, $desconto, $tamanho) {
            $this -> nome = $nome;
            $this -> valor = $valor;
            $this -> desconto = $desconto;
            $this -> tamanho = $tamanho;
        }

        public function __toString() {
            return "- Informações da Bebida - <br /> 
            Nome: ". $this -> getNome(). "<br /> 
            Valor: R$". $this -> __Valor(). "<br />
            Desconto: ". $this -> getDesconto(). "<br />
            Tamanho: ". $this -> tamanho; 
        }
    }
?>