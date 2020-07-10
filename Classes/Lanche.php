<?php
    namespace Classes;
        //Especificando a classe
    class Lanche extends Produto { // Extends = Herança
            //Atributo ingrediente é um Array
        public $ingredient;
        public $recipe;
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
        public function getIngredientString() {

            $output = ""; //Inicia a string à ser adicionada valores
            $arrayInput = $this -> ingredient; //var recebe o array

            for ($i = 0; $i < count($arrayInput); $i++){
                $i > 0 ? $output .= ", ": $output .= ""; //adiciona pontuação à listagem
                $output .= $arrayInput[$i];
            }
            $output .= ".";
            return $output; //Retorna o array formatado
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

        public function addRecipe(){

        }

        public function getIngredient() {
            return $this -> ingredient;
        }

        public function getRecipe() {
            return $this -> recipe;
        }
        public function getRecipeString() {

            $output = ""; //Inicia a string à ser adicionada valores
            $arrayInput = $this -> ingredient; //var recebe o array
            $recipeInput = $this -> recipe;

            for ($i = 0; $i < count($arrayInput); $i++){
                $i > 0 ? $output .= ", ": $output .= ""; //adiciona pontuação à listagem
                $output .= $arrayInput[$i]. ": ". $recipeInput[$i];
            }
            $output .= ".";
            return $output; //Retorna o array formatado
        }

            //Retorna somente um valor do array receita
        public function getUniqueRecipe($pos) {
            return $this -> recipe[$pos];
        }

            //Retorna somente um valor do array Ingrediente
        public function getUniqueIngredient($pos) {
            return $this -> ingredient[$pos];
        }

            //Método construtor
        public function __construct($nome, $valor, $ingredient, $recipe) {
            $this -> nome = $nome;
            $this -> valor = $valor;
            $this -> ingredient = $ingredient;
            $this -> recipe = $recipe;
        }

        public function __toString() {
            return "- Lanche -<br />
            Nome: ". $this -> getNome(). "<br />
            Valor: R$". $this -> __ValorTotal(). "<br />
            Desconto: ". $this -> getDesconto(). "%<br />
            Ingredientes: ". $this -> getIngredient();                
        }
    }
?>