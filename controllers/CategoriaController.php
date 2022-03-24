<?php
require_once 'models/Categoria.php';

class CategoriaController
{
    public function index()
    {
        $categoria = new Categoria();
        $categorias = $categoria->getAll();
        $result = array();
        $counter = 0;
        while ($categoria = $categorias->fetch_object()) {
            $result[$counter] = $categoria;

            if ($result[$counter]->imagen == null) {
                $result[$counter]->imagen = "default.png";
            }
            $counter++;
        }

        require_once 'views/categorias/index.php';
    }

    public function crear()
    {
        //Compruebo que me llegue algo por Get entonces está editando en lugar de creando
        if (isset($_GET) && isset($_GET['categoriaId'])) {
            $id = $_GET['categoriaId'];
            $edit = true;
            $categoriaOne = new Categoria();
            $categoriaOne->setId($id);
            $categoria = $categoriaOne->getOne();
            $edit = true;
        }

        require_once 'views/categorias/crear.php';
    }

    public function save()
    {
        if (isset($_POST) && isset($_POST['categoria'])) {
            $categoria = new Categoria();
            $categoria->setCategoria($_POST['categoria']);
            // Comprobar que el registro no esté repetido
            $control = $categoria->unicVerifyCategoria();
            if (isset($_FILES) && isset($_FILES['imagen'])) {
                $file = $_FILES['imagen'];
                $filename = $file['name'];
                $type = $file['type'];
                $temp_name = $file['tmp_name'];

                if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp' || $type == 'image/gif') {

                    if (!is_dir('assets/img')) {
                        mkdir('assets/img', 0777, true);
                    }

                    move_uploaded_file($temp_name, 'assets/img/' . $filename);
                } else {
                    //El archivo no tiene la extensión correcta
                }
                $categoria->setImagen($filename);
            } else {
                $categoria->setImagen('default.png');
            }


            if ($control == false) {
                $categoria->saveCategoria();

                Utils::showMessageCrear('Categoría');
            } else {
                require_once 'views/categorias/crear.php';
            }
        }
    }

    public function edit()
    {
        //Solo pueden editar los usuarios registrados con un rol específico pendiente de codificar
        if (isset($_SESSION['login'])) {

            if (isset($_POST) && isset($_POST['id']) && isset($_POST['categoria'])) {
                $id = (int)$_POST['id'];
                $nombre = $_POST['categoria'];
                $categoria = new Categoria();
                $categoria->setId($id);
                $categoria->setCategoria($nombre);

                if (isset($_FILES) && isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0) {
                    $file = $_FILES['imagen'];
                    $filename = $file['name'];
                    $type = $file['type'];
                    $temp_name = $file['tmp_name'];

                    if ($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp' || $type == 'image/gif') {

                        if (!is_dir('assets/img')) {
                            mkdir('assets/img', 0777, true);
                        }

                        move_uploaded_file($temp_name, 'assets/img/' . $filename);
                    } else {
                        //El archivo no tiene la extensión correcta
                    }
                    $categoria->setImagen($filename);
                } else {
                    $categoria->setImagen('default.png');
                }
                $categoria->update();
            }

            header('location:' . _URL_BASE_ . '/index.php?controller=CategoriaController&action=index');
        } else {
            header('location:' . _URL_BASE_ . '/index.php?controller=CategoriaController&action=index');
        }
    }

    public function delete()
    {
        if (isset($_GET) && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $categoria = new Categoria();
            $categoria->setId($id);
            $categoria->deleteOne();

            header('location:' . _URL_BASE_ . '/index.php?controller=CategoriaController&action=index');
        }
    }
}
