<?php
class Camionero
{
    private $conn;
    public $ci;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getCamionero()
    { //WHERE uses table PK
        $query = "SELECT * FROM camionero WHERE ci = ?";
        $params = [$this->ci];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllCamionero()
    {
        $query = "SELECT * FROM camionero";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createCamionero()
    { //INTO uses all attributes
        $query = "INSERT INTO camionero (ci) VALUES (?)";
        $params = [$this->ci];
        return $this->conn->execute_query($query, $params);
    }

    // public function updateCamionero()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE camionero SET atributos = ? WHERE ci = ?";
    //     $params = [$this->atributos, $this->ci];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchCamionero()
    // { //Modified update, only changes values set in the request and lets others as they were before
    //     //the params array length is equal to columnsToUpdate array length
    //     $columnsToUpdate = [];
    //     $params = [];
    //     //primary key column name of the table
    //     $primaryKeyColumn = "ci";
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
    //     $query = "UPDATE camionero SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->ci;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deleteCamionero()
    { //WHERE uses table PK
        $query = "DELETE FROM camionero WHERE ci = ?";
        $params = [$this->ci];
        return $this->conn->execute_query($query, $params);
    }
}
?>