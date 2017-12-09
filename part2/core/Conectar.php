<?php
class Conectar{
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once 'config/database.php';
        $this->driver=DB_DRIVER;
        $this->host=DB_HOST;
        $this->user=DB_USER;
        $this->pass=DB_PASS;
        $this->database=DB_DATABASE;
        $this->charset=DB_CHARSET;
    }
    
    public function conexion(){

        $bbdd = $this->driver .':host='. $this->host .  ';dbname=' . $this->database . ';charset=' . $this->charset;

        //$bbdd = ' mysql:host=localhost;dbname=mvc1;charset=utf8';
        try {
            $connection = new PDO($bbdd, $this->user, $this->pass);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $e) {
            //Lanzamos la excepción
            throw new Exception('Problema al establecer conexión.');
        }
    }

}
?>
