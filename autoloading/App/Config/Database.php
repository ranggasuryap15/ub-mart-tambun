<?php

namespace Config {

    use \PDO;

    class Database {
        private $host = "localhost";
        private $port = 3306;
        private $dbName = "kasir_ub_mart";
        private $username = "root";
        private $password = "";

        public function connect(): PDO 
        {
            $mysql = "mysql:host=". $this->host . ":" . $this->port . ";dbnames=" . $this->dbName;
            $pdo = new \PDO($mysql, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        }
    }
}