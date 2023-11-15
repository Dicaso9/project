<?php
class Entrega
{
    private $conn;
    public $idPaquete;
    public $matricula;
    public $estado;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function getEntrega()
    { //WHERE uses table PK
        $query = "SELECT * FROM entrega WHERE idPaquete = ? AND matricula = ?";
        $params = [$this->idPaquete, $this->matricula];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllEntrega()
    {
        $query = "SELECT * FROM entrega";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createEntrega()
    { //INTO uses all attributes
        $query = "INSERT INTO entrega (idPaquete, matricula, estado) VALUES (?, ?, ?)";
        $params = [$this->idPaquete, $this->matricula, $this->estado];
        return $this->conn->execute_query($query, $params);
    }

    public function updateEntrega()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE entrega SET estado = ? WHERE idPaquete = ? AND matricula = ?";
        $params = [$this->estado, $this->idPaquete, $this->matricula];
        return $this->conn->execute_query($query, $params);
    }

    public function patchEntrega()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        //checks for the existence of every single attribute on the object (except the db connection) and builds both arrays based on them
        foreach (get_object_vars($this) as $property => $value) {
            if ($property !== "idPaquete" && $property !== "matricula" && $property !== "conn" && isset($value)) {
                $columnsToUpdate[] = $property . " = ?";
                $params[] = $value;
            }
        }

        if (empty($columnsToUpdate)) {
            return false;
        }

        $query = "UPDATE entrega SET " . implode(", ", $columnsToUpdate) . " WHERE idPaquete = ? AND matricula = ?";
        $params[] = $this->idPaquete;
        $params[] = $this->matricula;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteEntrega()
    { //WHERE uses table PK
        $query = "DELETE FROM entrega WHERE idPaquete = ? AND matricula = ?";
        $params = [$this->idPaquete, $this->matricula];
        return $this->conn->execute_query($query, $params);
    }


}
?>