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

        public function __construct($nome, $valor, $desconto, $marca, $tamanho) {
            $this -> nome = $nome;
            $this -> valor = $valor;
            $this -> desconto = $desconto;
            $this -> marca = $marca;
            $this -> tamanho = $tamanho;
        }

        public function __toString() {
            return "- Informações da Bebida - <br /> 
                    Nome: ". $this -> getNome(). "<br /> 
                    Valor: R$". $this -> __Valor(). "<br />
                    Desconto: ". $this -> getDesconto(). "<br />
                    Marca: ". $this -> getMarca(). "<br />
                    Tamanho: ". $this -> tamanho; 
        }
    }
?>