<?php
require_once 'models/Marca.php';

class MarcaController
{
    public function index()
    {
        $marca = new Marca();
        $marcas = $marca->getAll();
        $result = array();
        $counter = 0;
        while ($marca = $marcas->fetch_object()) {
            $result[$counter] = $marca;

            if ($result[$counter]->imagen == null) {
                $result[$counter]->imagen = "default.png";
            }
            $counter++;
        }


        require_once 'views/marcas/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if(isset($_GET) && isset($_GET['marcaId'])){
            $id = $_GET['marcaId'];
            $edit = true;
            $marcaOne = new Marca();
            $marcaOne->setId($id);
            $marca = $marcaOne->getOne();
            $edit = true;

        }

        require_once 'views/marcas/crear.php';
    }

    public function save()
    {
        if (isset($_POST) && isset($_POST['marca'])){
            $marca = new Marca();
            $marca->setMarca($_POST['marca']);
            //Comprobar que la marca no existe 
            $control = $marca->unicVerifyMarca();

            if($control == false){
                $marca->saveMarca();

                Utils::showMessageCrear('Marca');
            }else{
                require_once 'views/marcas/crear.php';
            }
        }
    }

    public function edit()
    {
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['marca'])){
            $id = (int)$_POST['id'];
            $nombre = $_POST['marca'];
            $marca = new Marca();
            $marca->setId($id);
            $marca->setMarca($nombre);
            $marca->update();
        }

        header('location:'._URL_BASE_.'/index.php?controller=marcaController&action=index');
    }
}