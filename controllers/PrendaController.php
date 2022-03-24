<?php
require_once 'models/Prenda.php';

class PrendaController
{
    public function index()
    {
        $prenda = new Prenda();
        $prendas = $prenda->getAllIndex();

        require_once 'views/prendas/index.php';
    }
    public function indexAll()
    {
        $prenda = new Prenda();
        $prendas = $prenda->getAll();

        require_once 'views/prendas/index.php';
    }

    public function indexByCategory()
    {
        if(isset($_GET) && isset($_GET['categoriaId']) && isset($_GET['categoria'])){
            $id = $_GET['categoriaId'];
            $categoria = (int)$id;
            $_SESSION['categoriaId'] = $categoria;
            $_SESSION['categoria'] = $_GET['categoria'];
                            
            $modelo = New Prenda();
            $modelo->setId_categoria($categoria);
            $modelos = $modelo->getByCategory();

            $result = array();
            $count = 0;
            while ($row = $modelos->fetch_object()){
                $result[$count] = $row;
                if($result[$count] -> imagen == null){
                    $result[$count] -> imagen = "default.png";
                }
                $count++;
            }
            
            require_once 'views/prendas/modeloscat.php';
        }
    }

        public function indexByModel()
        {
            if(isset($_GET) && isset($_GET['modeloId']) && isset($_GET['modelo'])){
                $modelo = (int)$_GET['modeloId'];
                $_SESSION['modeloId'] = $modelo;
                $_SESSION['modelo'] = $_GET['modelo'];
                                                   
                $prenda = New Prenda();
                $prenda->setId_modelo($modelo);
                $prendas = $prenda->getByModel();
                
                $result = array();
                $count = 0;
                while ($row = $prendas->fetch_object()){
                    $result[$count] = $row;
                    $count++;
                }
                $_SESSION['categoria'] = $result[0]->categoria;
                $_SESSION['familia'] = $result[0]->familia;
                $_SESSION['imagen'] = $result[0]->imagenmodelo;
                $imagenModelo = $result[0]->imagenmodelo;
                require_once 'views/prendas/prenda.php';    
        }else{
            return false;
        }
           
    }

    public function indexByModelColor()
    {
        if (isset($_POST) && isset($_POST['color']) && isset($_SESSION['modeloId'])){
            $id_color = $_POST['color'];
            $_SESSION['colorId'] = $id_color;
            $id_modelo = $_SESSION['modeloId'];
            $color = (int)$id_color;
            $modelo = (int)$id_modelo;

            $talla = new Prenda();
            $talla->setId_color($color);
            $talla->setId_modelo($modelo);
            $tallas = $talla->getByModelColor();

            $prenda = array();
            $counter = 0;
            while($row = $tallas->fetch_object()){
                $prenda[$counter] = $row;
                $counter++;
            }
            $_SESSION['imagen'] = $prenda[0]->imagen;

            require_once 'views/prendas/prenda.php';
        }
    }
    public static function showByModelColor($model, $color)
    {
        require_once 'models/Prenda.php';
       
        $model = (int)$model;
        $color = (int)$color;
        $prenda = new Prenda();
        $prenda->setId_color($color);
        $prenda->setId_modelo($model);

        $prendas = $prenda->getByModelColor();

        if ($prendas->num_rows > 0 ){
            
            return $prendas;
        }
   
    }

    public function indexByFamily()
    {
        if(isset($_GET) && isset($_GET['familiaId']) && isset($_GET['familia'])){
            $familiaId = (int)$_GET['familiaId'];
            $_SESSION['familiaId'] = $familiaId;
            $_SESSION['familia'] = $_GET['familia'];
            $familia = new Prenda();
            $familia->setId_familia($familiaId);
            $modelos = $familia->getByFamily();

            $result = array();
            $count = 0;

            while($row = $modelos->fetch_object()){
                $result[$count] = $row;
                if($result[$count]->imagen == null){
                    $result[$count]->imagen = "default.png";
                }
                $count++;
            }
            
            require_once "views/prendas/modelosfam.php";
        }else{

            return false;
        }
    }

    public function indexByMarca()
    {
        if(isset($_GET) && isset($_GET['marcaId']) && isset($_GET['marca'])){
            $_SESSION['marca'] = $_GET['marca'];
            $marcaId = (int)$_GET['marcaId'];
            $marca = new Prenda();
            $marca->setId_marca($marcaId);
            $modelos = $marca->getByMarca();

            $result = array();
            $count = 0;

            While($row = $modelos->fetch_object()){
                $result[$count] = $row;
                if($result[$count]->imagen == null){
                    $result[$count]->imagen = "default.png";
                }
                $count++;
            }

            require_once "views/prendas/modelosmarc.php";

        }
    }

    public function crear()
    {
        require_once 'views/prendas/crear.php';
    }

    public function updateCantidad()
    {
        if (isset($_POST) && isset($_POST['cantidad']) && isset($_POST['id'])){
            $count = 0;
            foreach($_POST['id'] as $id){
                $id = (int)$id;
                $cantidad = (int)$_POST['cantidad'][$count];
                $prendaUpdate = new Prenda();
                $prendaUpdate->setId($id);
                $prendaUpdate->setCantidad($cantidad);
                $prendaUpdate->updateCantidad();
                $count++;
            }
        }
       
        require_once 'views/prendas/prenda.php';
        
    }

    public function save()
    {
        if($_POST){
            //var_dump($_POST);
           // die;
            
            if(isset($_POST)){
                $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : 'null';
                $categoria = (int)$categoria;
                $familia = isset($_POST['familia']) ? $_POST['familia'] : 'null';
                $familia = (int)$familia;
                $talla = isset($_POST['talla']) ? $_POST['talla'] : 'null';
                //var_dump($talla);
                //die;
                
                $color = isset($_POST['color']) ? $_POST['color'] : 'null';
                                
                $proveedor = isset($_POST['proveedor']) ? $_POST['proveedor'] : 'null';
                $proveedor = (int)$proveedor;
                $marca = isset($_POST['marca']) ? $_POST['marca'] : 'null'; 
                $marca = (int)$marca;
                $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : 'null';
                $modelo = (int)$modelo;
                $referencia = isset($_POST['referencia']) ? $_POST['referencia'] : 'null';

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
                        
                    }
                }
                               
                for ($c=0 ; $c<count($color) ; $c++){
                    $color[$c] = (int)$color[$c];

                    for ($t=0; $t<count($talla); $t++){
                        
                        $talla[$t] = (int)$talla[$t];
                        
                        $prenda = new Prenda();
                        $prenda->setId_categoria($categoria);
                        $prenda->setId_familia($familia);
                        $prenda->setId_talla($talla[$t]);
                        $prenda->setId_color($color[$c]);
                        $prenda->setId_proveedor($proveedor);
                        $prenda->setId_marca($marca);
                        $prenda->setId_modelo($modelo);
                        $prenda->setReferencia($referencia);
                        $prenda->setImagen($filename);
                        $prenda->savePrendas();
                    }
                }
                
                Utils::showMessageCrear('Prenda');
            }

        }
           
    }

    public function updateImagen()
    {
        if(isset($_SESSION['modeloId']) && isset($_SESSION['colorId'])){
            $id_modelo = (int)$_SESSION['modeloId'];
            $id_color = (int)$_SESSION['colorId'];
            if(isset($_FILES) && isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){
                $file_name = $_FILES['imagen']['name'];
                $type = $_FILES['imagen']['type'];
                $temp_name = $_FILES['imagen']['tmp_name'];

                if($type == 'image/jpg' || $type == 'image/jpeg' || $type == 'image/png' || $type == 'image/bmp' || $type == 'image/gif'){
                    
                    if(!is_dir('assets/img')){
                        mkdir('assets/img', 0777, true);
                    }
                    
                        move_uploaded_file($temp_name, 'assets/img/'.$file_name);
                   
                    }else{
                    //El archivo no tiene la extensión correcta
                    }
                $imagen = $file_name;
            }else{
                $imagen = 'default.png';
            }
            $prenda = new Prenda();
            $prenda->setId_modelo($id_modelo);
            $prenda->setId_color($id_color);
            $prenda->setImagen($imagen);
            $prenda->updateImagen();
            $_SESSION['imagen'] = $imagen;
        }
        
        require_once 'views/prendas/prenda.php';;   
    }
    

    public function delete()
    {
        if(isset($_GET) && isset($_GET['prendaId'])){
            $id = (int)$_GET['prendaId'];

            $prenda = new Prenda();
            $prenda->setId($id);
            $prenda->deleteOne();
        }else{
            echo "El controlador no ha realizado la acción";
        }

        header('Location:'._URL_BASE_.'/index.php?controller=PrendaController&action=index');
    }
}
