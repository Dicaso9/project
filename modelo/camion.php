<?php
class Camion
{
    private $connection;
    public $matricula;

    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($dbConn) //constructor de Camion con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createCamion()
    {
        $query = "INSERT INTO camion (matricula)
            Values (?)";
        return $this->connection->execute_query($query, [$this->matricula]);
    }

    function getCamion()
    {
        $query = "SELECT * FROM camion WHERE matricula = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->matricula])->fetch_assoc();
    }

    function getAllCamion()
    {
        $query = "SELECT * FROM camion";
        return $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function updateCamion()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $query = "UPDATE camion SET NULL WHERE matricula = ?";
        // return $this->connection->execute_query($query, [$this->matricula]);
    }

    function patchCamion()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $columnsToUpdate = [];
        // $params = [];
        // $primaryKeyColumn = "matricula";

        // foreach (get_object_vars($this) as $property => $value) {
        //     if ($property !== $primaryKeyColumn && $property !== "connection" && isset($value)) {
        //         $columnsToUpdate[] = $property . " = ?";
        //         $params[] = $value;
        //     }
        // }

        // if (empty($columnsToUpdate)) {
        //     return false;
        // }

        // $query = "UPDATE camion SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        // $params[] = $this->matricula;

        // return $this->connection->execute_query($query, $params);
    }

    function deleteCamion()
    {
        $query = "DELETE FROM camion WHERE matricula = ?";
        return $this->connection->execute_query($query, [$this->matricula]);
    }

}
?>