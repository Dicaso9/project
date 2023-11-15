<?php
class Usuario
{
    private $conn;
    public $ci;
    public $nombre;
    public $apellido;
    public $mail;
    public $telefono;
    public $passwd;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getUsuario()
    { //WHERE uses table PK
        $query = "SELECT * FROM usuario WHERE ci = ?";
        $params = [$this->ci];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllUsuario()
    {
        $query = "SELECT * FROM usuario";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createUsuario()
    { //INTO uses all attributes
        $hashed = password_hash($this->passwd, PASSWORD_DEFAULT);
        $query = "INSERT INTO usuario (ci, nombre, apellido, mail, telefono, passwd) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$this->ci, $this->nombre, $this->apellido, $this->mail, $this->telefono, $hashed];
        return $this->conn->execute_query($query, $params);
    }

    public function updateUsuario()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE usuario SET nombre = ?, apellido = ?, mail = ?, telefono = ?, passwd = ? WHERE ci = ?";
        $params = [$this->nombre, $this->apellido, $this->mail, $this->telefono, $this->passwd, $this->ci];
        return $this->conn->execute_query($query, $params);
    }

    public function patchUsuario()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        $primaryKeyColumn = "ci";
        //checks for the existence of every single attribute on the object (except the db connection) and builds both arrays based on them
        foreach (get_object_vars($this) as $property => $value) {
            if ($property !== $primaryKeyColumn && $property !== "conn" && isset($value)) {
                $columnsToUpdate[] = $property . " = ?";
                $params[] = $value;
            }
        }

        if (empty($columnsToUpdate)) {
            return false;
        }

        $query = "UPDATE usuario SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        $params[] = $this->ci;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteUsuario()
    { //WHERE uses table PK
        $query = "DELETE FROM usuario WHERE ci = ?";
        $params = [$this->ci];
        return $this->conn->execute_query($query, $params);
    }

}
?>