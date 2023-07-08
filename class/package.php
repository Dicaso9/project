<?php
class Package
{
    private $connection;
    public $idPackage;
    public $name;
    public $idBatch;
    /////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct($dbConn) //constructor de paquete con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createPackage()
    {
        $query = "INSERT INTO package (idPackage, name)
            Values (?, ?)";
        return $this->connection->execute_query($query, [$this->idPackage, $this->name]);
    }

    function getPackage()
    {
        $query = "SELECT * FROM package WHERE idPackage = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->idPackage])->fetch_assoc();
    }

    function getAllPackage()
    {
        $query = "SELECT * FROM package";
        return $this->connection->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    function updatePackage()
    {
        $query = "UPDATE package SET name = ?, idBatch = ? WHERE idPackage = ?";
        return $this->connection->execute_query($query, [$this->name, $this->idBatch, $this->idPackage]);
    }

    function patchPackage()
    {
        $isFirst = true;
        $query = "UPDATE package SET";
        if (isset($this->name)) {
            $query .= " name = ?";
            $isFirst = false;
        }
        if (isset($this->idBatch)) {
            if (!$isFirst) {
                $query .= ",";
            }
            $query .= " idBatch = ?";
            $isFirst = false;
        }
        $query .= " WHERE idPackage = ?";
        $params = array_values(array_filter([$this->name, $this->idBatch, $this->idPackage], static function ($var) {
            return $var !== null;
        }));
        return $this->connection->execute_query($query, $params);
    }

    function deletePackage()
    {
        $query = "DELETE FROM package WHERE idPackage = ?";
        return $this->connection->execute_query($query, [$this->idPackage]);
    }
}
?>