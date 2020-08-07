<?php
    namespace Classes;

        //Especificando a classe
    class Bebida extends Produto {
        
            //Atributos da classe
        public $marca;
        public $tamanho;

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

        // public function __construct($id, $nome, $valor, $marca, $tamanho) {
        //     $this -> id = $id;
        //     $this -> nome = $nome;
        //     $this -> valor = $valor;
        //     $this -> marca = $marca;
        //     $this -> tamanho = $tamanho;
        // }

        public function __toString() {
            return "- Bebida -<br /> 
                    Nome: ". $this -> getNome(). "<br /> 
                    Valor: R$". $this -> getValor(). "<br />
                    Desconto: ". $this -> getDesconto(). "%<br />
                    Marca: ". $this -> getMarca(). "<br />
                    Tamanho: ". $this -> getTamanho(). "<br />
                    Valor Total: R$". $this -> __ValorTotal();
        }
    }
?>