<?php


class MysqlConnector {
    public $con;

    private $host = 'localhost';
    private $db_name = 'portfolio';
    private $username = 'root';
    private $password = '';

    public function getConnection() {
        $this->con = null;

        try {
            $this->con = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name.';port=3306', $this->username, $this->password);
        } catch(PDOException $exception) {
            echo 'Connection error: '.$exception->getMessage();
        }

        return $this->con;
    }
}