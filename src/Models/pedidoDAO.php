<?php
    namespace Models;
    use Classes\Pedido;
    use Classes\Lanche;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class pedidoDAO {

        public function create(Pedido $pedido) {
            try {
                    //Comando SQL
                $sql = 'INSERT INTO pedido (hora, md_preparo, mtd_pagamento, valor) VALUES (?, ?, ?, ?)';
                echo "<br/>Start<br/>";
                //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $pedido -> getHora());
                $stmt -> bindValue(2, $pedido -> getModoPreparo());
                $stmt -> bindValue(3, $pedido -> getMetodoPagamento());
                $stmt -> bindValue(4, $pedido -> getValor());
                //Executa com os valores agregados
                $stmt -> execute();               
                echo "<br/>Start 2/6<br/>";
                //ID do Lanche recém  inserido
                $insertedID = (int)Connect::getConn() -> lastInsertId();
                //Retorna o array de ingredientes do lanche
                $idItens = $pedido -> getIds();
                //For para inserir um array ao banco (Tabela lanche_x)
                $arLanches = []; //Lanches
                $arBebidas = []; //Bebidas
                $arAcomps = []; //Acompanhamentos
                //Cada valor é separado pela chave no array "key()"
                echo "<br/>Start 3/6<br/>";
                for ($i=0; $i < count($idItens); $i++) { 
                    //Se o a linha do array for da classe "Lanche"
                    if (key($idItens[$i]) == 'Classes\Lanche'){
                        $arLanches[] = $idItens[$i]['Classes\Lanche'];
                        //Se o a linha do array for da classe "Acompanhamento"
                    } elseif (key($idItens[$i]) == 'Classes\Acompanhamento') {
                        $arAcomps[] = $idItens[$i]['Classes\Acompanhamento'];
                        //Se o a linha do array for da classe "Bebida"
                    } elseif (key($idItens[$i]) == 'Classes\Bebida') {
                        $arBebidas[] = $idItens[$i]['Classes\Bebida'];
                    }
                }
                
                echo "<br/>Start 4/6<br/>";
                //Outra comando SQL de inserção (pedido_lanche)
                $sql = 'INSERT INTO pedido_lanche (id_pedido, id_lanche) VALUES (?, ?)';
                //Prepara uma nova conexão ao banco
                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
                foreach ($arLanches as $lanche) {
                    $stmt -> bindValue(2, $lanche, PDO::PARAM_INT);
                    //Executa a cada item no array
                    $stmt -> execute();
                }
                
                echo "<br/>Start 5/6<br/>";
                //Outra comando SQL de inserção (pedido_acomp)
                $sql = 'INSERT INTO pedido_acomp (id_pedido, id_acomp) VALUES (?, ?)';
                //Prepara uma nova conexão ao banco
                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
                foreach ($arAcomps as $acomp) {
                    $stmt -> bindValue(2, $acomp, PDO::PARAM_INT);
                    //Executa a cada item no array
                    $stmt -> execute();
                }
                
                echo "<br/>Start 6/6<br/>";
                //Outra comando SQL de inserção (pedido_bebida)
                $sql = 'INSERT INTO pedido_bebida (id_pedido, id_bebida) VALUES (?, ?)';
                //Prepara uma nova conexão ao banco
                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                    //Loop para inserir todos lanches
                foreach ($arBebidas as $bebida) {
                    $stmt -> bindValue(2, $bebida, PDO::PARAM_INT);
                        //Executa a cada item no array
                    $stmt -> execute();
                }
    
                echo "Finised.";
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