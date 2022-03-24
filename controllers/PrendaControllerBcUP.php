<?php
require_once 'models/Prenda.php';
require_once 'models/Categoria.php';
require_once 'models/Modelo.php';

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
        if(isset($_GET) && isset($_GET['categoria'])){
            $id = (int)$_GET['categoria'];
            
            $categoria = new Categoria();
            
            $categoria->setId($id);
            $categoriaName = $categoria->getById();
            $_SESSION['categoria'] = $categoriaName->categoria;
            $modelo = New Prenda();
            $modelo->setId_categoria($id);
            $modelos = $modelo->getByCategory();

            $result = array();
            $count = 0;
            while ($row = $modelos->fetch_object()){
                $result[$count] = $row;
                $count++;
            }
            require_once 'views/prendas/modelos.php';
        }
    }

        public function indexByModel()
        {
            if(isset($_GET) && isset($_GET['modelo'])){
                $id = (int)$_GET['modelo'];
                $modelo = new Modelo();
                $modelo->setId($id);
                $modelName = $modelo->getByid();
                $_SESSION['modelo'] = $modelName->modelo;
                $_SESSION['modeloId'] = $id;
                                                   
                $prenda = New Prenda();
                $prenda->setId_modelo($id);
                $prendas = $prenda->getByModel();
                
                $result = array();
                $count = 0;
                while ($row = $prendas->fetch_object()){
                    $result[$count] = $row;
                    $count++;
                }
                $_SESSION['familia'] = $result[0]->familia;
                require_once 'views/prendas/prenda.php';    
        }else{
            echo "No llega el dato por la URL";
        }
           
    }

    public static function indexByModelColor()
    {
        echo "hemos llegado al controllador";
        echo "<br/>";
        
        if(isset($_POST) && isset($_POST['color']) && isset($_SESSION['modeloId'])){
            var_dump($_POST);
            echo "<br/>";
            
            var_dump($_SESSION);
            echo "<br/>";
            $model = $_SESSION['modeloId'];
            $color = (int)$_POST['color'];
            $prenda = new Prenda();
            $prenda->setId_color($color);
            $prenda->setId_modelo($model);
            $prendas = $prenda->getByModelColor();
            echo "hemos llegado al método";
            echo "<br/>";
            if ($prendas->num_rows > 0 ){
                echo "recibimos datos BD";
                echo "<br/>";
                return $prendas;
            }else{
                echo 'error';
                die;
            }
            
        }else{
            echo "hemos saltado todo lo del post";
        }

        echo "salimos del método llamando a la vista";

        require_once "views/prendas/prenda.php";
    }

    public function crear()
    {
        require_once 'views/prendas/crear.php';
    }

    public function update()
    {
        if (isset($_POST)){
            var_dump($_POST);
        }else{
            echo 'no llegó nada por post';
        }
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
                //var_dump($color);
                //die;
                
                $proveedor = isset($_POST['proveedor']) ? $_POST['proveedor'] : 'null';
                $proveedor = (int)$proveedor;
                $marca = isset($_POST['marca']) ? $_POST['marca'] : 'null'; 
                $marca = (int)$marca;
                $modelo = isset($_POST['modelo']) ? $_POST['modelo'] : 'null';
                $modelo = (int)$modelo;
                $referencia = isset($_POST['referencia']) ? $_POST['referencia'] : 'null';
                //echo count($color)."</br>";
                //echo count($talla)."</br>";
                //die;
                
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
                        $prenda->savePrendas();
                        //echo $talla[$t]."<br/>";
                        
                                              
                    }
                    //echo "</br>".$color[$c];
                }
                //die;
                Utils::showMessageCrear('Prenda');
            }

        }
           
    }
}
