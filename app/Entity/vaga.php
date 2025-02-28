<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Vaga{
    /** Identificador único da vaga
     * @var integer
     */
    public $id;

    /** Título da vaga
     * @var string
     */
    public $titulo;

    /** Descrição da vaga (pode conter html)
     * @var string
     */

    public $descricao;

     /** Define se a vaga ativa
      * @var string (s/n)
      */

    public $ativo;

    /** Data de publicação da vaga
       * @var string
       */
    public $data;

    /** Método responsavel por cadastrar uma nova vagano banco
     *@return boolean 
     */
    public function cadastrar(){

        //DEFINIR A DATA
        $this-> data = date('Y-m-d H:i:s');

        //INSERIR A VAGA NO BANCO DE DADOS
        $obDatabase = new Database('vagas');        
        $this->id = $obDatabase->insert([

                'titulo'        => $this->titulo,
                'descricao'     => $this->descricao,
                'ativo'         => $this->ativo,
                'data'          => $this->data
            ]);

        // echo "<pre>"; print_r($this); echo "</pre>"; exit;

        // RETORNAR SUCESSO
        return true;

    }

    /** Método responsavel pelo update
     * return boolean
     */
    
    public function atualizar(){

        return (new Database('vagas')) ->update('id = '.$this->id,[
                
                'titulo'        => $this->titulo,
                'descricao'     => $this->descricao,
                'ativo'         => $this->ativo,
                'data'          => $this->data,
        ]);
    }

    /** Metodo responsavel por obter as vagas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * return array
     */

    public static function getVagas($where = null, $order = null, $limit = null){
        
        return (new Database('vagas'))->select($where,$order,$limit) 
                                      ->fetchAll(PDO::FETCH_CLASS,self::class);

    } 

    /** Método para buscar uma vaga com base no seu ID
     * @param integer id
     * return Vaga
     */
    public static function getVaga($id){   
        
        return (new Database('vagas'))->select('id=' .$id)
                                      ->fetchObject(self::class);

    }
}
