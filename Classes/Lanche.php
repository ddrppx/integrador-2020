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
        public function remIngredient() {
            $this -> getIngredient();

            echo "Em qual índice está o valor à ser deletado? <br />";
            unset ( $this -> ingredient[1] );
        }

            //Percorre e exibe o array
        public function getIngredient() {
            $arrIng = $this -> ingredient;
            foreach ($arrIng as $value) {
                echo $valor."<br />";
            }            
        }

        public function setIngredient() {
            
        }
    }
?>