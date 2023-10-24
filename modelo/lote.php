<?php
class Lote
{
    private $connection;
    public $idLote;

    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($dbConn) //constructor de lote con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createLote()
    {
        $query = "INSERT INTO lote (idLote)
            Values (?)";
        return $this->connection->execute_query($query, [$this->idLote]);
    }

    function getLote()
    {
        $query = "SELECT * FROM lote WHERE idLote = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->idLote])->fetch_assoc();
    }

    function getAllLote()
    {
        $query = "SELECT * FROM lote";
        return $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function updateLote()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $query = "UPDATE lote SET NULL WHERE idLote = ?";
        // return $this->connection->execute_query($query, [$this->idLote]);
    }

    function patchLote()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $columnsToUpdate = [];
        // $params = [];
        // $primaryKeyColumn = "idLote";

        // foreach (get_object_vars($this) as $property => $value) {
        //     if ($property !== $primaryKeyColumn && $property !== "connection" && isset($value)) {
        //         $columnsToUpdate[] = $property . " = ?";
        //         $params[] = $value;
        //     }
        // }

        // if (empty($columnsToUpdate)) {
        //     return false;
        // }

        // $query = "UPDATE lote SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        // $params[] = $this->idLote;

        // return $this->connection->execute_query($query, $params);
    }

    function deleteLote()
    {
        $query = "DELETE FROM lote WHERE idLote = ?";
        return $this->connection->execute_query($query, [$this->idLote]);
    }


}
?>