<?php

class Config {
    private const DBHOST = "localhost";
    private const DBPORT = 3306;
    private const DBNAME = "kasir_ub_mart";
    private const DBUSER = "root";
    private const DBPASS = "";
    protected $pdo = null;

    private $dsn = "mysql:host=". self::DBHOST . ":" . self::DBPORT . ";dbnames=" . self::DBNAME;

    // method for connection to the database
    public function __construct()
    {
        try {
            $this->pdo = new PDO($this->dsn, self::DBUSER, self::DBPASS);
            $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $this->pdo;
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}