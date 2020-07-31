<?php
    namespace Classes\Models;
    use \Classes\Acompanhamento;
    use \Classes\Database\Connect;
    use PDOException;

class AcompDAO {
       
            public function create (Acompanhamento $acmp) {
            try {
                $sql = 'INSERT INTO acompanhamento (idPromocao, nome, valor, tamanho) VALUES (?, ?, ?, ?)';

                $stmt = Connect::getConn() -> prepare($sql);

                $stmt -> bindValue(1, $acmp -> getPromocao());
                $stmt -> bindValue(2, $acmp -> getNome());
                $stmt -> bindValue(3, $acmp -> getValor());
                $stmt -> bindValue(4, $acmp -> getTamanho());
                
                $stmt -> exec();
            } catch (PDOException $e){
                echo $e -> getMessage();
            }
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