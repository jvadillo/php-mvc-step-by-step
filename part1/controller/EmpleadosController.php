<?php
class EmpleadosController{

    private $conectar;
    private $conexion;

    public function __construct() {
		require_once  __DIR__ . "/../core/Conectar.php";
        require_once  __DIR__ . "/../model/Empleado.php";
        
        $this->conectar=new Conectar();
        $this->conexion=$this->conectar->conexion();

    }

   /**
    * Ejecuta la acción correspondiente.
    *
    */
    public function run($accion){
        switch($accion)
        { 
            case "index" :
                $this->index();
                break;
            case "alta" :
                $this->crear();
                break;
            default:
                $this->index();
                break;
        }
    }
    
   /**
    * Carga la página principal de empleados con la lista de
    * empleados que consigue del modelo.
    *
    */ 
    public function index(){
        
        //Creamos el objeto empleado
        $empleado=new Empleado($this->conexion);
        
        //Conseguimos todos los empleados
        $empleados=$empleado->getAll();
       
        //Cargamos la vista index y le pasamos valores
        $this->view("index",array(
            "empleados"=>$empleados,
            "titulo" => "PHP MVC"
        ));
    }
    
   /**
    * Crea un nuevo empleado a partir de los parámetros POST 
    * y vuelve a cargar el index.php.
    *
    */
    public function crear(){
        if(isset($_POST["nombre"])){
            
            //Creamos un usuario
            $empleado=new Empleado($this->conexion);
            $empleado->setNombre($_POST["nombre"]);
            $empleado->setApellidos($_POST["apellidos"]);
            $empleado->setEmail($_POST["email"]);
            $empleado->setTelefono($_POST["telefono"]);
            $save=$empleado->save();
        }
        header('Location: index.php');
    }
    
    
   /**
    * Crea la vista que le pasemos con los datos indicados.
    *
    */
    public function view($vista,$datos){
        $empleados = $datos["empleados"];  
        require_once  __DIR__ . "/../view/" . $vista . "View.php";

    }

}
?>
