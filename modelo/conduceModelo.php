<?php
class Conduce
{
    private $conn;
    public $ci;
    public $matricula;
    public $fechaInicio;
    public $fechaFin;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function getConduce()
    { //WHERE uses table PK
        $query = "SELECT * FROM conduce WHERE ci = ? AND matricula = ?";
        $params = [$this->ci, $this->matricula];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllConduce()
    {
        $query = "SELECT * FROM conduce";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createConduce()
    { //INTO uses all attributes
        $query = "INSERT INTO conduce (ci, matricula, fechaInicio, fechaFin) VALUES (?, ?, ?, ?)";
        $params = [$this->ci, $this->matricula, $this->fechaInicio, $this->fechaFin];
        return $this->conn->execute_query($query, $params);
    }

    public function updateConduce()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE conduce SET fechaInicio = ?, fechaFin = ? WHERE ci = ? AND matricula = ?";
        $params = [$this->fechaInicio, $this->fechaFin, $this->ci, $this->matricula];
        return $this->conn->execute_query($query, $params);
    }

    public function patchConduce()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        //checks for the existence of every single attribute on the object (except the db connection) and builds both arrays based on them
        foreach (get_object_vars($this) as $property => $value) {
            if ($property !== "ci" && $property !== "matricula" && $property !== "conn" && isset($value)) {
                $columnsToUpdate[] = $property . " = ?";
                $params[] = $value;
            }
        }

        if (empty($columnsToUpdate)) {
            return false;
        }

        $query = "UPDATE conduce SET " . implode(", ", $columnsToUpdate) . " WHERE ci = ? AND matricula = ?";
        $params[] = $this->ci;
        $params[] = $this->matricula;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteConduce()
    { //WHERE uses table PK
        $query = "DELETE FROM conduce WHERE ci = ? AND matricula = ?";
        $params = [$this->ci, $this->matricula];
        return $this->conn->execute_query($query, $params);
    }


}
?>