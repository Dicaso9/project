<?php
class User
{  
    private $connection;
    public $email;
    public $firstname;
    public $lastname;
    public $password;
    public function __construct($dbConn)
    {
        $this->connection = $dbConn;

    }
    function create()
    {
        $query = "INSERT INTO users
                SET
                    firstname = :firstname,
                    lastname = :lastname,
                    email = :email,
                    password = :password";
        $stmt = $this->connection->prepare($query);
        $this->firstname = htmlspecialchars(strip_tags($this->firstname));
        $this->lastname = htmlspecialchars(strip_tags($this->lastname));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->password = htmlspecialchars(strip_tags($this->password));
        $stmt->bindParam(':firstname', $this->firstname);
        $stmt->bindParam(':lastname', $this->lastname);
        $stmt->bindParam(':email', $this->email);
        $password_hash = password_hash($this->password, PASSWORD_BCRYPT);
        $stmt->bindParam(':password', $password_hash);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>