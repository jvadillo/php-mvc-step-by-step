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

        $consulta = $this->conexion->prepare("INSERT INTO empleados (nombre,apellidos,email,telefono)
                                        VALUES (:nombre,:apellidos,:email,:telefono)");
        $consulta->execute(array(
            "nombre" => $this->nombre,
            "apellidos" => $this->apellidos,
            "email" => $this->email,
            "telefono" => $this->telefono
        ));
        $this->conexion = null;

        return $save;
    }
    
    public function getAll(){

        $consulta = $this->conexion->prepare("SELECT id,nombre,apellidos,email,telefono FROM empleados");
        $consulta->execute();
        /* Fetch all of the remaining rows in the result set */
        $resultados = $consulta->fetchAll();
        $this->conexion = null; //cierre de conexión
        return $resultados;

    }
}
?>
