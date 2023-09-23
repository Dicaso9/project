<?php
class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $name = "projectv6";

    public function dbConnect() // metodo de conexion a la base de datos
    {
        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL ^ MYSQLI_REPORT_INDEX);
        try {
            $connection = new mysqli($this->host, $this->user, $this->password, $this->name);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        return $connection;
    }

}
?>