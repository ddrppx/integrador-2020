<?php
        try {
                $db = new \PDO('sqlite:database.sqlite');

                $db -> exec("CREATE TABLE IF NOT EXISTS bebida (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        idPromocao INTEGER,
                        nome VARCHAR(30) NOT NULL,
                        marca VARCHAR(30) NOT NULL,
                        valor DOUBLE NOT NULL,
                        tamanho VARCHAR(30),
                        FOREIGN KEY (idPromocao) REFERENCES promocao(id)
                )");

        } catch (PDOException $e) {
                echo "<script>alert($e -> getMessage())</script>";
        }
        
?>