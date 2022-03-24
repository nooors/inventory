<?php
ob_start();
session_start();

require_once 'config/db.php';
require_once 'config/parameters.php';
require_once 'helpers/utils.php';
require_once 'controllers/GeneralController.php';
require_once 'controllers/TallaController.php';
require_once 'controllers/CategoriaController.php';
require_once 'controllers/ColorController.php';
require_once 'controllers/FamiliaController.php';
require_once 'controllers/MarcaController.php';
require_once 'controllers/ModeloController.php';
require_once 'controllers/ProveedorController.php';
require_once 'controllers/PrendaController.php';
require_once 'controllers/UsuarioController.php';
require_once 'views/layout/header.php';
require_once 'views/layout/nav.php';



//Compruebo si me llega un controlador por URL
if(isset($_GET['controller'])){
    $controller_name = $_GET['controller'];
}elseif(!isset($_GET['controller'])){
    $controller_name = _CONTROLLER_DEFAULT_;
    }else{
        echo "error";
    }

if(class_exists($controller_name)){
    $controller = new $controller_name();
}

 if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
    $action = $_GET['action'];
    $controller->$action();

}elseif(!isset($_GET['action'])){
    $action = _ACTION_DEFAULT_;
    $controller->$action();
}else{
    var_dump($_GET);
    echo "error";
}

require_once 'views/layout/footer.php';
