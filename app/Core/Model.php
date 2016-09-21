<?php
namespace App\Core;

use App\Core\QueryBuilder;
use App\Database\Connection;

class Model extends QueryBuilder
{
    protected $conn;

    public function __construct()
    {
        $this->conn = Connection::getInstance();
    }

    public function all()
    {
        try {
            $stmt = $this->conn->prepare($this->build());
            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            $this->showPdoError($e);
        }
    }

    public function first()
    {
        try {
            $stmt = $this->conn->prepare($this->build());
            $stmt->execute();

            return $stmt->fetch();

        } catch (PDOException $e) {
            $this->showPdoError($e);
        }
    }

    public function count()
    {
        try {
            $stmt = $this->conn->prepare($this->build());
            $stmt->execute();

            return $stmt->rowCount();
        } catch (PDOException $e) {
            $this->showPdoError($e);
        }
    }

    public function find($id)
    {
        try {
            $sql    = "SELECT * FROM {$this->table} WHERE id = :id";
            $stmt   = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
             $this->showPdoError($e);
        }
    }

    /* CRUD functions */

    public function create($args = [])
    {
        if(!is_array($args)){
            trigger_error('Você deve informar um array contendo os campos e valores a serem inseridos');
            return false;
        }

        try {

            $this->conn->beginTransaction();

            $fields = implode(', ', array_keys($args));
            $binds  = ':' . implode(', :', array_keys($args));

            $sql    = "INSERT INTO {$this->table} ({$fields}) VALUES ({$binds})";
            $stmt   = $this->conn->prepare($sql);
            foreach($args as $column => $value){
                $stmt->bindValue(':' . $column, $value);
            }
            $stmt->execute();
            $this->conn->commit();

            return true;
            
        } catch (PDOException $e) {
            $this->conn->rollback();
            $this->showPdoError($e);
        }
    }

    public function delete($id)
    {
        try {
            $this->conn->beginTransaction();

            $sql    = "DELETE FROM {$this->table} WHERE id = :id";
            $stmt   = $this->conn->prepare($sql);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            $this->conn->commit();

            return true;

        } catch (PDOException $e) {
            $this->conn->rollback();
            $this->showPdoError($e);
        }
    }

    public function update(array $args = [], $id)
    {
        if(!is_array($args)){
            trigger_error('Você deve informar um array contendo os campos e valores a serem inseridos no 1 argumento');
            return false;
        }
        if(func_num_args() != 2){
            trigger_error('Você deve informar um array com os campos e valores, e um id no 2 argumento');
            return false;
        }

        try {
            $this->conn->beginTransaction();

            $fields = [];
            foreach($args as $column => $value){
                $fields[] = $column . ' = :' . $column;
            }
            $binds = implode(', ' . $fields);

            $sql    = "UPDATE {$this->table} SET {$binds} WHERE id = :id";
            $stmt   = $this->conn->prepare($sql);
            foreach($args as $column => $value){
                $stmt->bindValue(':' . $column, $value);
            }
            $stmt->binvValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $this->conn->commit();

            return true;

        } catch (PDOException $e) {
            $this->conn->rollback();
            $this->showPdoError($e);
        }
    }

    private function showPdoError(PDOException $e)
    {
        echo "Sentimos muito, houve um erro na operação do banco de dados. Contate um administrador<br/>";
        echo "Erro: " . $e->getMEssage();
        die();
    }

}