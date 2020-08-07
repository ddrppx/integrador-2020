<?php
    namespace Classes;
        
        //Especificando a classe
    abstract class Produto { //É uma classe abstrar mais ainda nao foi implementada, ficaria 'abstract class Produto'
        
            //Atributos da classe
        public $id;
        public $nome;
        public $valor;
        public $desconto;
        public $quantidade;
        public $promocao;

            //Método GET
        public function getId() {
            return $this -> id;
        }
        
            //Método SET
        public function setId($id) {
            $this -> id = $id;
        }
            //retorna o ID com a classe atual
        public function idReturn() {
            $array = array(get_class($this) => $this -> id);
            return $array;
        }
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
            return number_format($this -> valor, 2);
        }

            //Método SET
        public function setValor($valor) {
            $this -> valor = $valor;
        }
            //Método GET
        public function getQtd() {
            return $this -> quantidade;
        }

            //Método SET
        public function setQtd($qtd) {
            $this -> quantidade = $qtd;
        }

            //Método GET
        public function getDesconto() {
            if ($this -> promocao == !null){
                return $this -> promocao -> getDesconto();
            } else {
                return 0;
            }
        }
        
            //Método SET
        public function setDesconto($desc) {
            $this -> desconto = $desc;
        }

        public function __ValorTotal() {
                //Checa se há uma promocao no item 
            //  if ($this -> getDesconto() == false){

                    //Armazena o valor do produto
                $valor = $this -> getValor(); 

                    //Armazena o valor desconto da classe promocao
                $desc = $this -> getDesconto(); 

                    //Desconta o valor atual
                $valorT = $valor - ($valor * ($desc / 100)); 

                return number_format($valorT, 2);
                    //Retorna o valor formatado em duas casas decimais
        }

            //Método construtor
        // public function __construct($nome, $valor) {
        //     $this -> nome = $nome;
        //     $this -> valor = $valor;
        //     $this -> promocao;
        // }
            //Adiciona uma promocao ao item
        public function addPromocao($promocao) {
            $this -> promocao = $promocao;
            // $this -> desconto = $promocao -> getDesconto();
        }

        public function remPromocao(){
            $this -> promocao = null;
        }

        public function getPromocao(){
            return $this -> promocao;
        }

            //Método toString
        public function __toString() {
            return "-- Informações do Produto --<br />
                    Nome: ". $this -> getNome(). "<br />
                    Valor: R$". $this -> getValor(). "<br />
                    Desconto: ". $this -> getDesconto(). "%<br />
                    Valor Total: R$". $this -> __ValorTotal();
        }   
    }
?>