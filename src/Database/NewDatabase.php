<?php
                //Executa comandos SQL diretamente
        try {
                $db = new \PDO('sqlite:database.sqlite');

                $sql = 'INSERT INTO acompanhamento (nome, valor, tamanho) VALUES ("Batata", 4.50, "Grande")';
                $stmt = $db -> prepare($sql);
                // $stmt -> bindValue();
                
                echo "FIM";

        } catch (PDOException $e) {
                echo $e -> getMessage();
        }
        
?>