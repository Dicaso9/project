<?php
class Package{
    private $connection;
    public $idPackage;
    public $name;
/////////////////////////////////////////////////////////////////////////////////////////////////////
    public function __construct($dbConn) //constructor de paquete con la conexion a la base de datos
    {
        $this->connection = $dbConn;
    }
    function createPackage(){
        $query = "INSERT INTO package (idPackage, name)
            Values (?, ?)";
        return $this->connection->execute_query($query, [$this->idPackage, $this->name]);
    }

    function getPackage(){
        $query = "SELECT * FROM package WHERE idPackage = ? LIMIT 0,1";
        return $this->connection->execute_query($query, [$this->idPackage])->fetch_assoc();
    }

    function getAllPackage(){
        $query = "SELECT * FROM package";
        return $this->connection->execute_query($query)->fetch_assoc();
    }

    function updatePackage(){
        $query = "UPDATE package SET name = ? WHERE idPackage = ?";
        return $this->connection->execute_query($query, [$this->name,$this->idPackage]);
    }

    function patchPackage(){
        $query = "UPDATE package SET ";
        if(isset($this->name))$query .= "name = ? ";
        $query .= "WHERE idPackage = ?";
        return $this->connection->execute_query($query, array_filter([$this->name,$this->idPackage], static function($var){return $var !== null;}));
    }

    function deletePackage(){
        $query = "DELETE FROM package WHERE idPackage = ?";
        return $this->connection->execute_query($query, [$this->idPackage]);
    }
}
?>