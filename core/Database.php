<?php

namespace core;

use PDO;


class Database
{
    public $connection;
    public $statement;
    private static $instance;
    private $configInfo = require base_path('config.php');

    private static $config;
    public function __construct($config, $username = "root", $password = "")
    {
        $dsn = ('mysql:' . http_build_query($config, "", ';'));
        $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    Database::$config = $this->configInfo;
    }


    public function query($query, $param = [])
    {
        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($param);

        return $this;
    }

    public function get()
    {
        return $this->statement->fetchAll();
    }
    public function find()
    {
        return $this->statement->fetch();
    }

    public function findOrFail()
    {
        $result = $this->find();

        if (!$result) {
            abort();
        }
        return $result;
    }

    public static function getInstance()
    {

        if (Database::$instance == null) {
            Database::$instance = new Database(Database::$config);
        }
        return Database::$instance;
    }
    public  function getLastRecordIdAdded($tableName)
    {
        $query = "SELECT id FROM " . $tableName
            . " ORDER BY id DESC"
            . " OFFSET 0 ROWS FETCH FIRST 1 ROW ONLY";

        $res = Database::$instance->query($query);


        return $res["id"];
    }

    function formatCondition($condition)
    {
        return trim($condition) === "*" ? "id > -1" : $condition;
    }
}
