<?php
class User
{
    private $connection;
    public $email;
    public $firstName;
    public $lastName;
    public $password;

    public $type; // almacena el alcance de permisos (admin, funcionario, camionero, cliente)

    public function __construct($dbConn) //constructor de usuario con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }

    function register() // registra a un usuario a la base de datos (backoffice)
    {
        $hashedPassword = password_hash($this->password, PASSWORD_BCRYPT);
        $query = "INSERT INTO user (email, firstName, lastName, password, type)
            Values (?, ?, ?, ?, ?)";
        return $this->connection->execute_query($query, [$this->email, $this->firstName, $this->lastName, $hashedPassword, $this->type]);
    }

    function login() // confirma las credenciales ingresadas con la base de datos y genera una _SESSION con alcance de permisos
    {
        $query = "SELECT password FROM user WHERE email = ?";
        $hash = implode(mysqli_fetch_assoc($this->connection->execute_query($query, [$this->email])));
        if (password_verify($this->password, $hash)) {
            //jwt a futuro
            $_SESSION['type'] = implode(mysqli_fetch_assoc($this->connection->execute_query("SELECT type FROM user WHERE email = ?", [$this->email])));
            return true;
        } else
            return false;
    }

    function logout() // borra los datos de la _SESSION
    {
        //jwt a futuro
        return session_unset();
    }
}