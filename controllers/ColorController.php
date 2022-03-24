<?php
require_once 'models/Color.php';

class ColorController
{
    public function index()
    {
        $color = new Color();
        $colores = $color->getAll();

        require_once 'views/colores/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if(isset($_GET) && isset($_GET['colorId'])){
            $id = $_GET['colorId'];
            $edit = true;
            $colorOne = new color();
            $colorOne->setId($id);
            $color = $colorOne->getOne();
            $edit = true;

        }
        require_once 'views/colores/crear.php';
    }

    public function save()
    {
        if(isset($_POST)){
            if(isset($_POST['color'])){
                $color = $_POST['color'];
                if(isset($_POST['codigo'])){
                    $codigo = $_POST['codigo'];
                }else{
                    $codigo = null;
                }
                
                $col = new Color();
                $col->setColor($color);
                $col->setCodigo($codigo);
                //Comprobar que el color no figure ya en la base de date_offset_get
                $control = $col->unicVerifyColor();
                
                if($control == false){
                    $col->saveColor();

                    Utils::showMessageCrear('Color');
                }else{
                    require_once 'views/colores/crear.php';
                }
            }
        }
    }

    public function edit()
    {
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['color']) && isset($_POST['codigo'])){
            $id = (int)$_POST['id'];
            $nombre = $_POST['color'];
            $codigo = $_POST['codigo'];
            $color = new Color();
            $color->setId($id);
            $color->setColor($nombre);
            $color->setCodigo($codigo);
            $color->update();
        }

        header('location:'._URL_BASE_.'/index.php?controller=ColorController&action=index');
    }
}