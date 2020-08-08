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
            $sql = 'SELECT * FROM bebida';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            return $resultado;
        }

        public function readId(int $id) {
                //Comando SQL
            $sql = 'SELECT * FROM bebida WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            return $resultado;
        }

        public function read_show() {
            $rows = $this -> read();

            foreach ($rows as $row){
                    echo '
                    <div class="card mb-1 mt-1 col-6 col-sm-4 col-md-3">
                        <img class="card-img-top mb-0" src="../static/svg/segment/bebidas.svg" height="110px" width="110px" alt="Card image cap">
                        <div class="card-body">
                            <h6 class="card-text text-left h6">'.$row['nome']. ' ' . $row['marca'].'</br>'. $row['tamanho'].'
                            <p class="card-text justify-content text-right h6"> R$'.$row['valor'].'</p>
                        </div>
                     </div>';
            }
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