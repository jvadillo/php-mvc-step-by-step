<?php
//Configuración global
require_once 'config/global.php';

//Cargamos el controlador y ejecutamos la accion
if(isset($_GET["controller"])){
    // Cargamos la instancia del controlador correspondiente
    $controllerObj=cargarControlador($_GET["controller"]);
    // Lanzamos la acción
    lanzarAccion($controllerObj);
}else{
    // Cargamos la instancia del controlador por defecto
    $controllerObj=cargarControlador(CONTROLADOR_DEFECTO);
    // Lanzamos la acción
    lanzarAccion($controllerObj);
}


function cargarControlador($controller){

    switch ($controller) {
        case 'empleados':
            $strFileController='controller/EmpleadosController.php';
            require_once $strFileController;
            $controllerObj=new EmpleadosController();
            break;
        
        default:
            $strFileController='controller/EmpleadosController.php';
            require_once $strFileController;
            $controllerObj=new EmpleadosController();
            break; 
    }
    return $controllerObj;
}

function lanzarAccion($controllerObj){
    if(isset($_GET["action"])){
        $controllerObj->run($_GET["action"]);
    }else{
        $controllerObj->run(ACCION_DEFECTO);
    }
}

/*
function cargarControlador($controller){
	// Creamos el nombre del controlador: e.j. usuarioController
    $controlador=ucwords($controller).'Controller';
    // Creamos el nombre del archivo del controlador: e.j. controller/usuarioController.php
    $strFileController='controller/'.$controlador.'.php';
    //Si no existe ningun controlador con ese nombre, cargamos el definido por defecto.
    if(!is_file($strFileController)){
        $strFileController='controller/'.ucwords(CONTROLADOR_DEFECTO).'Controller.php';   
    }
    //Cargamos el archivo donde está definido el controlador:
    require_once $strFileController;
    //Creamos el objeto
    $controllerObj=new $controlador();
    return $controllerObj;
}
*/


?>