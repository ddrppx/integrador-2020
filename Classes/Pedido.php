<?php
namespace Classes;

        //Especificando a classe
    class Pedido {

            //Atributos da classe
        public $hora;
        public $modoPreparo;
        public $metodoPagamento;
        public $valorT;
        public $produtos;
        public $cupom;
        
            //Método GET
        public function getHora() {
            return $this -> hora;
        }
        
            //Método GET
        public function getModoPreparo() {
            return $this -> modoPreparo;
        }
            //Método SET
        public function setModoPreparo($mp) {
            $this -> modoPreparo = $mp;
        }
        
            //Traduz o atributo de boolean para String
        public function __ModoPreparo() {
            if ($this -> getModoPreparo() == 0) {
                return "Comer no estabelecimento";
            } else if ($this -> getModoPreparo() == 1) {
                return "Para viagem";
            } else {
                return "Opção inválida";
            }
        }

            //Traduz o atributo de boolean para String
        public function __MetodoPagamento() {
            if ($this -> getMetodoPagamento() == 0) {
                return "Cartão";
            } else if ($this -> getMetodoPagamento() == 1) {
                return "Dinheiro";
            } else {
                return "Opção inválida";
            }
        }

            //Método GET
        public function getMetodoPagamento() {
            return $this -> metodoPagamento;
        }
        
            //Método SET
        public function setMetodoPagamento($mp2) {
            $this -> metodoPagamento = $mp2;
        }

            //Metodo construtor
        public function __construct($modoP, $metodoP) {
            $this -> hora = date('m/d/Y h:i:s a', time()); //Receberá a hora atual
            $this -> modoPreparo = $modoP;
            $this -> metodoPagamento = $metodoP;
            $this -> cupom;
            $this -> produtos = array();
        }

            //Método toString
        public function __toString() {
            return "----- Pedido -----<br />
            Hora: ". $this -> getHora(). "<br />
            Modo de Preparo: ". $this -> __ModoPreparo(). "<br />
            Metodo de Pagamento: ". $this -> __MetodoPagamento(). "<br />
            ". $this -> getProdutos(). "<br />
            Valor total: R$". $this -> valorTotal();
        }
            //Adiciona um item/produto à lista de itens do pedido
        public function addProduto($produto){
            array_push($this -> produtos, $produto);
        }

        public function getProdutos() {
            $prodInput = $this -> produtos; //Recebe a listagem dos produtos 
            $strOutput= "Items no pedido: <br />"; //Variavel com formatacao de string
            foreach ($prodInput as $prodOutput) {
                $strOutput .= $prodOutput. "<br />";
            }
            return $strOutput;
        }

        public function valorTotal(){
                //Products recebe os itens de $produto(Todos itens do pedido)
            $somaProdutos = 0; //Inicializa a variavel
            for($i = 0; $i < count($this -> produtos); $i++){
                $somaProdutos += $this -> produtos[$i] -> __valorTotal() ; //Percorre o array e soma na variavel à cada loop
            }

                //Desconto do cupom(se houver)
            if (isset($this -> cupom)) {
                print "Cupom flag.";
                $cupom = $this -> cupom;
                $somaProdutos = $somaProdutos - ($somaProdutos * ($cupom -> getDesconto() / 100));
            }

                //Retorna valor descontado
            return $somaProdutos;
        }

        public function customizar($lanche) {
            $ingLista = $lanche -> ingredient; //Recebe o array de ingredientes do lanche

            $custLista = array_flip($ingLista);
            foreach($ingLista as $list){
                echo $list. "<br />";
            }

            print_r($custLista);
        }

            //Insere o cupom junto com seu desconto.
        public function insCupom($cupom) {
            $this -> cupom = $cupom;
        }

            //Remove o cupom
        public function remCupom(){
            $this -> cupom = null;
        }
  
        public function AnyTest() {
           
        }

    }
?>