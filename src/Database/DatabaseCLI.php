<?php
        namespace Database;
        require '../../vendor/autoload.php';
        use \PDO;
        use \PDOException;
        //Executa comandos SQL diretamente
        try {
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Carne bovina")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Carne suína")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Ovo")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Alface")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Tomate")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Cebola")');


                echo "Finished.";

                

        } catch (PDOException $e) {
                echo $e -> getMessage();
        }
        
?>