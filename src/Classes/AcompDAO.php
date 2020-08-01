<?php
    namespace Classes;
    use Classes\Acompanhamento;
    use Classes\Connect;
class AcompDAO {
       
        public function create(Acompanhamento $acmp) {

            $sql = 'INSERT INTO acompanhamento (nome, valor, tamanho) VALUES (?, ?, ?)';

            $db = Connect::getConn() -> prepare($sql);
            $stmt = $db ->  bindValue(1, $acmp -> getNome());
            $stmt = $db ->  bindValue(2, $acmp -> getValor());
            $stmt = $db ->  bindValue(3, $acmp -> getTamanho());

            $db -> execute();

        }

        public function read() {
            $sql = 'SELECT * FROM acompanhamentos';

            $stmt = Connect::getConn() -> prepare($sql);

            if ($stmt -> rowCount() > 0) {
                $resultado = $stmt -> fetchAll(\PDO::FETCH_ASSOC);
                return $resultado;
            }
        }

    }
?>