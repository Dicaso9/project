<?php
class Segmento
{
    private $conn;
    public $idTrayecto;
    public $idAlmacen;
    public $orden;
    public $tiempo;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function getSegmento()
    { //WHERE uses table PK
        $query = "SELECT * FROM segmento WHERE idTrayecto = ? AND idAlmacen = ?";
        $params = [$this->idTrayecto, $this->idAlmacen];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllSegmento()
    {
        $query = "SELECT * FROM segmento";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createSegmento()
    { //INTO uses all attributes
        $query = "INSERT INTO segmento (idTrayecto, idAlmacen, orden, tiempo) VALUES (?, ?, ?, ?)";
        $params = [$this->idTrayecto, $this->idAlmacen, $this->orden, $this->tiempo];
        return $this->conn->execute_query($query, $params);
    }

    public function updateSegmento()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE segmento SET orden = ?, tiempo = ? WHERE idTrayecto = ? AND idAlmacen = ?";
        $params = [$this->orden, $this->tiempo, $this->idTrayecto, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }

    public function patchSegmento()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        //checks for the existence of every single attribute on the object (except the db connection) and builds both arrays based on them
        foreach (get_object_vars($this) as $property => $value) {
            if ($property !== "idTrayecto" && $property !== "idAlmacen" && $property !== "conn" && isset($value)) {
                $columnsToUpdate[] = $property . " = ?";
                $params[] = $value;
            }
        }

        if (empty($columnsToUpdate)) {
            return false;
        }

        $query = "UPDATE segmento SET " . implode(", ", $columnsToUpdate) . " WHERE idTrayecto = ? AND idAlmacen = ?";
        $params[] = $this->idTrayecto;
        $params[] = $this->idAlmacen;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteSegmento()
    { //WHERE uses table PK
        $query = "DELETE FROM segmento WHERE idTrayecto = ? AND idAlmacen = ?";
        $params = [$this->idTrayecto, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }


}
?>