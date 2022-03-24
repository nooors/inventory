<?php
require_once 'models/Talla.php';

class TallaController
{
    public function index()
    {
        $talla = new Talla();
        $tallas = $talla->getAll();
        
        require_once 'views/tallas/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if(isset($_GET) && isset($_GET['tallaId'])){
            $id = $_GET['tallaId'];
            $edit = true;
            $tallaOne = new Talla();
            $tallaOne->setId($id);
            $talla = $tallaOne->getOne();
            $edit = true;

        }

        require_once 'views/tallas/crear.php';
    }

    public function save()
    {
        if(isset($_POST) && isset($_POST['talla'])){
            $talla = new Talla();
            $talla->setTalla($_POST['talla']);

            // Comprobar que la talla no existe en la tabla 
            $control = $talla->unicVerifyProveedor();

            if ($control == false){
                $talla->saveTalla();

                Utils::showMessageCrear('Talla');
            }else{
                require_once 'views/tallas/crear.php';
            }
        }
    }

    public function edit()
    {
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['talla'])){
            $id = (int)$_POST['id'];
            $nombre = $_POST['talla'];
            $talla = new Talla();
            $talla->setId($id);
            $talla->settalla($nombre);
            $talla->update();
        }

        header('location:'._URL_BASE_.'/index.php?controller=TallaController&action=index');
    }
}