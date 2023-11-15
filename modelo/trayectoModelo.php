<?php
class Trayecto
{
    private $conn;
    public $idTrayecto;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getTrayecto()
    { //WHERE uses table PK
        $query = "SELECT * FROM trayecto WHERE idTrayecto = ?";
        $params = [$this->idTrayecto];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllTrayecto()
    {
        $query = "SELECT * FROM trayecto";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createTrayecto()
    { //INTO uses all attributes
        $query = "INSERT INTO trayecto (idTrayecto) VALUES (?)";
        $params = [$this->idTrayecto];
        return $this->conn->execute_query($query, $params);
    }

    // public function updateTrayecto()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE trayecto SET atributos = ? WHERE idTrayecto = ?";
    //     $params = [$this->atributos, $this->idTrayecto];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchTrayecto()
    // { //Modified update, only changes values set in the request and lets others as they were before
    //     //the params array length is equal to columnsToUpdate array length
    //     $columnsToUpdate = [];
    //     $params = [];
    //     //primary key column name of the table
    //     $primaryKeyColumn = "idTrayecto";
    //     //checks for the existence of every single attribute on the object (except the db connection) and builds both arrays based on them
    //     foreach (get_object_vars($this) as $property => $value) {
    //         if ($property !== $primaryKeyColumn && $property !== "conn" && isset($value)) {
    //             $columnsToUpdate[] = $property . " = ?";
    //             $params[] = $value;
    //         }
    //     }

    //     if (empty($columnsToUpdate)) {
    //         return false;
    //     }
    //     //assembles the query with the columns to update and appends primary key
    //     $query = "UPDATE trayecto SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->idTrayecto;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deleteTrayecto()
    { //WHERE uses table PK
        $query = "DELETE FROM trayecto WHERE idTrayecto = ?";
        $params = [$this->idTrayecto];
        return $this->conn->execute_query($query, $params);
    }
}