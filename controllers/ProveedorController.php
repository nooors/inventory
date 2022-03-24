<?php
require_once 'models/Proveedor.php';

class ProveedorController
{
    public function index()
    {
        $proveedor = new Proveedor();
        $proveedores = $proveedor->getAll();
        if(!isset($error) || !$error){
            $count = 0;
            $result = array();
            while($row = $proveedores->fetch_object()){
                $result[$count] = $row;
                if($result[$count]== null){
                    $result[$count] = "default.png";
                }
                $count++;
            }
        }

        require_once 'views/proveedores/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if(isset($_GET) && isset($_GET['proveedorId'])){
            $id = $_GET['proveedorId'];
            $edit = true;
            $proveedorOne = new Proveedor();
            $proveedorOne->setId($id);
            $proveedor = $proveedorOne->getOne();
            $edit = true;
        }

        require_once 'views/proveedores/crear.php';
    }

    public function save()
    {
        if(isset($_POST)){
            $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
            $email = isset($_POST['email']) ? $_POST['email'] : null;
            $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : null;
            $contacto = isset($_POST['contacto']) ? $_POST['contacto'] : null;

            $proveedor = new Proveedor();
            $proveedor->setNombre($nombre);
            $proveedor->setEmail($email);
            $proveedor->setTelefono($telefono);
            $proveedor->setContacto($contacto);

            // Comprobar que el proveedor no existe
            $control = $proveedor->unicVerifyProveedor();

            if ($control == false){
                $proveedor->saveProveedor();

                Utils::showMessageCrear('Proveedor');
            }else{
                require_once 'views/proveedores/crear.php';
            }

        }
    }

    public function edit()
    {
        if (isset($_POST) && isset($_POST['id'])){
            $id = (int)$_POST['id'];
            
            $proveedor = new Proveedor();
            $proveedor->setId($id);
            isset($_POST['nombre']) ? $proveedor->setNombre($_POST['nombre']) : false;
            isset($_POST['email']) ? $proveedor->setEmail($_POST['email']) : false;
            isset($_POST['telefono']) ? $proveedor->setTelefono($_POST['telefono']) : false;
            isset($_POST['contacto']) ? $proveedor->setContacto($_POST['contacto']) : false;
            
            $proveedor->update();
                  
        }

        header('location:'._URL_BASE_.'/index.php?controller=proveedorController&action=index');
    }
} // end of class