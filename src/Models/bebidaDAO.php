<?php
    namespace Models;
    use Classes\Bebida;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class bebidaDAO {
       
        public function create(Bebida $bebida) {
            try {
                    //Comando SQL
                $sql = 'INSERT INTO bebida (nome, marca, valor, tamanho) VALUES (?, ?, ?, ?)';
                    //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);

                    //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $bebida -> getNome(),PDO::PARAM_STR);
                $stmt -> bindValue(2, $bebida -> getMarca(), PDO::PARAM_STR);
                $stmt -> bindValue(3, $bebida -> getValor());
                $stmt -> bindValue(4, $bebida -> getTamanho(), PDO::PARAM_STR);
                    //Executa com os valores agregados
                $stmt -> execute();
            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function read() {
                //Comando SQL
            $sql = 'SELECT id, nome, marca, valor, tamanho, imagem FROM bebida';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            return $resultado;
        }

        public function readValor(int $id) {
                //Comando SQL
            $sql = 'SELECT valor FROM bebida WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
                //Retorno da variavel
            return $resultado;
        }
        
            public function readShowAll() {
                $rows = $this -> read();
        
                foreach ($rows as $row){
                    $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$row['imagem'];
                    echo '
                        <div class="card mb-1 mt-1 col-6 col-sm-4 col-md-3 itemHover" onclick="escolherProduto(\'add\','.$row['id'].')">
                            <img class="card-img-top mb-2" src="'.$imgPath.'" height="110px" width="110px" alt="Imagem do produto">
                            <div class="card-body">
                            <h6 class="card-text text-justify h6">'.$row['nome']. ' ' . $row['marca'].'</br>'. $row['tamanho'].'
                            <p class="card-text justify-content text-right h6"> R$'.number_format($row['valor'], 2).'</p>
                            </div>
                        </div>';
                    }
            }

        public function readID(int $id) {
            //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT id, nome, marca, valor, tamanho, imagem FROM bebida WHERE id = ?';
            //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
                //Retorno da variavel
                // return $resultado;
            return $resultado;
    }

    public function readWhereOutput(int $id, int $qtd) {
        $row = $this -> readID($id);
        $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$row['imagem'];
        echo '
            <div class="card mb-1 mt-1 col-6 col-sm-4 col-md-3 cartHover">
                <img class="card-img-top mb-2" src="'.$imgPath.'" height="110px" width="110px" alt="Imagem do produto">
                <div class="card-body">
                    <p class="card-text text-left h6">'.$row['nome']. ' ' . $row['marca'].'</br>'. $row['tamanho'].'</p>
                    <p class="card-text text-right h5 bottomCart">x'.$qtd.'</p>

                    <div class="text-left remover">

                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus btn-success rounded" onclick="aumentarQtd(2,'.$row['id'].')" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                        <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                        </svg>
                    
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-dash btn-info rounded" onclick="diminuirQtd(2, '.$row['id'].')" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                        
                        <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x btn-danger rounded" fill="currentColor" onclick="removerProd(2, '.$row['id'].')" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                            <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                        </svg>
                    
                    </div>
                </div>
            </div>
        ';
    }

        public function update(int $id, Bebida $bebida) {
                //Comando SQL
            $sql = 'UPDATE bebida SET nome = ?, marca = ?, valor = ?, tamanho = ? WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $bebida -> getNome(),PDO::PARAM_STR);
                $stmt -> bindValue(2, $bebida -> getMarca(), PDO::PARAM_STR);
                $stmt -> bindValue(3, $bebida -> getValor());
                $stmt -> bindValue(4, $bebida -> getTamanho(), PDO::PARAM_STR);
                $stmt -> bindValue(5, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End update.";
        }

        public function delete(int $id) {
                //Comando SQL
            $sql = 'DELETE FROM bebida WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End delete.";
        }

    }
?>