<?php
    namespace Models;
    use Classes\Acompanhamento;
    use Database\Connect;
    use \PDO;
    use \PDOException;

class acompDAO {
       
        public function create(Acompanhamento $acmp) {
try {
                    //Comando SQL
                $sql = 'INSERT INTO acompanhamento (nome, valor, tamanho) VALUES (?, ?, ?)';
                    //Conexão com banco + prepare
                $stmt = Connect::getConn() -> prepare($sql);

                    //Agrega o valor ao local do '?' na variavel $sql
                $stmt -> bindValue(1, $acmp -> getNome(),PDO::PARAM_STR);
                $stmt -> bindValue(2, $acmp -> getValor());
                $stmt -> bindValue(3, $acmp -> getTamanho(), PDO::PARAM_STR);
                    //Executa com os valores agregados
                $stmt -> execute();
            } catch (PDOException $e) {
                $e -> getMessage();
            }

        }

        public function read() {
                //Comando SQL
            $sql = 'SELECT * FROM acompanhamento';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
            $stmt -> execute();
                //Variavel que ira retornar todas linhas do banco
            $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
                //Retorno da variavel
            $rows = $resultado;
            echo "<table>";
            echo "<thead><th>ID</th><th>Nome</th><th>Valor</th><th>Tamanho</th></thead>";
            foreach ($rows as $row){
                echo "<tr>
                    <td>".$row['id']."</td>
                    <td>".$row['nome']."</td>
                    <td>".$row ['valor']."</td>
                    <td>".$row ['tamanho']."</td>
                </tr>";
            }
            echo "</table>";
        }

        public function update(int $id, Acompanhamento $acp) {
                //Comando SQL
            $sql = 'UPDATE acompanhamento SET nome = ?, valor = ?, tamanho = ? WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $acp -> getNome());
            $stmt -> bindValue(2, $acp -> getValor());
            $stmt -> bindValue(3, $acp -> getTamanho());
            $stmt -> bindValue(4, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End update.";
        }

        public function delete(int $id) {
                //Comando SQL
            $sql = 'DELETE FROM acompanhamento WHERE id = ?';
                //Faz conexão à classe que retorna a instancia do banco
            $stmt = Connect::getConn() -> prepare($sql);
                //Agrega o valor ao local do '?' na variavel $sql
            $stmt -> bindValue(1, $id);
                //Executa o comando sql
            $stmt -> execute();

            echo "End delete.";
        }

    }
?>