<?php 
    namespace Classes;

        //Especificando a classe
    class Cupom {
            //Atributos da classe
        private $codigo;
        private $desconto;

            //Metodo GET
        public function getCodigo() {
            return $this -> codigo;
        }
            //Metodo SET
        public function setCodigo($cod) {
            $this -> codigo = $cod;
        }
            //Metodo GET
        public function getDesconto() {
            return $this -> desconto;
        }   
            //Metodo SET
        public function setDesconto($desconto) {
            $this -> marca = $desconto;
        }

            //Metodo Construtor
        public function __construct($codigo, $desconto){
            $this -> codigo = $codigo;
            $this -> desconto = $desconto;
        }

        public function __toString(){
            return "- Cupom -<br />
                    Código: ". $this -> getCodigo(). "<br />
                    Desconto: ". $this -> getDesconto(). "%";
        }
    }
?>