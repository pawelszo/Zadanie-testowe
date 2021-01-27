<?php
namespace App\libs;

 
class Database {

    private $host = "database";
    private $username = "root";
    private $password = "password123";
    private $database = "my_db";

    public $dbconn;

    // get the database connection
    public function __construct(){

        $this->dbconn = null;

        try{
            $this->dbconn = new \PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);
            $this->dbconn->exec("set names utf8");
            
        }catch(PDOException $exception){
            echo "Error: " . $exception->getMessage();
        }


    }

    public function statement($sql)
    {
        $this->statement = $this->dbconn->prepare($sql);

    }

    public function bind($param, $value){
        $this->statement->bindValue($param, $value);
    }

    public function execute(){
        return $this->statement->execute();
    }

    public function rowCount()
    {
        $this->execute();
        return $this->statement->rowCount();
    }

    public function single()
    {
        $this->execute();
        return $this->statement->fetch(\PDO::FETCH_OBJ);
    }

    public function result()
    {
        $this->execute();
        return $this->statement->fetchAll(\PDO::FETCH_OBJ);
    }

}