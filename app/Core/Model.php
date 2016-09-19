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
        } catch (Exception $e) {
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