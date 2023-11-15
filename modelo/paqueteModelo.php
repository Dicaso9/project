<?php
class Paquete
{
    private $conn;
    public $idPaquete;
    public $destino;
    public $peso;
    public $contactoDestino;
    public $estado;
    public $ci;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getPaquete()
    { //WHERE uses table PK
        $query = "SELECT * FROM paquete WHERE idPaquete = ?";
        $params = [$this->idPaquete];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllPaquete()
    {
        $query = "SELECT * FROM paquete";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createPaquete()
    { //INTO uses all attributes
        $query = "INSERT INTO paquete (idPaquete, destino, peso, contactoDestino, estado, ci) VALUES (?, ?, ?, ?, ?, ?)";
        $params = [$this->idPaquete, $this->destino, $this->peso, $this->contactoDestino, $this->estado, $this->ci];
        return $this->conn->execute_query($query, $params);
    }

    public function updatePaquete()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE paquete SET destino = ?, peso = ?, contactoDestino = ?, estado = ?, ci = ? WHERE idPaquete = ?";
        $params = [$this->destino, $this->peso, $this->contactoDestino, $this->estado, $this->ci, $this->idPaquete];
        return $this->conn->execute_query($query, $params);
    }

    public function patchPaquete()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        $primaryKeyColumn = "idPaquete";
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

        $query = "UPDATE paquete SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        $params[] = $this->idPaquete;

        return $this->conn->execute_query($query, $params);
    }

    public function deletePaquete()
    { //WHERE uses table PK
        $query = "DELETE FROM paquete WHERE idPaquete = ?";
        $params = [$this->idPaquete];
        return $this->conn->execute_query($query, $params);
    }

}
?>