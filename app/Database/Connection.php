<?php
namespace App\Database;

use PDO;

class Connection
{

    private static $instance = null;

    public static function getInstance()
    {
        if(null === self::$instance){
            self::$instance = new Connection;
        }

        return self::$instance;
    }

    protected function __construct()
    {
        try {
            
            self::$instance = new PDO('mysql:host=localhost;dbname=simplemvc;charset=utf8mb4', 'root', 'root');
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 

        } catch (PDOException $e) {

            echo "Erro ao tentar conectar-se com o banco de dados. Aguarde ou contacte um administrador<br>";
            echo "Mensagem: " . $e->getMessage();
        }
    }

}