<?php
class Transporte
{
    private $conn;
    public $idTrayecto;
    public $idAlmacen;
    public $idLote;
    public $matricula;
    public function __construct($dbConn)
    {
        $this->conn = $dbConn;
    }
    public function getTransporte()
    { //WHERE uses table PK
        $query = "SELECT * FROM transporte WHERE idTrayecto = ? AND idAlmacen = ? AND idLote = ? AND matricula = ?";
        $params = [$this->idTrayecto, $this->idAlmacen, $this->idLote, $this->matricula];
        return $this->conn->execute_query($query, $params)->fetch_assoc();
    }

    public function getAllTransporte()
    {
        $query = "SELECT * FROM transporte";
        return $this->conn->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function createTransporte()
    { //INTO uses all attributes
        $query = "INSERT INTO transporte (idTrayecto) VALUES (?)";
        $params = [$this->idTrayecto];
        return $this->conn->execute_query($query, $params);
    }

    // public function updateTransporte()
    // { //WHERE uses table PK, SET uses all other attributes
    //     $query = "UPDATE transporte SET atributos = ? WHERE idTrayecto = ?";
    //     $params = [$this->atributos, $this->idTrayecto];
    //     return $this->conn->execute_query($query, $params);
    // }

    // public function patchTransporte()
    // { //Modified update, only changes values set in the request and lets others as they were before
    //     //the params array length is equal to columnsToUpdate array length
    //     $columnsToUpdate = [];
    //     $params = [];
    //     //primary key column name of the table
    //     $primaryKeyColumn = "idTrayecto";
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
    //     $query = "UPDATE transporte SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
    //     $params[] = $this->idTrayecto;

    //     return $this->conn->execute_query($query, $params);
    // }

    public function deleteTransporte()
    { //WHERE uses table PK
        $query = "DELETE FROM transporte WHERE idTrayecto = ? AND idAlmacen = ? AND idLote = ? AND matricula = ?";
        $params = [$this->idTrayecto, $this->idAlmacen, $this->idLote, $this->matricula];
        return $this->conn->execute_query($query, $params);
    }
}
?>