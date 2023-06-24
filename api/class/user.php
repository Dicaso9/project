<?php
class User
{
    private $connection;
    public $email;
    public $firstName;
    public $lastName;
    public $password;
    public function __construct($dbConn)
    {
        $this->connection = $dbConn;

    }
    function create()
    {
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (email, firstName, lastName, password)
            Values (?, ?, ?, ?)";
        if($this->connection->execute_query($query,[$this->email, $this->firstName, $this->lastName, $hashedPassword])){
            return true;
        }else return false;
    }
}
?>