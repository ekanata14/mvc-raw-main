<?php

class User_model{ // User_model class is used to make a connection and query to database and processing data in user table
    private $table = "users"; // Choose what table you'd like to use
    private $db; // db Variable is used for database instantiating place

    public function __construct()
    {
        $this->db = new Database(); //Instantiating database class and put it to the $db variable
    }

    public function getAllUsers(){
        $this->db->query("SELECT * FROM {$this->table}"); // Using the db variable that has been instantiated from class Database for querying data from database
        return $this->db->resultAll();
    }

    public function getUserByUsername($username){
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username");
        $this->db->bind("username", $username);
        return $this->db->result();
    }
    
    public function getUserById($id){
        $this->db->query("SELECT * FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $id);
        return $this->db->result();
    }

    public function authByUsername($data){
        $this->db->query("SELECT * FROM {$this->table} WHERE username = :username AND password = :password");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        return $this->db->rowCount();
    }

    public function addUser($data){
        $this->db->query("INSERT INTO {$this->table} VALUES(NULL, :username, :password, :role)");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->bind("role", '2');
        return $this->db->rowCount();
    }

    public function addPetugas($data){
        $this->db->query("INSERT INTO {$this->table} VALUES(NULL, :username, :password, :role)");
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->bind("role", '1');
        return $this->db->rowCount();
    }

    public function editUser($data){
        $this->db->query("UPDATE {$this->table} SET username = :username, password = :password WHERE id = :id"); 
        $this->db->bind("id", $data['id']);
        $this->db->bind("username", $data['username']);
        $this->db->bind("password", $data['password']);
        $this->db->rowCount();
    }

    public function deleteUser($data){
        $this->db->query("DELETE FROM {$this->table} WHERE id = :id");
        $this->db->bind("id", $data['id']);
        return $this->db->rowCount();
    }
}