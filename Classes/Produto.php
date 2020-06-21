<?php
    namespace Classes;
        
        //Especificando a classe
    class Produto { //É uma classe abstrar mais ainda nao foi implementada, ficaria 'abstract class Produto'
        
            //Atributos da classe
        private $nome;
        private $valor;
        private $desconto;
        private $promocao;

            //Método GET
        public function getNome() {
            return $this -> nome;
        }
        
            //Método SET
        public function setNome($nome) {
            $this -> nome = $nome;
        }

            //Método GET
        public function getValor() {
            return $this -> valor;
        }

            //Método SET
        public function setValor($valor) {
            $this -> valor = $valor;
        }

            //Método GET
        public function getDesconto() {
            return $this -> desconto;
        }
        
            //Método SET
        public function setDesconto($desc) {
            $this -> desconto = $desc;
        }
            //Realiza o calculo do valor total descontado
        public function valorTotal() {
            return  $this -> getValor() - ($this -> getValor() * ($this -> getDesconto()/100));
        }

        public function __Valor() {
            //Checa se o número é flutuante
            if (is_float($this -> getValor())){
                //Realiza a formatação do numero com 2 casa decimais após a virgula
            return number_format($this -> getValor(), 2);
        } else {
                //Se valores não forem flutuantes
            return "NaN";
            }
        }

        public function __ValorTotal() {
            //Checa se o numero é flutuante
            if (is_float($this -> getValor())){
                    //Realiza a formatação do numero com 2 casa decimais após a virgula
                return number_format($this -> ValorTotal(), 2);
            } else {
                //Se valores não forem flutuantes
                return "NaN";
            }
        }

            //Método construtor
        public function __construct($nome, $valor, $desconto) {
            $this -> nome = $nome;
            $this -> valor = $valor;
            $this -> desconto = $desconto;
        }
            //Adiciona uma promocao ao item
        public function addPromocao($promocao) {
            $this -> promocao = $promocao;
        }

        public function remPromocao(){
            $this -> promocao = null;
        }

            //Método toString
        public function __toString() {
            return "-- Informações do Produto --<br />
                    Nome: ". $this -> getNome(). "<br />
                    Valor: R$". $this -> __Valor(). "<br />
                    Desconto: ". $this -> getDesconto(). "%<br />
                    Valor Total: R$". $this -> __ValorTotal();
        }
    }
?>