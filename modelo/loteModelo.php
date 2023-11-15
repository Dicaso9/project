<?php
class Lote
{
    private $conn;
    public $idLote;
    public $deCliente;
    public $idAlmacen;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function getLote()
    { //WHERE uses table PK
        $query = "SELECT * FROM lote WHERE idLote = ?";
        $params = [$this->idLote];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllLote()
    {
        $query = "SELECT * FROM lote";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createLote()
    { //INTO uses all attributes
        $query = "INSERT INTO lote (idLote, deCliente, idAlmacen) VALUES (?, ?, ?)";
        $params = [$this->idLote, $this->deCliente, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }

    public function updateLote()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE lote SET deCliente = ?, idAlmacen = ? WHERE idLote = ?";
        $params = [$this->deCliente, $this->idAlmacen, $this->idLote];
        return $this->conn->execute_query($query, $params);
    }

    public function patchLote()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        $primaryKeyColumn = "idLote";
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

        $query = "UPDATE lote SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        $params[] = $this->idLote;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteLote()
    { //WHERE uses table PK
        $query = "DELETE FROM lote WHERE idLote = ?";
        $params = [$this->idLote];
        return $this->conn->execute_query($query, $params);
    }


}
?>