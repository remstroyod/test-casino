<?php
namespace Casino\Services;

use Exception;
use Simplon\Mysql\Mysql;
use Simplon\Mysql\PDOConnector;

class DB {

    /**
     * @var
     */
    protected $dbConn;

    /**
     * @var string
     */
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'test_casino';

    public function __construct()
    {

        $this->conn();

    }

    /**
     * @return void
     * @throws \Exception
     */
    private function conn()
    {

        try {

            $pdo = new PDOConnector(
                $this->host,        // server
                $this->user,        // user
                $this->password,    // password
                $this->database     // database
            );

            $pdoConn = $pdo->connect('utf8', []); // charset, options

            $this->dbConn = new Mysql($pdoConn);

        } catch (Exception $e) {

            echo $e->getMessage();

        }

    }

}
