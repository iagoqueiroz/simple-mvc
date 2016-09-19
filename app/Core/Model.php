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
            $stmt = $this->conn->prepare($this->build);
            $stmt->execute();

            return $stmt->fetchAll();
            
        } catch (PDOException $e) {
            $this->showPdoError($e);
        }
    }

    public function first()
    {
        try {
            $stmt = $this->conn->prepare($this->build);
            $stmt->execute();

            return $stmt->fetch();

        } catch (PDOException $e) {
            $this->showPdoError($e);
        }
    }

    public function count()
    {
        try {
            $stmt = $this->conn->prepare($this->build);
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
            foreach($args as $colum => $value){
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
            this->conn->rollback();
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