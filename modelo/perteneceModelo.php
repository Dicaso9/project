<?php
class Pertenece
{
    private $conn;
    public $matricula;
    public $idAlmacen;
    public $fechaInicio;
    public $fechaFin;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function getPertenece()
    { //WHERE uses table PK
        $query = "SELECT * FROM pertenece WHERE matricula = ? AND idAlmacen = ?";
        $params = [$this->matricula, $this->idAlmacen];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllPertenece()
    {
        $query = "SELECT * FROM pertenece";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createPertenece()
    { //INTO uses all attributes
        $query = "INSERT INTO pertenece (matricula, idAlmacen, fechaInicio, fechaFin) VALUES (?, ?, ?, ?)";
        $params = [$this->matricula, $this->idAlmacen, $this->fechaInicio, $this->fechaFin];
        return $this->conn->execute_query($query, $params);
    }

    public function updatePertenece()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE pertenece SET fechaInicio = ?, fechaFin = ? WHERE matricula = ? AND idAlmacen = ?";
        $params = [$this->fechaInicio, $this->fechaFin, $this->matricula, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }

    public function patchPertenece()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        //checks for the existence of every single attribute on the object (except the db connection) and builds both arrays based on them
        foreach (get_object_vars($this) as $property => $value) {
            if ($property !== "matricula" && $property !== "idAlmacen" && $property !== "conn" && isset($value)) {
                $columnsToUpdate[] = $property . " = ?";
                $params[] = $value;
            }
        }

        if (empty($columnsToUpdate)) {
            return false;
        }

        $query = "UPDATE pertenece SET " . implode(", ", $columnsToUpdate) . " WHERE matricula = ? AND idAlmacen = ?";
        $params[] = $this->matricula;
        $params[] = $this->idAlmacen;

        return $this->conn->execute_query($query, $params);
    }

    public function deletePertenece()
    { //WHERE uses table PK
        $query = "DELETE FROM pertenece WHERE matricula = ? AND idAlmacen = ?";
        $params = [$this->matricula, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }


}
?>