<?php
class Paquete
{
    private $connection;
    public $idPaquete;
    public $matricula;
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct($dbConn) //constructor de paquete con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createPaquete()
    {
        $query = "INSERT INTO Paquete (idPaquete, matricula)
            Values (?, ?)";
        return $this->connection->execute_query($query, [$this->idPaquete, $this->matricula]);
    }

    function getPaquete()
    {
        $query = "SELECT * FROM Paquete WHERE idPaquete = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->idPaquete])->fetch_assoc();
    }

    function getAllPaquete()
    {
        $query = "SELECT * FROM Paquete";
        return $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function updatePaquete()
    {
        $query = "UPDATE Paquete SET matricula = ? WHERE idPaquete = ?";
        return $this->connection->execute_query($query, [$this->matricula, $this->idPaquete]);
    }

    function patchPaquete()
    {
        $columnsToUpdate = [];
        $params = [];
        $primaryKeyColumn = "idPaquete";

        foreach (get_object_vars($this) as $property => $value) {
            if ($property !== $primaryKeyColumn && $property !== "connection" && isset($value)) {
                $columnsToUpdate[] = $property . " = ?";
                $params[] = $value;
            }
        }

        if (empty($columnsToUpdate)) {
            return false;
        }

        $query = "UPDATE Paquete SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        $params[] = $this->idPaquete;

        return $this->connection->execute_query($query, $params);
    }

    function deletePaquete()
    {
        $query = "DELETE FROM Paquete WHERE idPaquete = ?";
        return $this->connection->execute_query($query, [$this->idPaquete]);
    }
}
?>