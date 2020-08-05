<?php
    namespace Classes;

        //Especificando a classe
    class Acompanhamento extends Produto {
            //Atributo da classe
        public $tamanho;

            //Metodo GET
        public function getTamanho() {
            return $this -> tamanho;
        }
        
            //Metodo SET
        public function setTamanho($tam) {
            $this -> tamanho = $tam;
        }

        public function __construct($id, $nome, $valor, $tamanho) {
            $this -> id = $id;
            $this -> nome = $nome;
            $this -> valor = $valor;
            $this -> tamanho = $tamanho;
            $this -> promocao;
        }

        public function __toString() {
            return "- Acompanhamento -<br /> 
            Nome: ". $this -> getNome(). "<br /> 
            Valor: R$". $this -> __ValorTotal(). "<br />
            Desconto: ". $this -> getDesconto(). "%<br />
            Tamanho: ". $this -> getTamanho(); 
        }
    }
?>