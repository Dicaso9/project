<?php
class Pickup
{
    private $conn;
    public $matricula;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getPickup()
    { //WHERE uses table PK
        $query = "SELECT * FROM pickup WHERE matricula = ?";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllPickup()
    {
        $query = "SELECT * FROM pickup";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createPickup()
    { //INTO uses all attributes
        $query = "INSERT INTO pickup (matricula) VALUES (?)";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params);
    }

    // public function updatePickup()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE pickup SET atributos = ? WHERE matricula = ?";
    //     $params = [$this->atributos, $this->matricula];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchPickup()
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
    //     $query = "UPDATE pickup SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->matricula;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deletePickup()
    { //WHERE uses table PK
        $query = "DELETE FROM pickup WHERE matricula = ?";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params);
    }
}
?>