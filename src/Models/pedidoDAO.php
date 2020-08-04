<?php
    namespace Models;
    use Classes\Pedido;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class lancheDAO {
       
        public function create(Pedido $pedido) {
            try {
                    //Comando SQL
                // $sql = 'INSERT INTO pedido (nome, valor) VALUES (?, ?)';
                //     //Conexão com banco + prepare
                // $stmt = Connect::getConn() -> prepare($sql);
                //     //Agrega o valor ao local do '?' na variavel $sql
                // $stmt -> bindValue(1, $lanche -> getNome(),PDO::PARAM_STR);
                // $stmt -> bindValue(2, $lanche -> getValor());
                //     //Executa com os valores agregados
                // $stmt -> execute();               
                //     //ID do Lanche recém  inserido
                // $insertedID = (int)Connect::getConn() -> lastInsertId();
                // //Retorna o array de ingredientes do lanche
                // $ingredientes = $lanche -> getIngredient();
                //     //Retorna o array de quantidade de ingredientes do lanche
                // $receitas = $lanche -> getRecipe();
                //     //Outra comando SQL de inserção
                // $sql = 'INSERT INTO lanche_ingredientes (id_lanche, id_ingrediente, quantidade) VALUES (?, ?, ?)';
                //     //Prepara uma nova conexão ao banco
                // $stmt = Connect::getConn() -> prepare($sql);
                //     //For para inserir um array ao banco (Tabela lanche_ingredientes)
                // for($i = 0; $i < count($ingredientes); $i++){
                //         //id recém adicionado
                //     $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //         //id do ingrediente
                //     $stmt -> bindValue(2, $ingredientes[$i], PDO::PARAM_INT);
                //         //quantidade do tal ingrediente
                //     $stmt -> bindValue(3, $receitas[$i], PDO::PARAM_INT);
                //         //Executa o comando $sql
                //     $stmt -> execute();

                //     echo "Linha adicionada: id do lanche: ".$insertedID." int Ingrediente: ". $ingredientes[$i]. ". Quantidade: ". $receitas[$i];
                //     echo "<br/>";
                // }

            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function read() {
                //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT lc.id, lc.nome, ing.ingrediente, li.quantidade FROM lanche lc JOIN lanche_ingredientes li ON lc.id = id_lanche JOIN ingredientes ing ON ing.id = li.id;';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            // return $resultado;
            var_dump($resultado);
        }

        public function read_show() {
                //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT lc.id, lc.nome, ing.ingrediente, li.quantidade FROM lanche lc JOIN lanche_ingredientes li ON lc.id = id_lanche JOIN ingredientes ing ON ing.id = li.id;';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            $rows = $resultado;
            echo "<table>";
            echo "<thead><th>ID</th><th>Nome</th><th>Ingrediente</th><th>Quantidade</th></thead>";
            foreach ($rows as $row){
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['nome']."</td>
                    <td>".$row ['ingrediente']."</td>
                    <td>".$row ['quantidade']."</td>
                </tr>";
            }
            echo "</table>";
        }

        public function update(int $id, Lanche $lanche) {
                //Comando SQL
            $sql = 'UPDATE lanche SET nome = ?, valor = ? WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $lanche -> getNome());
            $stmt -> bindValue(2, $lanche -> getValor());
            $stmt -> bindValue(3, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End Lanche update";

            $sql = 'UPDATE lanche_ingredientes SET quantidade = ? WHERE id_ingrediente = ? AND id_lanche = ?';

            $ingredientes = $lanche -> getIngredient();
                //Retorna o array de quantidade de ingredientes do lanche
            $receitas = $lanche -> getRecipe();
                //Outra comando SQL de inserção
            $stmt = Connect::getConn() -> prepare($sql);
            for($i = 0; $i < count($ingredientes); $i++){
                    //Novo valor da quantidade
                $stmt -> bindValue(1, $receitas[$i], PDO::PARAM_INT);
                    //id do ingrediente
                $stmt -> bindValue(2, $ingredientes[$i], PDO::PARAM_INT);
                    //quantidade do tal ingrediente
                $stmt -> bindValue(3, $id, PDO::PARAM_INT);
                    //Executa o comando $sql
                $stmt -> execute();

                echo "End lanche_ingrediente";

                echo "Linha adicionada: id do lanche: ".$id." int Ingrediente: ". $ingredientes[$i]. ". Quantidade: ". $receitas[$i];
                echo "<br/>";
            }

        }

        public function delete(int $id) {
                //Comando SQL
            $sql = 'DELETE FROM lanche WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "Finised deleting from lanche";
            
            $sql = 'DELETE FROM lanche_ingredientes WHERE id = ?';
            //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $id);
            //Executa o comando sql
            $stmt -> execute();
            
            echo "Finised deleting from lanche_ingredientes";
        }

    }
?>