<?php
    namespace Classes;

    class AcompDAO {
        public function create (Acompanhamento $acmp) {
            $sql = 'INSERT INTO acompanhamento (idPromocao, nome, valor, tamanho) VALUES (?, ?, ?, ?)';

            $stmt = Connect::getConn() -> prepare($sql);

            $stmt -> bindValue(1, $acmp -> getPromocao());
            $stmt -> bindValue(2, $acmp -> getNome());
            $stmt -> bindValue(3, $acmp -> getValor());
            $stmt -> bindValue(4, $acmp -> getTamanho());
            
        }
    }
?>