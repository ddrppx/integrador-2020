<?php
    namespace Models;
    use Classes\Lanche;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class lancheDAO {
       
        public function create(Lanche $lanche) {
            try {
                    //Comando SQL
                $sql = 'INSERT INTO lanche (nome, valor) VALUES (?, ?)';
                    //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);
                    //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $lanche -> getNome(),PDO::PARAM_STR);
                $stmt -> bindValue(2, $lanche -> getValor());
                    //Executa com os valores agregados
                $stmt -> execute();               
                    //ID do Lanche recém  inserido
                $insertedID = (int)Connect::getConn() -> lastInsertId();
                //Retorna o array de ingredientes do lanche
                $ingredientes = $lanche -> getIngredient();
                    //Retorna o array de quantidade de ingredientes do lanche
                $receitas = $lanche -> getRecipe();
                    //Outra comando SQL de inserção
                $sql = 'INSERT INTO lanche_ingredientes (id_lanche, id_ingrediente, quantidade) VALUES (?, ?, ?)';
                    //Prepara uma nova conexão ao banco
                $stmt = Connect::getConn() -> prepare($sql);
                    //For para inserir um array ao banco (Tabela lanche_ingredientes)
                for($i = 0; $i < count($ingredientes); $i++){
                        //id recém adicionado
                    $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                        //id do ingrediente
                    $stmt -> bindValue(2, $ingredientes[$i], PDO::PARAM_INT);
                        //quantidade do tal ingrediente
                    $stmt -> bindValue(3, $receitas[$i], PDO::PARAM_INT);
                        //Executa o comando $sql
                    $stmt -> execute();

                    echo "Linha adicionada: id do lanche: ".$insertedID." int Ingrediente: ". $ingredientes[$i]. ". Quantidade: ". $receitas[$i];
                    echo "<br/>";
                }

            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function findId(Lanche $lanche) {
            // foreach ($lanche -> getIngredient() as $ingredient) {
            //     echo $ingredient;
            //     // $stmt = Connect::getConn() -> prepare('SELECT * FROM ingredientes WHERE ingrediente = ?');
            //     // $stmt -> bindValue(1, $ingredient, PDO::PARAM_STR);
            //     // $resultado = $stmt -> execute();
            //     $stmt = Connect::getConn() -> prepare('SELECT * FROM ingredientes WHERE ingrediente = ?');
            //     $stmt -> bindValue(1, $ingredient);
            //     $stmt -> execute();
            //     //Variavel que ira retornar todas linhas do banco
            //     $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
            //     echo " ";
            //     echo $resultado[0]['id'];
            //     echo "<br/>";

            //     loop para adicionar os itens ao SQL lanche_ingredient
                
            // }
            }
        }

        // public function read() {
        //         //Comando SQL
        //     $sql = 'SELECT * FROM acompanhamento';
        //         //Faz conexão à classe que retorna a instancia do banco
        //     $stmt = Connect::getConn() -> prepare($sql);
        //     $stmt -> execute();
        //         //Variavel que ira retornar todas linhas do banco
        //     $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        //         //Retorno da variavel
        //     return $resultado;
        // }

        // public function update(int $id, Acompanhamento $acp) {
        //         //Comando SQL
        //     $sql = 'UPDATE acompanhamento SET nome = ?, valor = ?, tamanho = ? WHERE id = ?';
        //         //Faz conexão à classe que retorna a instancia do banco
        //     $stmt = Connect::getConn() -> prepare($sql);
        //         //Agrega o valor ao local do '?' na variavel $sql
        //     $stmt -> bindValue(1, $acp -> getNome());
        //     $stmt -> bindValue(2, $acp -> getValor());
        //     $stmt -> bindValue(3, $acp -> getTamanho());
        //     $stmt -> bindValue(4, $id);
        //         //Executa o comando sql
        //     $stmt -> execute();

        //     echo "End update.";
        // }

        // public function delete(int $id) {
        //         //Comando SQL
        //     $sql = 'DELETE FROM acompanhamento WHERE id = ?';
        //         //Faz conexão à classe que retorna a instancia do banco
        //     $stmt = Connect::getConn() -> prepare($sql);
        //         //Agrega o valor ao local do '?' na variavel $sql
        //     $stmt -> bindValue(1, $id);
        //         //Executa o comando sql
        //     $stmt -> execute();

        //     echo "End delete.";
        // }

    }
?>