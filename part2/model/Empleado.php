<?php
class Empleado {
    private $table = "empleados";
    private $conexion;

    private $id;
    private $nombre;
    private $apellidos;
    private $email;
    private $telefono;

    public function __construct($conexion) {
		$this->conexion = $conexion;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApellidos() {
        return $this->apellidos;
    }

    public function setApellidos($apellidos) {
        $this->apellidos = $apellidos;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function save(){

        $consulta = $this->conexion->prepare("INSERT INTO " . $this->table . " (nombre,apellidos,email,telefono)
                                        VALUES (:nombre,:apellidos,:email,:telefono)");
        $result = $consulta->execute(array(
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "email" => $this->email,
            "telefono" => $this->telefono
        ));
        $this->conexion = null;

        return $result;
    }

    public function update(){

        $consulta = $this->conexion->prepare("
            UPDATE " . $this->table . " 
            SET 
                nombre = :nombre,
                apellidos = :apellidos, 
                email = :email,
                telefono = :telefono
            WHERE id = :id 
        ");

        $resultado = $consulta->execute(array(
            "id" => $this->id,
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "email" => $this->email,
            "telefono" => $this->telefono
        ));
        $this->conexion = null;

        return $resultado;
    }
        
    
    public function getAll(){

        $consulta = $this->conexion->prepare("SELECT id,nombre,apellidos,email,telefono FROM " . $this->table);
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }
    
    
    public function getById($id){
        $consulta = $this->conexion->prepare("SELECT id,nombre,apellidos,email,telefono 
                                                FROM " . $this->table . "  WHERE id = :id");
        $consulta->execute(array(
            "id" => $id
        ));
        /* Fetch all of the remaining rows in the result set */
        $resultado = $consulta->fetchObject();
        $this->conexion = null; //cierre de conexión
        return $resultado;
    }
    
    public function getBy($column,$value){
        $consulta = $this->conexion->prepare("SELECT id,nombre,apellidos,email,telefono 
                                                FROM " . $this->table . " WHERE :column = :value");
        $consulta->execute(array(
            "column" => $column,
            "value" => $value
        ));
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;
    }
    
    public function deleteById($id){
        try {
            $consulta = $this->conexion->prepare("DELETE FROM " . $this->table . " WHERE id = :id");
            $consulta->execute(array(
                "id" => $id
            ));
            $conexion = null;
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteById): ' . $e->getMessage();
            return -1;
        }
    }
    
    public function deleteBy($column,$value){
        try {
            $consulta = $this->conexion->prepare("DELETE FROM " . $this->table . " WHERE :column = :value");
            $consulta->execute(array(
                "column" => $value,
                "value" => $value,
            ));
            $conexion = null;
        } catch (Exception $e) {
            echo 'Falló el DELETE (deleteBy): ' . $e->getMessage();
            return -1;
        }
    }
    
}
?>
