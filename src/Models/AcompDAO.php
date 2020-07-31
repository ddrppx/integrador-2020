<?php
    namespace Models;
    use \Classes\Acompanhamento;
    use \Database\Connect;
class AcompDAO {
       
        public function create(Acompanhamento $acmp) {
            $sql = 'INSERT INTO acompanhamento (nome, valor, tamanho) VALUES (?, ?, ?)';

            var_dump($sql);

            $stmt = Connect::getConn()->prepare($sql);

            $stmt -> bindValue(1, $acmp -> getNome());

            $stmt -> bindValue(2, $acmp -> getValor());
            $stmt -> bindValue(3, $acmp -> getTamanho());

            $stmt -> execute();
        }
        
        public function getTest() {
            echo Connect::getTest();
        }

        public function read() {
            $sql = 'SELECT * FROM acompanhamentos';

            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> exec();

            if ($stmt -> rowCount() > 0) {
                $resultado = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }
        }

    }
?>