<?php
require_once 'models/Familia.php';

class FamiliaController
{
    public function index()
    {
        $familia = new Familia();
        $familias = $familia->getAll();
        //Si familias es diferente true trae un result-set que pasamos a una array
        if($familias){
            $result = array();
            $count = 0;

            while($row = $familias -> fetch_object()){
                $result[$count] = $row;
                //Si no hay imgagen asignamos una default.png
                if($result[$count] -> imagen == null){
                    $result[$count] -> imagen = 'default.png';
                }
                $count++;
            }
        }else{
            $error = true;
        }
        

        require_once 'views/familias/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if(isset($_GET) && isset($_GET['familiaId'])){
            $id = $_GET['familiaId'];
            $edit = true;
            $familiaOne = new familia();
            $familiaOne->setId($id);
            $familia = $familiaOne->getOne();
            $edit = true;

        }
        require_once 'views/familias/crear.php';
    }

    public function save()
    {
        if(isset($_POST) && isset($_POST['familia']))
        {
            $familia = new Familia();
            $familia->setFamilia($_POST['familia']);
            // Comprobar que no exista la familia en la tabla SQL
            $control = $familia->unicVerifyFamilia();

            if ($control == false){
                $familia->saveFamilia();

                Utils::showMessageCrear('Familia');
            }else{
                require_once 'views/familias/crear.php';
            }
        }
    }

    public function edit()
    {
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['familia'])){
            $id = (int)$_POST['id'];
            $nombre = $_POST['familia'];
            $familia = new familia();
            $familia->setId($id);
            $familia->setfamilia($nombre);
            $familia->update();
        }

        header('location:'._URL_BASE_.'/index.php?controller=familiaController&action=index');
    }
}