<?php 

namespace App\Db;

use \PDO;
use \PDOException;

class Database {
    /**
     * host de conexão com o banco de dados 
     * @var string
     */
    
    const HOST = 'localhost';

    /**
     * nome do banco de dados
     * @var string
     */

    const NAME = 'vde';

     /**
      * nome do usuario
      * @var string
      */
    const USER = 'root';

     /**
      * senha de acesso ao banco de dado
      * @var string
      */

    const PASS = 'root'; 

    /**
     * nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instancia de conexão com o banco de dados
     * @var PDO
     */

    private $connection;

    /**
     * Define a tabela e instancia e conexão
     * @param string $table
     */
    public function __construct($table = null){
            $this->table = $table;
            $this->setConnection();
    }

    /** Metado responsável por criar uma canexao com a bonco de dados
     */
    private function setConnection(){
        try {

            $this->connection = new PDO('mysql:host=' .self::HOST. ';dbname=' .self::NAME, self::USER, self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            die('ERROR:' .$e->getMessage());
        }        
    }

    /** Metodo responsavel por executar queires dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     */
    public function execute($query, $params = []){
        
        try {

            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;

        } catch (PDOException $e) {
            die('ERROR:' .$e->getMessage());
        }       
    }

    /** Método responsavel por inserir dados no banco
     * @param array $value [field => value]
     * @return integer 
     */
    public function insert($values){

        //Dados da query
        $fields = array_keys($values);
        $binds  = array_pad([],count($fields) ,'?');

        //Monta a query
        $query = 'INSERT INTO ' .$this->table.' ('.implode(',',$fields).') VALUE ('.implode(',',$binds).')';

        //Executa o insert
        $this->execute($query, array_values($values));


        // retorno o id inserido
        return $this->connection->lastInsertId();
    }

    /**Método responsavel por executar uma consulta no banco 
     * @param string $where
     * @param string $order
     * @paran string $limit
     * @paran string $fields
     * @return PDOStatement
     */
    public function select($where = null, $order = null, $limit = null, $fields = '*') {
        
        // DADOS DA QUERY
        $whereClause = !is_null($where) ? ' WHERE ' . $where : '';
        $orderClause = !is_null($order) ? ' ORDER BY ' . $order : '';
        $limitClause = !is_null($limit) ? ' LIMIT ' . $limit : '';
   
        // MONTA A QUERY
        $query = 'SELECT ' . $fields . ' FROM ' . $this->table . $whereClause . $orderClause . $limitClause;

        return $this->execute($query);

    }

    /** Método responsavel para atualizar os dado no bando de dados
     * @param string $where
     * @param array $value [field = value]
     * return boolean 
     */
    public function update($where, $values){

    // DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE ' . $this->table . ' SET ' . implode('=?,',$fields) . '=? WHERE ' .$where;        
        $this ->execute($query, array_values($values));

        return true;



    }
    
}
