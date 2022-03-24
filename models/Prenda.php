<?php

class Prenda
{
    private int $id;
    private int $id_categoria;
    private int $id_familia;
    private int $id_talla;
    private int $id_color;
    private int $id_proveedor;
    private int $id_marca;
    private int $id_modelo;
    private string $referencia;
    private int $cantidad;
    private string $imagen;
    private $db;

    public function __construct()
    {
        $this->db = DataBase::connect(); 
    }



    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id_categoria
     */ 
    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    /**
     * Set the value of id_categoria
     *
     * @return  self
     */ 
    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }

    /**
     * Get the value of id_talla
     */ 
    public function getId_talla()
    {
        return $this->id_talla;
    }

    /**
     * Set the value of id_talla
     *
     * @return  self
     */ 
    public function setId_talla($id_talla)
    {
        $this->id_talla = $id_talla;

        return $this;
    }

    /**
     * Get the value of id_color
     */ 
    public function getId_color()
    {
        return $this->id_color;
    }

    /**
     * Set the value of id_color
     *
     * @return  self
     */ 
    public function setId_color($id_color)
    {
        $this->id_color = $id_color;

        return $this;
    }

    /**
     * Get the value of id_proveedor
     */ 
    public function getId_proveedor()
    {
        return $this->id_proveedor;
    }

    /**
     * Set the value of id_proveedor
     *
     * @return  self
     */ 
    public function setId_proveedor($id_proveedor)
    {
        $this->id_proveedor = $id_proveedor;

        return $this;
    }

    /**
     * Get the value of id_familia
     */ 
    public function getId_familia()
    {
        return $this->id_familia;
    }

    /**
     * Set the value of id_familia
     *
     * @return  self
     */ 
    public function setId_familia($id_familia)
    {
        $this->id_familia = $id_familia;

        return $this;
    }

    

    /**
     * Get the value of referencia
     */ 
    public function getReferencia()
    {
        return $this->referencia;
    }

    /**
     * Set the value of referencia
     *
     * @return  self
     */ 
    public function setReferencia($referencia)
    {
        $this->referencia = $this->db->real_escape_string($referencia);

        return $this;
    }

    /**
     * Get the value of cantidad
     */ 
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set the value of cantidad
     *
     * @return  self
     */ 
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get the value of id_marca
     */ 
    public function getId_marca()
    {
        return $this->id_marca;
    }

    /**
     * Set the value of id_marca
     *
     * @return  self
     */ 
    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;

        return $this;
    }

    /**
     * Get the value of id_modelo
     */ 
    public function getId_modelo()
    {
        return $this->id_modelo;
    }

    /**
     * Set the value of id_modelo
     *
     * @return  self
     */ 
    public function setId_modelo($id_modelo)
    {
        $this->id_modelo = $id_modelo;

        return $this;
    }

      /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    
    public function getAll()
    {
        $sql = "SELECT * FROM prendas";
        $prendas = $this->db->query($sql);

        return $prendas;
    }

    public function getAllIndex()
    {
        $sql = "SELECT pren.id, cat.categoria as Categoria, fam.familia as Familia,
                    mo.modelo as Modelo, ta.talla as Talla,
                    col.color as Color, col.codigo as Codigo, pren.cantidad as Cantidad
                    FROM prendas pren
                        INNER JOIN categorias cat
                            ON cat.id = pren.id_categoria
                        INNER JOIN familias fam
                            ON fam.id = pren.id_familia
                        INNER JOIN modelos mo
                            ON mo.id = pren.id_modelo
                        INNER JOIN tallas ta
                            ON ta.id = pren.id_talla
                        INNER JOIN colores col
                            ON col.id = pren.id_color";
        $prendas = $this->db->query($sql);

        return $prendas;

    }

    public function getByCategory()
    {
        $sql = "SELECT pren.id_modelo, cat.categoria as categoria, fam.familia as familia,
                    mo.modelo as modelo, mo.imagen as imagen
                    FROM prendas pren
                        INNER JOIN categorias cat
                            ON cat.id = pren.id_categoria
                        INNER JOIN familias fam
                            ON fam.id = pren.id_familia
                        INNER JOIN modelos mo
                            ON mo.id = pren.id_modelo
                                WHERE pren.id_categoria = {$this->getId_categoria()}
                                GROUP BY pren.id_modelo";
        $modelos = $this->db->query($sql);
              
        return $modelos;
    }
    public function getByModel()
    {        
        $sql = "SELECT cat.categoria as categoria, fam.familia as familia,
                    mo.modelo as modelo, mo.imagen as imagenmodelo, ta.talla as talla,
                    col.color as color, col.codigo as codigo, pren.cantidad as Cantidad, 
                    pren.imagen as imagen
                    FROM prendas pren
                        INNER JOIN categorias cat
                            ON cat.id = pren.id_categoria
                        INNER JOIN familias fam
                            ON fam.id = pren.id_familia
                        INNER JOIN modelos mo
                            ON mo.id = pren.id_modelo
                        INNER JOIN tallas ta
                            ON ta.id = pren.id_talla
                        INNER JOIN colores col
                            ON col.id = pren.id_color
                                WHERE pren.id_modelo = {$this->getId_modelo()}";
        $prendas = $this->db->query($sql);
              
        return $prendas;

    }

    public function getByModelColor()
    {
        $sql = "SELECT pren.id as id, pren.imagen as imagen,ta.talla as talla, pren.cantidad as cantidad, col.color FROM prendas pren
                    INNER JOIN tallas ta ON pren.id_talla = ta.id
                    INNER JOIN colores col ON col.id = pren.id_color
                        WHERE pren.id_color = {$this->getId_color()} 
                        AND pren.id_modelo = {$this->getId_modelo()}";
        $tallas = $this->db->query($sql);

        return $tallas;

    }

    public function getByFamily(){
        $sql = "SELECT pren.id, fam.familia, mo.modelo, mo.imagen, pren.id_modelo, cat.categoria 
                FROM prendas pren
                INNER JOIN familias fam
                ON fam.id = pren.id_familia
                INNER JOIN categorias cat
                ON cat.id = pren.id_categoria
                INNER JOIN modelos mo
                ON mo.id = pren.id_modelo
                    WHERE pren.id_familia = {$this->getId_familia()}
                    GROUP by mo.modelo";
        $query = $this->db->query($sql);
        $result = false;
        
        if($query){
            $result = $query;
        }else{
            $result = false;
        }

        return $result;
    }
    
    public function getByMarca(){
        $sql = "SELECT pren.id, fam.familia, mo.modelo, mo.imagen, pren.id_modelo, cat.categoria 
                    FROM prendas pren
                    INNER JOIN familias fam
                    ON fam.id = pren.id_familia
                    INNER JOIN categorias cat
                    ON cat.id = pren.id_categoria
                    INNER JOIN modelos mo
                    ON mo.id = pren.id_modelo
                        WHERE pren.id_marca = {$this->getId_marca()}
                        GROUP by mo.modelo";
        $query = $this->db->query($sql);
        $result = false;

        if($query){
            $result = $query;
        }else{
            $result = false;
        }

        return $result;
    }

    public function savePrendas()
    {
        $sql = "INSERT INTO prendas(id_categoria, id_familia, id_talla, id_color, id_proveedor, id_marca, id_modelo, referencia, imagen)
         VALUES ('{$this->getId_categoria()}',
                 '{$this->getId_familia()}',
                 '{$this->getId_talla()}',
                 '{$this->getId_color()}',
                 '{$this->getId_proveedor()}',
                 '{$this->getId_marca()}',
                 '{$this->getId_modelo()}',
                 '{$this->getReferencia()}',
                 '{$this->getImagen()}'
                 )";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }
        
        return $result; 
        
    }

    public function updateCantidad()
    {
        $sql = "UPDATE prendas SET cantidad = {$this->getCantidad()} WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;

        if ($query){
            $result = true;
        }

        return $result;

    }

    public function updateImagen()
    {
        $sql = "UPDATE prendas SET imagen = '{$this->getImagen()}' WHERE id_color = {$this->getId_color()} AND id_modelo = {$this->getId_modelo()}";
        $query = $this->db->query($sql);
        
        $result = false;
        if($query){
            $result = true;
        }

        return $result;
    }

    public function deleteOne()
    {
        $sql = "DELETE FROM prendas WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        $result = false;

        if($query){
            $result = true;
        }

        return $result;
    }
}

