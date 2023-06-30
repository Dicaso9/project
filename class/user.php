<?php
session_start();
class User
{
    private $connection;
    public $email;
    public $firstName;
    public $lastName;
    public $password;
    public $type;
    
    public function __construct($dbConn)
    {
        $this->connection = $dbConn;
    }

    function register()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (email, firstName, lastName, type, password)
            Values (?, ?, ?, ?)";
        if($this->connection->execute_query($query,[$this->email, $this->firstName, $this->lastName, $this->type, $hashedPassword])){
            return true;
        }else return false;
    }

    function login(){
        $query = "SELECT password FROM users WHERE email = ?";
        if(password_verify($this->password,($this->connection->execute_query($query,[$this->email])))){
            $_SESSION['type']=$this->connection->execute_query("SELECT type FROM users WHERE email = ?", [$this->email]);
            return true;
        }else return false;
    }

    function logout(){
        session_unset();
    }
}