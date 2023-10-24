<?php
class Ruta
{
    private $connection;
    public $idRuta;

    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($dbConn) //constructor de ruta con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createRuta()
    {
        $query = "INSERT INTO ruta (idRuta)
            Values (?)";
        return $this->connection->execute_query($query, [$this->idRuta]);
    }

    function getRuta()
    {
        $query = "SELECT * FROM ruta WHERE idRuta = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->idRuta])->fetch_assoc();
    }

    function getAllRuta()
    {
        $query = "SELECT * FROM ruta";
        return $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function updateRuta()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $query = "UPDATE ruta SET NULL WHERE idRuta = ?";
        // return $this->connection->execute_query($query, [$this->idRuta]);
    }

    function patchRuta()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $columnsToUpdate = [];
        // $params = [];
        // $primaryKeyColumn = "idRuta";

        // foreach (get_object_vars($this) as $property => $value) {
        //     if ($property !== $primaryKeyColumn && $property !== "connection" && isset($value)) {
        //         $columnsToUpdate[] = $property . " = ?";
        //         $params[] = $value;
        //     }
        // }

        // if (empty($columnsToUpdate)) {
        //     return false;
        // }

        // $query = "UPDATE ruta SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        // $params[] = $this->idRuta;

        // return $this->connection->execute_query($query, $params);
    }

    function deleteRuta()
    {
        $query = "DELETE FROM ruta WHERE idRuta = ?";
        return $this->connection->execute_query($query, [$this->idRuta]);
    }

}
?>