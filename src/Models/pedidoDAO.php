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
                //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $pedido -> getHora());
                $stmt -> bindValue(2, $pedido -> getModoPreparo());
                $stmt -> bindValue(3, $pedido -> getMetodoPagamento());
                $stmt -> bindValue(4, $pedido -> getValor());
                //Executa com os valores agregados
                $stmt -> execute();               
                //ID do Lanche recém  inserido
                $insertedID = (int)$this -> insertedID();
                //Retorna o array de ingredientes do lanche
                $idItens = $pedido -> getIds();
                //For para inserir um array ao banco (Tabela lanche_x)
                //Metodo usado se utilizarmos o addProduto($produto)
                $arLanches = []; //Lanches
                $arBebidas = []; //Bebidas
                $arAcomps = []; //Acompanhamentos
                //Cada valor é separado pela chave no array "key()"
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
                
                //Outra comando SQL de inserção (pedido_lanche)
                $sql = 'INSERT INTO pedido_lanche (id_pedido, id_lanche, quantidade) VALUES (?, ?, ?)';
                //Prepara uma nova conexão ao banco
                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
                foreach ($arLanches as $lanche) {
                    $stmt -> bindValue(2, $lanche, PDO::PARAM_INT);
                    //Executa a cada item no array
                    $stmt -> execute();
                }
                
                //Outra comando SQL de inserção (pedido_acomp)
                $sql = 'INSERT INTO pedido_acomp (id_pedido, id_acomp, quantidade) VALUES (?, ?, ?)';
                //Prepara uma nova conexão ao banco
                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
                foreach ($arAcomps as $acomp) {
                    $stmt -> bindValue(2, $acomp, PDO::PARAM_INT);
                    //Executa a cada item no array
                    $stmt -> execute();
                }
                
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
            //Escreve somente na tabela pedido, e retorna o ID recem criado
        public function createSingle(Pedido $pedido) {


            try { 

                 //Comando SQL
            $sql = 'INSERT INTO pedido (hora, md_preparo, mtd_pagamento, valor) VALUES (?, ?, ?, ?)';
                //Conexão com banco + prepare
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $pedido -> getHora());
            $stmt -> bindValue(2, $pedido -> getModoPreparo());
            $stmt -> bindValue(3, $pedido -> getMetodoPagamento());
            $stmt -> bindValue(4, $pedido -> getValor());
                //Executa com os valores agregados
            $stmt -> execute();               
            
                //ID do Lanche recém  inserido
            return $this -> insertedID();
            } catch (PDOException $e) {

                echo $e -> getMessage();
            }
        }

            //Retorna o ultimo id cadastrado (Usado logo após escrever no banco)
        public function insertedID(){
            $insertedID = (int)Connect::getConn() -> lastInsertId();
            return $insertedID;
        }

            //Insere dados na tabela pedido_lanche (JOIN)
        public function insertPedidoLanche(int $insertedID, int $idLanche, int $qtd) {
                //Outra comando SQL de inserção (pedido_lanche)
            $sql = 'INSERT INTO pedido_lanche (id_pedido, id_lanche, quantidade) VALUES (?, ?, ?)';
                //Prepara uma nova conexão ao banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
            $stmt -> bindValue(2, $idLanche, PDO::PARAM_INT);
            $stmt -> bindValue(3, $qtd, PDO::PARAM_INT);
                //Executa a cada item no array
            $stmt -> execute();
        }

            //Insere dados na tablea pedido_acomp (JOIN)
        public function insertPedidoAcomp(int $insertedID, int $idAcomp, int $qtd) {
                //Outra comando SQL de inserção (pedido_acomp)
            $sql = 'INSERT INTO pedido_acomp (id_pedido, id_acomp, quantidade) VALUES (?, ?, ?)';
                //Prepara uma nova conexão ao banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
            $stmt -> bindValue(2, $idAcomp, PDO::PARAM_INT);
            $stmt -> bindValue(3, $qtd, PDO::PARAM_INT);
                //Executa a cada item no array
            $stmt -> execute();
        }

            //Insere dados na tabela pedido_bebida (JOIN)
        public function insertPedidoBebida(int $insertedID, int $idBebida, int $qtd) {
                //Outra comando SQL de inserção (pedido_bebida)
                $sql = 'INSERT INTO pedido_bebida (id_pedido, id_bebida, quantidade) VALUES (?, ?, ?)';
                //Prepara uma nova conexão ao banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $insertedID, PDO::PARAM_INT);
                //Loop para inserir todos lanches
            $stmt -> bindValue(2, $idBebida, PDO::PARAM_INT);
            $stmt -> bindValue(3, $qtd, PDO::PARAM_INT);
                //Executa a cada item no array
            $stmt -> execute();
        }

        public function read() {
                //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT p.id, p.valor,
            la.nome as la_nome, la.valor as la_valor,
            ac.nome as ac_nome, ac.tamanho as ac_tamanho, ac.valor as ac_valor,
            be.nome as be_nome, be.marca as be_marca , be.tamanho as be_tamanho, be.valor as be_valor
            FROM pedido p
            JOIN pedido_acomp pa ON pa.id_pedido = p.id
            JOIN pedido_lanche pl ON pl.id_pedido = p.id
            JOIN pedido_bebida pb ON p.id = pb.id_pedido
            JOIN lanche la ON la.id = pl.id_lanche
            JOIN bebida be ON be.id = pb.id_bebida
            JOIN acompanhamento ac ON ac.id = pa.id';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
             return $resultado;
            }

        public function read_show() {

            $rows = $this -> read();
            echo "<table>";
            echo "<thead><th>ID</th><th>Valor Pedido</th><th>La Nome</th><th>La Valor</th><th>Ac Nome</th><th>Ac Tamanho</th><th>Ac Valor</th><th>Be Nome</th><th>Be Marca</th><th>Be Tamanho</th><th>Be Valor</th></thead>";
            foreach ($rows as $row){
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['valor']."</td>
                    <td>".$row['la_nome']."</td>
                    <td>".$row['la_valor']."</td>
                    <td>".$row['ac_nome']."</td>
                    <td>".$row['ac_tamanho']."</td>
                    <td>".$row['ac_valor']."</td>
                    <td>".$row['be_nome']."</td>
                    <td>".$row['be_marca']."</td>
                    <td>".$row['be_tamanho']."</td>
                    <td>".$row['be_valor']."</td>
                </tr>";
            }
            echo "</table>";
        }

        public function update(int $id, Pedido $pedido) {
                //Comando SQL
            $sql = 'UPDATE pedido SET hora = ?, md_preparo = ?, mtd_pagamento = ?, valor = ? Where id = ?';
                //Conexão com banco + prepare
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $pedido -> getHora());
            $stmt -> bindValue(2, $pedido -> getModoPreparo());
            $stmt -> bindValue(3, $pedido -> getMetodoPagamento());
            $stmt -> bindValue(4, $pedido -> getValor());
            $stmt -> bindValue(5, $id);
                //Executa com os valores agregados
            $stmt -> execute();      

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
            $sql = 'UPDATE pedido_lanche SET id_lanche =? WHERE id_pedido = ?';
            //Prepara uma nova conexão ao banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            //Loop para inserir todos lanches
            foreach ($arLanches as $lanche) {
                $stmt -> bindValue(1, $lanche, PDO::PARAM_INT);
                //Executa a cada item no array
                $stmt -> execute();
            }
            
            echo "<br/>Start 5/6<br/>";
            //Outra comando SQL de inserção (pedido_acomp)
            $sql = 'UPDATE pedido_acomp SET id_acomp = ? WHERE id_pedido = ?';
            //Prepara uma nova conexão ao banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
            //Loop para inserir todos lanches
            foreach ($arAcomps as $acomp) {
                $stmt -> bindValue(1, $acomp, PDO::PARAM_INT);
                //Executa a cada item no array
                $stmt -> execute();
            }
            
            echo "<br/>Start 6/6<br/>";
            //Outra comando SQL de inserção (pedido_bebida)
            $sql = 'UPDATE pedido_bebida SET id_bebida = ? WHERE id_pedido = ?';
            //Prepara uma nova conexão ao banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(2, $id, PDO::PARAM_INT);
                //Loop para inserir todos lanches
            foreach ($arBebidas as $bebida) {
                $stmt -> bindValue(1, $bebida, PDO::PARAM_INT);
                    //Executa a cada item no array
                $stmt -> execute();
            }

        }

        public function delete(int $id) {
                //Comando SQL
                $sql = 'DELETE FROM pedido WHERE id = ?';

                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $id, PDO::PARAM_INT);

                $stmt -> execute();

                $sql = 'DELETE FROM pedido_lanche WHERE id_pedido = ?';

                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $id, PDO::PARAM_INT);

                $stmt -> execute();


                $sql = 'DELETE FROM pedido_acomp WHERE id_pedido = ?';

                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $id, PDO::PARAM_INT);

                $stmt -> execute();


                $sql = 'DELETE FROM pedido_bebida WHERE id_pedido = ?';

                $stmt = Connect::getConn() -> prepare($sql);
                $stmt -> bindValue(1, $id, PDO::PARAM_INT);

                $stmt -> execute();

            echo "Finised deleting from lanche_ingredientes";
        }

    }
?>