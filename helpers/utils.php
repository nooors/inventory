<?php
require_once 'config/db.php';

class Utils
{
    public static function showMessageCrear($message)
    {
        $gender = substr($message, -1);
        if ($gender == 'o' || $gender == 'r') {
            echo $message . " cread" . "o " . "correctamente";
        } else {
            echo $message . " cread" . "a " . "correctamente";
        }
    }

    public static function showCategorias()
    {
        require_once 'models/Categoria.php';
        $categoria = new Categoria();
        $categorias = $categoria->getAll();

        return $categorias;
    }

    public static function showFamilias()
    {
        require_once 'models/Familia.php';
        $familia = new Familia();
        $familias = $familia->getAll();

        return $familias;
    }

    public static function showColores()
    {
        require_once 'models/Color.php';
        $color = new Color();
        $colores = $color->getAll();

        return $colores;
    }

    public static function showTallas()
    {
        require_once 'models/Talla.php';
        $talla = new Talla();
        $tallas = $talla->getAll();

        return $tallas;
    }

    public static function showProveedores()
    {
        require_once 'models/Proveedor.php';
        $proveedor = new Proveedor();
        $proveedores = $proveedor->getAll();

        return $proveedores;
    }

    public static function showMarcas()
    {
        require_once 'models/Marca.php';
        $marca = new Marca();
        $marcas = $marca->getAll();

        return $marcas;
    }
    public static function showModelos()
    {
        require_once 'models/Modelo.php';
        $modelo = new Modelo();
        $modelos = $modelo->getAll();

        return $modelos;
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

        if ($prendas->num_rows > 0) {

            return $prendas;
        }
    }

    public static function isLogued(String $page)
    {
        if (isset($_SESSION['login']) && isset($page) && $page == "edit") {
            return $page;
        } else if (isset($_SESSION['login']) && isset($page) && $page == "manage") {
            return $page;
        } else {
            return false;
        }
    }

    public static function unsetSession(){
        if(isset($_SESSION)){
            foreach($_SESSION as $key => $value){
                if($key == 'login'){
                    continue;
                }else{
                    
                    unset($_SESSION[$key]);
                }
            }
        }
    }
} //end of class