<?php
session_start();
if($_SESSION['type']='chofer'){
    
}
class Database{
    private $host="localhost";
    private $user="root";
    private $password="";
    private $name="bd";

    public function dbConnect(){
        mysqli_report(MYSQLI_REPORT_STRICT | MYSQLI_REPORT_ALL);
        try{
        $connection = new mysqli($this->host,$this->user,$this->password,$this->name);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        return $connection;
    }

}
?>