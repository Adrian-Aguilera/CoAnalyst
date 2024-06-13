<?php
require_once '../vendor/autoload.php';

use Dotenv\Dotenv;

class Coanalystdb {
    private $connection;

    public function __construct() {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../CoAnalyst/');
        $dotenv->load();
        $this->connect();
    }

    private function connect() {
        $serverName = $_ENV["Server_name"];
        $userName = $_ENV["User_Name"];
        $password = $_ENV["Password"];
        $dbName = $_ENV["DB_name"];
        
        $this->connection = new mysqli($serverName, $userName, $password, $dbName);
        
        if ($this->connection->connect_error) {
            error_log('Connection failed: ' . $this->connection->connect_error);
            return false;
        }
        return $this->connection;
    }

    public function getConnection() {
        return $this->connection;
    }
}

/*
$db = new Coanalystdb();    
$conexion = $db->getConnection();

if ($conexion) {
    echo "Conexión exitosa";
} else {
    echo "Falló la conexión";
}*/