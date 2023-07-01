<?php
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
        $query = "INSERT INTO users (email, firstName, lastName, password, type)
            Values (?, ?, ?, ?, ?)";
        return $this->connection->execute_query($query, [$this->email, $this->firstName, $this->lastName, $hashedPassword, $this->type]);
    }

    function login()
    {
        $query = "SELECT password FROM users WHERE email = ?";
        $hash = implode(mysqli_fetch_assoc($this->connection->execute_query($query, [$this->email])));
        if (password_verify($this->password, $hash)) {
            $_SESSION['type'] = implode(mysqli_fetch_assoc($this->connection->execute_query("SELECT type FROM users WHERE email = ?", [$this->email])));
            return true;
        } else
            return false;
    }

    function logout()
    {
        return session_unset();
    }
}