<?php
require_once 'models/Modelo.php';

class ModeloController
{
    public function index()
    {
        $modelo = new Modelo();
        $modelos = $modelo->getAll();
        $count = 0;
        $result = array();
        while($row = $modelos->fetch_object()){
            $result[$count] = $row;
            if($result[$count]->imagen == null){
                $result[$count]->imagen = "default.png";
            }
            $count++;
        }

        require_once 'views/modelos/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if(isset($_GET) && isset($_GET['modeloId'])){
            $id = $_GET['modeloId'];
            $edit = true;
            $modeloOne = new Modelo();
            $modeloOne->setId($id);
            $modelo = $modeloOne->getOne();
            $edit = true;

        }
        require_once 'views/modelos/crear.php';
    }

    public function save()
    {
        if(isset($_POST) && isset($_POST['marca']) && isset($_POST['modelo'])){
            $marca = $_POST['marca'];
            $modelo = $_POST['modelo'];
            $model = new Modelo();
            $model->setId_marca($marca);
            $model->setModelo($modelo);

            //Comprobar que el modelo no exista en ls BD
            $control = $model->unicVerifyModelo();

            if(isset($_FILES) && isset($_FILES['imagen'])){
                $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $type = $file['type'];
                    $temp_name = $file['tmp_name'];

                    if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp' || $type == 'image/gif'){
                        
                        if(!is_dir('assets/img')){
                            mkdir('assets/img', 0777, true);
                        }

                        move_uploaded_file($temp_name, 'assets/img/'.$filename);
                        
                    }else{
                        //El archivo no tiene la extensión correcta
                    }
                $model->setImagen($filename);
            }else{
                $model->setImagen('default.png');
            }
            
            if($control == false){
                $model->saveModelo();

                /*var_dump($_POST);
                var_dump($model);
                die;*/

                Utils::showMessageCrear('Modelo');
            }else{
                require_once 'views/modelos/crear.php';
            }
        }
    }

    public function edit()
    {
        if (isset($_POST) && isset($_POST['id']) && isset($_POST['marca']) && isset($_POST['modelo'])){
            $id = (int)$_POST['id'];
            $marca = (int)$_POST['marca'];
            $modelo = $_POST['modelo'];
            $model = new Modelo();
            $model->setId($id);
            $model->setId_marca($marca);
            $model->setModelo($modelo);
            if(isset($_FILES) && isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $type = $file['type'];
                $temp_name = $file['tmp_name'];

                if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp' || $type == 'image/gif'){
                    
                    if(!is_dir('assets/img')){
                        mkdir('assets/img', 0777, true);
                    }
                    
                        move_uploaded_file($temp_name, 'assets/img/'.$filename);
                   
                    }else{
                    //El archivo no tiene la extensión correcta
                }
            $model->setImagen($filename);
        }else{
            $model->setImagen('default.png');
        }
            $model->update();
        }

        header('location:'._URL_BASE_.'/index.php?controller=modeloController&action=index');
    }
} // end of class