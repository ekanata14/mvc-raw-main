<?php

// This Database Concept is using PHP PDO, if you want to know more, just visit w3school website PDO PHP. The website has many resources for your knowledge hungry

class Database{ // Class Databse for using PHP PDO
    // Variable for take the defined variable from env file
    private $host = DB_HOST; // Host Variable 
    private $user = DB_USER; // User Variable
    private $pass = DB_PASS; // Password Variable
    private $db = DB_NAME; // Database Name Variable

    private $dbh;
    private $stmt;

    public function __construct()
    {
        // Just follow the steps, if you wanna know more about this lines of code, take a look at w3school website
        $dsn = "mysql:host=$this->host;dbname=$this->db";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    // Binding the data
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    // Function for querying a query that has been sent from model class
    public function query($query){
        $this->stmt = $this->dbh->prepare($query);
    }

    // Function for executing the query that has been queried in query function above
    public function execute(){
        $this->stmt->execute();
    }

    // Function for returning some results (It's used for getting some many datas such as user datas for admin page)
    public function resultAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function for returning just one result (It's usually used for getting a data for a user)
    public function result(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Function for returning how many rows that exist from a query (It's usually used for counting a data row, or checking whether the data exist in database or not when user is logging in or something)
    public function rowCount(){
        $this->execute();
        return $this->stmt->rowCount();
    }
}
