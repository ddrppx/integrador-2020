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

        public function read() {
                //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT lc.id, lc.nome, lc.valor, lc.imagem FROM lanche lc';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            // return $resultado;
            return $resultado;
        }

        public function readValor(int $id) {
                //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT valor FROM lanche WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
                //Retorno da variavel
                // return $resultado;
            return $resultado;
        }

        public function readID(int $id) {
                //Comando SQL, Com JOIN pois envolve 3 tabelas
            $sql = 'SELECT id, nome, valor, imagem FROM lanche WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> bindValue(1, $id, PDO::PARAM_INT);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetch(PDO::FETCH_ASSOC);
                //Retorno da variavel
                // return $resultado;
            return $resultado;
        }

        public function readShowAll() {
            $rows = $this -> read();

            foreach ($rows as $row){
                $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$row['imagem'];
                echo '
                    <div class="card mb-1 mt-1 col-6 col-sm-4 col-md-3 itemHover" onclick="escolherProduto(\'add\','.$row['id'].')">
                        <img class="card-img-top mb-2" src="'.$imgPath.'" height="150px" width="150px" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text text-left h6">'.$row['nome'].'</p>
                            <p class="card-text justify-content text-right h6"> R$'.number_format($row['valor'], 2).'</p>
                        </div>
                    </div>';
                }
        }

        public function readWhereOutput(int $id, int $qtd) {
            $row = $this -> readID($id);
            $imgPath = '..'.DS.'Static'.DS.'produtos'.DS.$row['imagem'];
            echo '
                <div class="card mb-1 mt-1 col-6 col-sm-4 col-md-3 cartHover">
                    <img class="card-img-top mb-2" src="'.$imgPath.'" height="150px" width="150px" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text text-left h6">'.$row['nome'].'</p>
                        <p class="card-text align-text-right h5 bottomCart"> x'.$qtd.'</p>

                        <div class="text-left remover">

                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-plus btn-success rounded" onclick="aumentarQtd(1,'.$row['id'].')" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M8 3.5a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5H4a.5.5 0 0 1 0-1h3.5V4a.5.5 0 0 1 .5-.5z"/>
                            <path fill-rule="evenodd" d="M7.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0V8z"/>
                            </svg>
                        
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-dash btn-info rounded" onclick="diminuirQtd(1, '.$row['id'].')" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M3.5 8a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                            
                            <svg width="1.5em" height="1.5em" viewBox="0 0 16 16" class="bi bi-x btn-danger rounded" fill="currentColor" onclick="removerProd(1,'.$row['id'].' )"xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"/>
                                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"/>
                            </svg>
                        
                        </div>
                    </div>
                </div>';
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