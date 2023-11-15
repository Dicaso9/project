<?php
class Opera
{
    private $conn;
    public $ci;
    public $idAlmacen;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getOpera()
    { //WHERE uses table PK
        $query = "SELECT * FROM opera WHERE ci = ? AND idAlmacen = ?";
        $params = [$this->ci, $this->idAlmacen];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllOpera()
    {
        $query = "SELECT * FROM opera";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createOpera()
    { //INTO uses all attributes
        $query = "INSERT INTO opera (ci, idAlmacen) VALUES (?, ?)";
        $params = [$this->ci, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }

    // public function updateOpera()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE opera SET atributos = ? WHERE ci = ?";
    //     $params = [$this->atributos, $this->ci];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchOpera()
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
    //     $query = "UPDATE opera SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->ci;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deleteOpera()
    { //WHERE uses table PK
        $query = "DELETE FROM opera WHERE ci = ? AND idAlmacen = ?";
        $params = [$this->ci, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }
}