<?php
class Pickup
{
    private $connection;
    public $matricula;

    /////////////////////////////////////////////////////////////////////////////////////////////////////

    public function __construct($dbConn) //constructor de Pickup con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createPickup()
    {
        $query = "INSERT INTO pickup (matricula)
            Values (?)";
        return $this->connection->execute_query($query, [$this->matricula]);
    }

    function getPickup()
    {
        $query = "SELECT * FROM pickup WHERE matricula = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->matricula])->fetch_assoc();
    }

    function getAllPickup()
    {
        $query = "SELECT * FROM pickup";
        return $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function updatePickup()
    {
        return "fuera de funcionamiento, faltan atributos en tablas sql";
        // $query = "UPDATE pickup SET NULL WHERE matricula = ?";
        // return $this->connection->execute_query($query, [$this->matricula]);
    }

    function patchPickup()
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

        // $query = "UPDATE pickup SET " . implode(", ", $columnsToUpdate) . " WHERE $primaryKeyColumn = ?";
        // $params[] = $this->matricula;

        // return $this->connection->execute_query($query, $params);
    }

    function deletePickup()
    {
        $query = "DELETE FROM pickup WHERE matricula = ?";
        return $this->connection->execute_query($query, [$this->matricula]);
    }

}
?>