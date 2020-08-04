<?php
        namespace Database;
        require '../../vendor/autoload.php';
        use \PDO;
        use \PDOException;
        //Executa comandos SQL diretamente
        try {
                $dbh = Connect::getConn() -> exec('');

                echo "Finished.";

        } catch (PDOException $e) {
                echo $e -> getMessage();
        }
?>