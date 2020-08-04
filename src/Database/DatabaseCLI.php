<?php
        namespace Database;
        require '../../vendor/autoload.php';
        use \PDO;
        use \PDOException;
        //Executa comandos SQL diretamente
        try {
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Queijo cheddar")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Queijo prato")');
                $dbh = Connect::getConn() -> exec('INSERT INTO ingredientes (ingrediente) VALUES("Picles")');
 


                echo "Finished.";

                

        } catch (PDOException $e) {
                echo $e -> getMessage();
        }
        
?>