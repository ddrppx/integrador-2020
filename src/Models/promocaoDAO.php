<?php
    namespace Models;
    use Classes\Promocao;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class promocaoDAO {
       
        public function create(Promocao $promo) {
            try {
                    //Comando SQL
                $sql = 'INSERT INTO promocao (nome, desconto) VALUES (?, ?)';
                    //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);
                    //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $promo -> getNome(), PDO::PARAM_STR);
                $stmt -> bindValue(2, $promo -> getDesconto(), PDO::PARAM_INT);
                    //Executa com os valores agregados
                $stmt -> execute();
            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function read() {
                //Comando SQL
            $sql = 'SELECT * FROM promocao';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            return $resultado;
        }

        public function update(int $id, Promocao $promo) {
                //Comando SQL
            $sql = 'UPDATE promocao SET nome = ?, desconto = ? WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $promo -> getNome(),PDO::PARAM_STR);
            $stmt -> bindValue(2, $promo -> getDesconto(), PDO::PARAM_INT);
            $stmt -> bindValue(3, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End update.";
        }

        public function delete(int $id) {
                //Comando SQL
            $sql = 'DELETE FROM promocao WHERE id = ?';
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