<?php
class Compone
{
    private $conn;
    public $idLote;
    public $idPaquete;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getCompone()
    { //WHERE uses table PK
        $query = "SELECT * FROM compone WHERE idLote = ? AND idPaquete = ?";
        $params = [$this->idLote, $this->idPaquete];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllCompone()
    {
        $query = "SELECT * FROM compone";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createCompone()
    { //INTO uses all attributes
        $query = "INSERT INTO compone (idLote, idPaquete) VALUES (?, ?)";
        $params = [$this->idLote, $this->idPaquete];
        return $this->conn->execute_query($query, $params);
    }

    // public function updateCompone()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE compone SET atributos = ? WHERE idLote = ?";
    //     $params = [$this->atributos, $this->idLote];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchCompone()
    // { //Modified update, only changes values set in the request and lets others as they were before
    //     //the params array length is equal to columnsToUpdate array length
    //     $columnsToUpdate = [];
    //     $params = [];
    //     //primary key column name of the table
    //     $primaryKeyColumn = "idLote";
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
    //     $query = "UPDATE compone SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->idLote;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deleteCompone()
    { //WHERE uses table PK
        $query = "DELETE FROM compone WHERE idLote = ? AND idPaquete = ?";
        $params = [$this->idLote, $this->idPaquete];
        return $this->conn->execute_query($query, $params);
    }
}