<?php
        try {
                $db = new PDO('sqlite:database.sqlite');

                

                $db -> exec("CREATE TABLE cupom (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        codigo VARCHAR(10) NOT NULL,
                        desconto INTEGER NOT NULL
                );
                
                CREATE TABLE promocao (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        nome VARCHAR(50) NOT NULL,
                        desconto INTEGER NOT NULL
                );
                
                CREATE TABLE pedido (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        idCupom INTEGER,
                        hora TIMESTAMP NOT NULL,
                        modoPreparo VARCHAR(30) NOT NULL,
                        metodoPagamento VARCHAR(30) NOT NULL,
                        FOREIGN KEY (idCupom) REFERENCES cupom(id)
                );
                
                CREATE TABLE lanche (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        idPromocao INTEGER,
                        nome VARCHAR(30) NOT NULL,
                        valor DOUBLE NOT NULL,
                        ingredientes VARCHAR (200) NOT NULL,
                        FOREIGN KEY (idPromocao) REFERENCES promocao(id)
                );
                
                CREATE TABLE acompanhamento (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        idPromocao INTEGER,
                        nome VARCHAR(30) NOT NULL,
                        valor DOUBLE NOT NULL,
                        tamanho VARCHAR(30)
                        FOREIGN KEY (idPromocao) REFERENCES promocao(id)
                );
                
                CREATE TABLE bebida (
                        id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL,
                        idPromocao INTEGER,
                        nome VARCHAR(30) NOT NULL,
                        marca VARCHAR(30) NOT NULL,
                        valor DOUBLE NOT NULL,
                        tamanho VARCHAR(30)
                        FOREIGN KEY (idPromocao) REFERENCES promocao(id)
                );");

        } catch (PDOException $e) {
                echo $e -> getMessage();
        }
        
?>