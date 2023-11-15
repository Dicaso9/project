<?php
class Vehiculo
{
    private $conn;
    public $matricula;
    public $modelo;
    public $estado;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getVehiculo()
    { //WHERE uses table PK
        $query = "SELECT * FROM vehiculo WHERE matricula = ?";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllVehiculo()
    {
        $query = "SELECT * FROM vehiculo";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createVehiculo()
    { //INTO uses all attributes
        $query = "INSERT INTO vehiculo (matricula, modelo, estado) VALUES (?, ?, ?)";
        $params = [$this->matricula, $this->modelo, $this->estado];
        return $this->conn->execute_query($query, $params);
    }

    public function updateVehiculo()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE vehiculo SET modelo = ?, estado = ? WHERE matricula = ?";
        $params = [$this->modelo, $this->estado, $this->matricula];
        return $this->conn->execute_query($query, $params);
    }

    public function patchVehiculo()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        //primary key column name of the table
        $primaryKeyColumn = "matricula";
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
        //assembles the query with the columns to update and appends primary key
        $query = "UPDATE vehiculo SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        $params[] = $this->matricula;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteVehiculo()
    { //WHERE uses table PK
        $query = "DELETE FROM vehiculo WHERE matricula = ?";
        $params = [$this->matricula];
        return $this->conn->execute_query($query, $params);
    }
}