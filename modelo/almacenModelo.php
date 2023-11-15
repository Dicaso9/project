<?php
class Almacen
{
    private $conn;
    public $idAlmacen;
    public $ubicacion;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }

    public function getAlmacen()
    { //WHERE uses table PK
        $query = "SELECT * FROM almacen WHERE idAlmacen = ?";
        $params = [$this->idAlmacen];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllAlmacen()
    {
        $query = "SELECT * FROM almacen";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createAlmacen()
    { //INTO uses all attributes
        $query = "INSERT INTO almacen (idAlmacen, ubicacion) VALUES (?, ?)";
        $params = [$this->idAlmacen, $this->ubicacion];
        return $this->conn->execute_query($query, $params);
    }

    public function updateAlmacen()
    { //WHERE uses table PK, SET uses all other attributes
        $query = "UPDATE almacen SET ubicacion = ? WHERE idAlmacen = ?";
        $params = [$this->ubicacion, $this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }

    public function patchAlmacen()
    { //Modified update, only changes values set in the request and lets others as they were before
        //the params array length is equal to columnsToUpdate array length
        $columnsToUpdate = [];
        $params = [];
        $primaryKeyColumn = "idAlmacen";
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

        $query = "UPDATE almacen SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        $params[] = $this->idAlmacen;

        return $this->conn->execute_query($query, $params);
    }

    public function deleteAlmacen()
    { //WHERE uses table PK
        $query = "DELETE FROM almacen WHERE idAlmacen = ?";
        $params = [$this->idAlmacen];
        return $this->conn->execute_query($query, $params);
    }


}
?>