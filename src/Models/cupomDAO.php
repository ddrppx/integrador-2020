<?php
    namespace Models;
    use Classes\Cupom;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class cupomDAO {
       
        public function create(Cupom $cupom) {
            try {
                    //Comando SQL
                $sql = 'INSERT INTO cupom (codigo, desconto) VALUES (?, ?)';
                    //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);

                    //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $cupom -> getCodigo(),PDO::PARAM_STR);
                $stmt -> bindValue(2, $cupom -> getDesconto(), PDO::PARAM_INT);
                    //Executa com os valores agregados
                $stmt -> execute();
            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function read() {
                //Comando SQL
            $sql = 'SELECT * FROM cupom';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            return $resultado;
        }

        public function update(int $id, Cupom $cupom) {
                //Comando SQL
            $sql = 'UPDATE cupom SET codigo = ?, desconto = ? WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $cupom -> getCodigo(),PDO::PARAM_STR);
            $stmt -> bindValue(2, $cupom -> getDesconto(), PDO::PARAM_INT);
            $stmt -> bindValue(3, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End update.";
        }

        public function delete(int $id) {
                //Comando SQL
            $sql = 'DELETE FROM cupom WHERE id = ?';
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