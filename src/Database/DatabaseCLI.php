<?php
        namespace Database;
        require '../../vendor/autoload.php';

use Classes\Pedido;
use \PDO;
        use \PDOException;

        //Executa comandos SQL diretamente
        try {
                $dbh = Connect::getConn() -> prepare('SELECT * FROM bebida WHERE id = 4');
                $dbh -> execute();
                $pedido = new Pedido(1, 1);
                $row = $dbh -> fetchObject('\Classes\Bebida');

                var_dump($row);
                echo "Finished.";

                $pedido -> addProduto($row);

                echo $pedido ."<br/><br/>";

                $array = [1,2,3,4,5];
                
                array_splice($array, 1, 1);

                print_r($array);

        } catch (PDOException $e) {
                echo $e -> getMessage();
        }
?>