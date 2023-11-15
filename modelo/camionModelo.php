<?php
class Camion
{
    private $conn;
    public $matricula;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getCamion()
    { //WHERE uses table PK
        $query = "SELECT * FROM camion WHERE matricula = ?";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllCamion()
    {
        $query = "SELECT * FROM camion";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createCamion()
    { //INTO uses all attributes
        $query = "INSERT INTO camion (matricula) VALUES (?)";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params);
    }

    // public function updateCamion()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE camion SET atributos = ? WHERE matricula = ?";
    //     $params = [$this->atributos, $this->matricula];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchCamion()
    // { //Modified update, only changes values set in the request and lets others as they were before
    //     //the params array length is equal to columnsToUpdate array length
    //     $columnsToUpdate = [];
    //     $params = [];
    //     //primary key column name of the table
    //     $primaryKeyColumn = "matricula";
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
    //     $query = "UPDATE camion SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->matricula;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deleteCamion()
    { //WHERE uses table PK
        $query = "DELETE FROM camion WHERE matricula = ?";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params);
    }
}