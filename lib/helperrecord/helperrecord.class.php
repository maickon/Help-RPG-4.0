<?php

/**
 * @project HelpRpg
 * @author Maickon Rangel
 * @date 17/07/2016
 * @contact maickon4developers@gmail.com
 * @version 1.0
 * @link https://github.com/maickon/helprpg4.0
 * 
 */

class HelperRecord_Lib{
    private $conn, $dns, $db, $db_type, $host, $user, $pass, $now;
    
    public function __construct(){
        if($this->checkDatabaseIsActive()):
            $this->db = DB_NAME;
            $this->db_type = "mysql";
            $this->host = DB_HOST;
            $this->user = DB_USER;
            $this->pass = DB_PASS;
            $this->now = date('Y-m-d H:i:s');

            $this->dns = $this->db_type . ":host=" . $this->host . ";dbname=" . $this->db;

            try{
                $this->conn = new PDO($this->dns, $this->user, $this->pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"));
            }catch(PDOException $ex){
                $this->logRegister("Erro ao conectar com o banco de dados.");
                die("Error to connect with Database");
            }
        endif;
    }
    
    public function getConn(){
        return $this->conn;
    }

    public function getMessage(){
        return $this->message;
    }

    public function logRegister($msg){
        file_put_contents(LOG_PATH, $msg, FILE_APPEND);
    }

    private function errorMsg($action, $msg){
        $message = "{$this->now} => Método {$action}<br>";
        $message .= $msg;
        $this->logRegister($message);
        trigger_error($message, 256);
    }

    private function errorMsgInsertTable($action, $table, $msg){
        $message = "{$this->now} => Método {$action}()<br>";
        $message .= "Message::{$msg}\n";
        $this->logRegister($message);
        trigger_error($message, 256);
    }

    private function errorMsgDeleteTable($action, $table){
        $message = "{$this->now} => Método {$action}()<br>";
        $message .= "Ocorreu um erro ao deletar um registro na tabela <b>{$table}</b>.\n";
        $this->logRegister($message);
        trigger_error($message, 256);
    }

    private function errorMsgSelectTable($action, $table){
        $message = "{$this->now} => Método {$action}()<br>";
        $message .= "Ocorreu um erro ao tentar retornar dados na tabela <b>{$table}</b>. Verifique se o nome da coluna está correto.\n";
        $this->logRegister($message);
        trigger_error($message, 256);
    }

    private function errorMsgSize($action, $table){
        $message = "{$this->now} => Método {$action}()<br>";
        $message .= "A quantidade de colunas da tabela <b>{$table}</b> e seus respectivos valores não correspondem.\n";
        $this->logRegister($message);
        trigger_error($message, 256);
        return false;  
    }

    private function errorMsgTableExists($action, $table){
        $message = "{$this->now} => Método {$action}()<br>";
        $message .= "Tabela <b> {$table} </b> não existe.\n";
        $this->logRegister($message);
        trigger_error($message, 256);
        return false;
    }

    private function successMsg($action, $message){
        $this->logRegister($message);
    }

    public function checkDatabaseIsActive(){
        if(defined('DB_NAME') && defined('DB_HOST') && defined('DB_USER') && defined('DB_PASS') && (DB_NAME != '')):
            return true;
        else:
            $this->logRegister("Banco de dados não configurado.");
            die("Database is not configured");
            return false;
        endif;
    }
    
    protected function __createTable($params){
        $q = "CREATE TABLE IF NOT EXISTS $params[0] ( id int NOT NULL AUTO_INCREMENT CHECK (Id>0), ";

        foreach($params[1] as $key => $columnParam):
            $q .= "{$key} {$columnParam} NOT NULL, ";
        endforeach;

        $q .= "cadastrado_em TIMESTAMP NOT NULL DEFAULT NOW(),";
        if (array_key_exists(2, $params)) {
            $q .= "PRIMARY KEY (id),";
            $q .= $params[2]; 
            $q .= ");";
        } else {
            $q .= "PRIMARY KEY (id)";
            $q .= ");";
        }
                
        if($this->conn->exec($q) == 0):
            $message = "{$this->now} => Tabela <b>{$params[0]}</b> criada com sucesso!";
            $message .= "<br>Instrução sql::<b>{$q}</b>\n";
            $this->logRegister($message);
        else:
            $message = "Um erro ocorreu. Tabela {$params[0]} não pode ser criada.<br>";
            $message .= "$this->conn->errorInfo()[2]";
            $this->logRegister($message);
        endif;
    }

    protected function __renameTable($old, $new){
        $q = "RENAME TABLE {$old} TO {$new};";
        if($this->conn->exec($q) == 0):
            $message = "{$this->now} => Tabela <b>{$old}</b> renomeada para <b>{$new}</b> com sucesso!";
            $message .=  "<br>Instrução sql::<b>{$q}</b>\n";
            $this->logRegister($message);
        else:
            $message = "Um erro ocorreu. Tabela {$params[0]} não pode ser renomeada.<br>";
            $message .= "$this->conn->errorInfo()[2]";
            $this->logRegister($message);
        endif;
    }

    protected function __modifyColumn($table, $column, $type, $constraints = ''){
        $q = "ALTER TABLE {$table} MODIFY {$column} {$type} {$constraints}";
        if($this->conn->exec($q) == 0):
            $message = "{$this->now} => Coluna <b>{$column}</b> modificada com sucesso!";
            $message .= "<br>Instruçãosql:<b>{$q}</b>\n";
            $this->logRegister($message);
        else:
            $message = "Um erro ocorreu. Coluna {$params[0]} não pode ser modificada.<br>";
            $message .= "$this->conn->errorInfo()[2]";
            $this->logRegister($message);
        endif;
    }

    protected function __checkTableExists($table){
        $tables = $this->conn->query("SHOW TABLES LIKE '$table'");
        if($tables->rowCount() > 0):    
            $this->logRegister("{$this->now} => Checando se tabela existe: OK<br>");
            return true;
        else:
            $this->logRegister("{$this->now} => Checando se tabela existe: OFF (tabela inexistente<br>");
            return false;
        endif;
    }

    /*
        method __fkReferences()
        Adiciona uma referencia de chave estrangeira
        @params $column - coluna de chave estrangeira quevai referenciar a tabela de id (string)
        @params $reference_table - nome da tabela a ser referenciada (string)
        @prams $cascate define se a tabela referenciada sofrera alteracao em DELETE e UPDATE
    */

    protected function __fkReferences($column, $reference_table, $cascate = true){
        if($cascate):
            return "FOREIGN KEY ($column) REFERENCES {$reference_table} (id) ON DELETE CASCADE ON UPDATE CASCADE"; 
        else:
            return "FOREIGN KEY ($column) REFERENCES {$reference_table} (id)"; 
        endif;
    }

    /*
        @method __maxId()
        $params $table - nome da tabela (string)
        Retorna um registro que tenha o maior ID na tabela
    */
    protected function __maxId($table){
        $s = $this->conn->prepare("SELECT MAX(Id) FROM {$table}");
    
        if($s->execute()):
            $message = "{$this->now} => ID máximo na <b>{$table}</b> retornada com sucesso!";
            $message .= "<br>Instruçãosql:<b>{$s->queryString}</b>\n";
            $this->logRegister($message);
            $maxIdData = $s->fetchAll(PDO::FETCH_OBJ);  
            $s2 = $this->conn->prepare("SELECT * FROM {$table} WHERE id = {$maxIdData[0]['MAX(Id)']}");
            if($s2->execute()):
                $message2 = "{$this->now} => Dados na tabela <b>{$table}</b> retornados com sucesso!";
                $message2 .= "<br>Instrução sql:<b>{$s2->queryString}</b>\n";
                $this->logRegister($message2); 
                return $s2->fetchAll(PDO::FETCH_OBJ);  
            endif;
        else:
            $message = "Um erro ocorreu. ID máximo na <b>{$table}</b> não pode ser retornada.<br>";
            $message .= "$this->conn->errorInfo()[2]";
            $this->logRegister($message);
        endif;
    }

    /*
        @method __minId()
        $params $table - nome da tabela (string)
        Retorna um registro que tenha o menor ID na tabela
    */
    protected function __minId($table){
        $s = $this->conn->prepare("SELECT MIN(Id) FROM {$table}");
    
        if($s->execute()):
            $message = "{$this->now} => ID máximo na <b>{$table}</b> retornada com sucesso!";
            $message .= "<br>Instruçãosql:<b>{$s->queryString}</b>\n";
            $this->logRegister($message);
            $maxIdData = $s->fetchAll(PDO::FETCH_OBJ);  
            $s2 = $this->conn->prepare("SELECT * FROM {$table} WHERE id = {$maxIdData[0]['MIN(Id)']}");
            if($s2->execute()):
                $message2 = "{$this->now} => Dados na tabela <b>{$table}</b> retornados com sucesso!";
                $message2 .= "<br>Instrução sql:<b>{$s2->queryString}</b>\n";
                $this->logRegister($message2); 
                return $s2->fetchAll(PDO::FETCH_OBJ);  
            endif;
        else:
            $message = "Um erro ocorreu. ID mínimo na <b>{$table}</b> não pode ser retornada.<br>";
            $message .= "$this->conn->errorInfo()[2]";
            $this->logRegister($message);
        endif;
    }

    /*
        @method __count()
        $params $table - nome da tabela (string)
        Retorna a quantidade total de registros de uma tabela
    */
    protected function __count($table, $where = null){
        $sql = "SELECT COUNT(*) as count FROM {$table}";
        if ($where != null) {
            $sql .= " WHERE {$where}";
        }

        $s = $this->conn->prepare($sql);
    
        if($s->execute()):
            $message = "{$this->now} => Quantidade de registros encontrado em <b>{$table}</b> retornado com sucesso!";
            $message .= "<br>Instruçãosql:<b>{$s->queryString}</b>\n";
            $this->logRegister($message);
            return $s->fetchAll(PDO::FETCH_OBJ)[0];  
        else:
            $message = "Um erro ocorreu. Não foi possível retornar o número total de registros da tabela <b>{$table}</b>.<br>";
            $message .= "$this->conn->errorInfo()[2]";
            $this->logRegister($message);
        endif;
    }

    /*
        method __desc()
        @param $table - Nome da tabela (string)
        @param $columns - Array com a lista de colunas a ser filtrada ou '*' para representar todos (array/string)
        @param $limit - informa a quantidade de registros a ser retornada, padrao null
        @param $order_by - Define uma coluna para se basear a ordenacao, seu padrao e id (string)
        Ex:
            $object->desc('funcionario', ['nome', 'idade']);
            Retorna nome e idade por ordem decrescente de funcionario atraves do id
            $object->desc('funcionario');
            Retorna todos os campos da lista de funcionario por ordem decrescente atraves de id
    */

    protected function __desc($table, $order_by = 'id', $columns = '*', $limit = null){
        if($this->__checkTableExists($table)):
            $s = 'SELECT ';
            
            if(($columns == null) || ($columns == '*')):
                $s .= '*';
            else:
                foreach ($columns as $key => $column):
                    if($key == 0):
                        $s .= $column;
                    else:
                        $s .= ", " . $column;
                    endif;
                endforeach;
            endif;

            if ($limit != null) {
                $s .= ' FROM ' . $table. ' ORDER BY ' . $order_by . ' DESC LIMIT ' . $limit;
            } else {
                $s .= ' FROM ' . $table. ' ORDER BY ' . $order_by . ' DESC ';
            }

            $select = $this->conn->prepare($s);
           
            if($select->execute()):
                $message = "{$this->now} => Dados na <b>{$table}</b> retornado com sucesso!";
                $message .= "<br>Instruçãosql:<b>{$select->queryString}</b>\n";
                $this->logRegister($message);
                return $select->fetchAll(PDO::FETCH_OBJ);  
            else:
                $message = "Um erro ocorreu. Os dados da <b>{$table}</b> não pode ser retornado.<br>";
                $message .= "$this->conn->errorInfo()[2]";
                $this->logRegister($message);
            endif;
        endif;
    }

    /*
        method __asc()
        @param $table - Nome da tabela (string)
        @param $columns - Array com a lista de colunas a ser filtrada ou '*' para representar todos (array/string)
        @param $limit - informa a quantidade de registros a ser retornada, padrao null
        @param $order_by - Define uma coluna para se basear a ordenacao, seu padrao e id (string)
        Ex:
            $object->asc('funcionario', ['nome', 'idade']);
            Retorna nome e idade lista ascendente de funcionario por id
            $object->desc('funcionario');
            Retorna todos os campos de funcionario em ordem ascendente por id
    */

    protected function __asc($table, $order_by = 'id', $columns = '*', $limit = null){
        if($this->__checkTableExists($table)):
            $s = 'SELECT ';
            
            if(($columns == null) || ($columns == '*')):
                $s .= '*';
            else:
                foreach ($columns as $key => $column):
                    if($key == 0):
                        $s .= $column;
                    else:
                        $s .= ", " . $column;
                    endif;
                endforeach;
            endif;

            if ($limit != null) {
                $s .= ' FROM ' . $table. ' ORDER BY ' . $order_by . ' ASC LIMIT ' . $limit;
            } else {
                $s .= ' FROM ' . $table. ' ORDER BY ' . $order_by . ' ASC ';
            }

            $select = $this->conn->prepare($s);
           
            if($select->execute()):
                $message = "{$this->now} => Dados na <b>{$table}</b> retornado com sucesso!";
                $message .= "<br>Instruçãosql:<b>{$select->queryString}</b>\n";
                $this->logRegister($message);
                return $select->fetchAll(PDO::FETCH_OBJ);  
            else:
                $message = "Um erro ocorreu. Os dados da <b>{$table}</b> não pode ser retornado.<br>";
                $message .= "$this->conn->errorInfo()[2]";
                $this->logRegister($message);
            endif;
        endif;
    }

    /*
        @method __insert()
        @params $table - Nome da tabela (string)
        @params $fields - lista de campos da tabela (array)
        @params $values - Lista de valores referante a cada coluna da tabela (array)

        @exemple:
            insere nome, idade e telefone na tabela TableName
            $object->insert('TableName', ['nome','idade','telefone'],['Marcos','22','22 998776523']);
    */
    protected function __insert($table, $fields, $values){
        if($this->__checkTableExists($table)):
            if(count($fields) == count($values)):
                $s = 'INSERT INTO ' . $table . ' (';

                foreach($fields as $key => $field):
                    if($key == 0):
                        $s .= $field;
                    else:
                        $s .= ", " . $field;
                    endif;
                endforeach;

                $s .= ') VALUES (';

                for($i = 0; $i < count($fields) - 1; $i++):
                    $s .= '?, ';
                endfor;

                $s .= '?)';

                $s = $this->conn->prepare($s);
        
                foreach($values as $key => $value):
                    $s->bindValue($key + 1, $value);
                endforeach;
                
               if($s->execute()):
                    $message = "{$this->now} => Dados inseridos com sucesso na tabela <b>{$table}</b>";
                    $message .= "<br>Instrução sql::<b>{$s->queryString}</b>\n";
                    $this->successMsg('__insert', $message);
                    return true;
               else:
                    // erro ao inserir dados
                    $this->errorMsgInsertTable('__insert',$table, $s->errorInfo()[2]);
               endif;
            elseif(count($fields) != count($values)):
                // diferenca no tamanho dos arrays fields e values
                $this->errorMsgSize('__insert',$table);         
            endif;  
        else:
            // a tabela nao existe
            $this->errorMsgTableExists('__insert',$table);
        endif;
    }
    
    /*
        @method __update()
        @params $table - Nome da tabela (string)
        @params $field - Lista de nomes das colunas da tabela (array)
        @params $values - Lista com os valores das respectivas colunas (array)
        @params $whereField - condicao where com referencia a algum campo da tabela (string)
        @params $whereValue - condicao where com referecia a algum valor referente ao campo (strig)

        @exemple:
            Alterar o nome e a idade de uma tupla de id 1
            $object->update('TableName', ['nome', 'idade'], ['Joca', 30], 'id', 1)
    */
    protected function __update($table, $fields, $values, $whereField, $whereValue){
        if($this->__checkTableExists($table)):
            if(count($fields) == count($values)):
                $s = 'UPDATE ' . $table . ' SET ';

                foreach($fields as $key => $field):
                    if($key == 0):
                        $s .= $field . ' = ?';
                    else:
                        $s .= ", " . $field . ' = ?';
                    endif;
                endforeach;

                $s .= ' WHERE ' . $whereField . ' = ?';
               
                $s = $this->conn->prepare($s);
  
                foreach($values as $key => $value):
                    $s->bindValue($key + 1, $value);
                endforeach;
                
                // troca o caracter coringa (?) na instrucao sql pela variavel where value 
                $s->bindValue( count($values) + 1 , $whereValue);
                if($s->execute()):
                    $message = "{$this->now} => Dados atualizados com sucesso na tabela <b>{$table}</b>";
                    $message .= "<br>Instrução sql::<b>{$s->queryString}</b>\n";
                    $this->successMsg('__insert', $message);
                    return true;
                else:
                    $this->errorMsgInsertTable('__update', $table, $s->errorInfo()[2]);
                endif;
                
            elseif(count($fields) != count($values)):
                $this->errorMsgSize('__update', $table);
            endif;
        else:
            $this->errorMsgTableExists('__update', $table);
        endif;
    }
    
    /*
        @method __select()
        @params $table - Nome da tabela (string)
        @params $columns - Lista com o nome das culunas a serem buscadas (array) or (null)
        @params $where - Lista de arrays com 3 elementos (array)
            [0]->nome da culuna
            [1]->operador, ex: =, <, <=, != e etc...
            [2]->termo comparativo
            ex: [ ['nome', '=', 'maickon'] ]
            $where pode ser tambem um unico array e nao uma lista.
            Ex: ['nome', '=', 'maickon']
        @params $logical - operador logico para agregar novas condicoes where (string)

        @exemple:
            ->Retornar todos os campos
            $object->select('TableName');
            ->Retornar todos os campos  onde nome = 'cadeira'
            $object->select('TableName', '*', ['nome', '=', 'cadeira'])
            ->Retornar todos os campos  onde id > 5
            $object->select('TableName', '*', ['id', '>', 5])
            ->Retornar apenas o endereco do registro de id 1
            $object->select('TableName', ['endereco'], ['id', '=', 5])
            ->Retornar todos os campos  a partir de duas condiçoes where com operador AND
            $object->select('TableName', '*', [ ['idade', '=', 22], ['sexo', '=', 'masculino'] ], 'AND')
            isso e aquivalente a SELECT * FROM TableName WHERE idade = 22 AND 'sexo' = 'masculino'
    */

    private function __select($table, $columns = null, $where = null, $logical = 'AND'){
        if($this->__checkTableExists($table)):
            $s = 'SELECT ';
            
            if(($columns == null) || ($columns == '*')):
                $s .= '*';
            else:
                foreach ($columns as $key => $column):
                    if($key == 0):
                        $s .= $column;
                    else:
                        $s .= ", " . $column;
                    endif;
                endforeach;
            endif;
            
            $s .= ' FROM ' . $table;
           
            if($where == null):
                $s = $this->conn->prepare($s);
            else:
                if($logical != 'OR'):
                    $logical = 'AND';
                endif;
            
                $s .= ' WHERE ';
                
                $i = 1;
                if(isset( $where[0] ) && is_array( $where[0] )):
                    foreach($where as $param):
                        if($i == 1):
                            $s .= $param[0] .' '. $param[1] . ' ? ';
                        else:
                            $s .= $logical .' '. $param[0] .' '. $param[1] . ' ? ';
                        endif;
                        $i++;
                    endforeach;
                    
                    $s = $this->conn->prepare($s);
                
                    $i = 1;
                    foreach($where as $param):
                        $s->bindValue($i, $param[2]);
                        $i++;
                    endforeach;
                elseif(is_array( $where)):
                    $s .= $where[0] .' '. $where[1] . ' ? ';
                    $s = $this->conn->prepare($s);
                    $s->bindValue(1, $where[2]);
                else:
                    $this->errorMsg('__select', "O metodo select() aceita somente array no parametro where. A string '$where' é inválida.\n");
                endif;
            endif;
            
          
            if($s->execute()):
                if($s->rowCount() > 0):
                    $message = "{$this->now} => Dados retornados com sucesso na tabela <b>{$table}</b>";
                    $message .= "<br>Instrução sql::<b>{$s->queryString}</b>\n";
                    $this->successMsg('__select', $message);
                    return $s->fetchAll(PDO::FETCH_OBJ);
                else:
                    $message = "{$this->now} => Nenhum dado foi retornando da tabela <b>{$table}</b>";
                    $message .= "<br>Instrução sql::<b>{$s->queryString}</b>\n";
                    $this->successMsg('__select', $message);
                    return $s->fetchAll(PDO::FETCH_OBJ);
                endif;
            else:
                $this->errorMsgSelectTable('__select', $table);
                return array();
            endif;
        else:
            $this->errorMsgTableExists('__select', $table);
        endif;
    }
    
    /*
        @method __delete()
        @param $table - Nome da tabela (string)
        @params $where - Lista de arrays com 3 elementos (array)
            [0]->nome da culuna
            [1]->operador, ex: =, <, <=, != e etc...
            [2]->termo comparativo
            ex: [ ['nome', '=', 'maickon'] ]
            $where pode ser tambem um unico array e nao uma lista.
            Ex: ['nome', '=', 'maickon']
        @params $logical - operador logico para agregar novas condicoes where (string)

        @exemple:
            ->Deletar um registro (nao funcional)
            $object->delete('TableName'); //nao funciona pois precisa do parametro where
            ->Deletar um registro com id 7
            $object->delete('TableName', ['id', '=', 7])
            ->Deletar um registro com nome joao
            $object->delete('TableName', ['nome', '=', 'joao'])
            ->Deletar todos os registros que tenham a palavra carne na descricao
            $object->delete('TableName', ['descricao', 'LIKE', '%carne%'])
            ->Deletar todos os registro que atendam a partir de duas condiçoes where com operador AND
            $object->delete('TableName', [ ['idade', '=', 22], ['sexo', '=', 'masculino'] ], 'AND')
            isso e aquivalente a DELETE FROM TableName WHERE idade = 22 AND 'sexo' = 'masculino'
    */
    
    private function __delete($table, $where = null, $logical = 'AND'){
        if($this->__checkTableExists($table)):
            $s = 'DELETE FROM ' . $table;
                                    
            if($where == null || empty($where)):
                $this->errorMsg('__delete', "Erro ao deletar um registro! O parametro where é obrigatório.\n");
            else:
                if($logical != 'OR'):
                    $logical = 'AND';
                endif;
                
                $s .= ' WHERE ';
                
                $i = 1;
                if(isset( $where[0] ) && is_array( $where[0])):
                    foreach ($where as $param):
                        if($i == 1):
                            $s .= $param[0] .' '. $param[1] . ' ? ';
                        else:
                            $s .= $logical .' '. $param[0] .' '. $param[1] . ' ? ';
                        endif;
                        $i++;
                    endforeach; 

                    $s = $this->conn->prepare($s);
                
                    $i = 1;
                    foreach($where as $param):
                        $s->bindValue($i, $param[2]);
                        $i++;
                    endforeach;

                elseif(is_array( $where)):
                    $s .= $where[0] .' '. $where[1] . ' ? ';
                    $s = $this->conn->prepare($s);
                    $s->bindValue(1, $where[2]);
                else:
                    $this->errorMsg('__select', "O metodo delete() aceita somente array no parametro where. A string '$where' é inválida.\n");
                endif;
            endif;
                        
            if($s->execute()):
                $message = "{$this->now} => Dados deletados com sucesso na tabela <b>{$table}</b>";
                $message .= "<br>Instrução sql::<b>{$s->queryString}</b>\n";
                $this->successMsg('__delete', $message);
                return true;
            else:
                $this->errorMsgDeleteTable('__delete', $table, $s->errorInfo()[2]);
            endif;
            
        else:
            $this->errorMsgTableExists('__delete', $table);
        endif;
    }
    
    function check_duplicate($table, $fields, $values){
        if($this->__checkTableExists($table)):
            $s = "SELECT count(*) from {$table} WHERE ";
            
            for($i=0; $i<count($fields); $i++):
                if(end($fields) == $fields[$i]):
                    $s .= "$fields[$i] = '$values[$i]' ";
                else:
                    $s .= " $fields[$i] = '$values[$i]' AND ";
                endif;
            endfor;
            
            return $this->conn->query($s)->fetchColumn();
         else:
            trigger_error('Tabela <code>' . $table . '</code> não existe.');
        endif;
    }
      
    public function createTable($columnsParams){        
        return $this->__createTable($columnsParams);
    }
    
    public function renameTable($old, $new){
        $this->__renameTable($old, $new);
    }

    public function modifyColumn($table, $column, $type, $constraints = ''){
        $this->__modifyColumn($table, $column, $type, $constraints = '');
    }

    public function maxId($table){
        return $this->__maxId($table);
    }

    public function desc($table, $order_by = 'id', $columns = '*', $limit = null){
        return $this->__desc($table, $order_by, $columns, $limit);
    }

    public function asc($table, $order_by = 'id', $columns = '*', $limit = null){
        return $this->__asc($table, $order_by, $columns, $limit);
    }

    public function qtd_max($table, $where = null){
        return $this->__count($table, $where);
    }

    public function fkReferences($table, $reference_table){
        return $this->__fkReferences($table, $reference_table);
    } 

    public function insert($table, $fields, $values){        
        return $this->__insert($table, $fields, $values);
    }
    
    public function update($table, $fields, $values, $whereField, $whereValue){        
        return $this->__update($table, $fields, $values, $whereField, $whereValue);
    }
    
    public function select($table, $columns = null, $where = null, $logical = 'AND'){
        return $this->__select($table, $columns, $where, $logical);
    }
    
    public function delete($table, $where = null, $logical = 'AND'){
        return $this->__delete($table, $where, $logical);
    }
}