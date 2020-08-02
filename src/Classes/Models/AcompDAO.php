<?php
    namespace Models;
    use Classes\Acompanhamento;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class AcompDAO {
       
        public function create(Acompanhamento $acmp) {
try {
                    //Comando SQL
                $sql = 'INSERT INTO acompanhamento (nome, valor, tamanho) VALUES (?, ?, ?)';
                    //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);

                    //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $acmp -> getNome(),PDO::PARAM_STR);
                $stmt -> bindValue(2, $acmp -> getValor());
                $stmt -> bindValue(3, $acmp -> getTamanho(), PDO::PARAM_STR);
                    //Executa com os valores agregados
                $stmt -> execute();
            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function read() {
            $sql = 'SELECT * FROM acompanhamentos';

            $stmt = Connect::getConn() -> prepare($sql);

            if ($stmt -> rowCount() > 0) {
                $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                return $resultado;
            }
        }

    }
?>