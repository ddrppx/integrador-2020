<?php
    namespace Classes;
        //Especificando a classe
    class Lanche extends Produto { // Extends = Herança
            //Atributo ingrediente é um Array
        private $ingredient = array();

            //Adiciona um item ao Array
        public function addIngredient($add) {
            $this -> ingredient[] = $add;
        }

            //Remove um item do Array
        public function remIngredient($pos) {
            $this -> getIngredient(); //Mostra os itens do array

            $tmpIng = $this -> ingredient[$pos]. "foi retirado.";

            unset($this -> ingredient[$pos]);

            echo "<br />". $tmpIng;
        }

            //Percorre e exibe o array
        public function getIngredient() {
            
            $arrIng = $this -> ingredient;
            
            foreach ($arrIng as $value) {
                echo $value."<br />";
            }            
        }
            //Mudança em um elemento do array
        public function setIngredient($pos, $valor) {
                //Percorre o array
            for($i = 0; $i < count($this->ingredient); $i++ ){
                //Verifica se a var é igual à posicao no array
                if($i == $pos){
                        //Deleta o valor na posicao
                    unset($this -> ingredient[$pos]);
                        //Insere o novo valor na posicao
                    array_splice($this -> ingredient, $pos, 0, $valor);
                }
            }
        }
            //Método construtor
        public function __construct($nome, $valor, $desconto, $ingredient) {
            $this -> nome = $nome;
            $this -> valor = $valor;
            $this -> desconto = $desconto;
            $this -> ingredient[] = $ingredient;
        }

        public function __toString() {
            return "-- Lanche -- <br />
            Nome: ". $this -> getNome(). "<br />
            Valor: ". $this -> getValor(). "<br />
            Desconto: ". $this -> getDesconto(). "<br />
            Ingredientes: ". $this -> getIngredient();                
        }
    }
?>