<?php

class Modelo
{
    private int $id;
    private int $id_marca;
    private string $modelo;
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
     * Get the value of modelo
     */ 
    public function getModelo()
    {
        return $this->modelo;
    }

    /**
     * Set the value of modelo
     *
     * @return  self
     */ 
    public function setModelo($modelo)
    {
        $this->modelo = $this->db->real_escape_string($modelo);

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
        $sql = "SELECT * FROM modelos";
        $modelos = $this->db->query($sql);
        
        return $modelos;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM modelos WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $modelo = $query->fetch_object(); 

        }
        return $modelo;
        
    }

    public function getByid()
    {
        $sql = "SELECT modelo FROM modelos WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);

        if ($query && $query->num_rows > 0){
            $modelo = $query->fetch_object();
        } else {
            $modelo = false;
        }

        return $modelo;
    }

    public function saveModelo()
    {
        // Ojo el modelo tiene que ser único por cada proveedor
        $sql = "INSERT INTO modelos VALUES (null, '{$this->getId_marca()}', '{$this->getModelo()}', '{$this->getImagen()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;           
        }

        // var_dump($result);

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE modelos SET modelo = '{$this->getModelo()}', id_marca = {$this->getId_marca()}, imagen = '{$this->getImagen()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        if($save){
            return true;
        }else{
            echo $this->db->error;
            die;
        }
    }

    public function unicVerifyModelo()
    {
        $error = false;
                
        // Comprobar si el campo de la tabla es recurrente
        $sql = "SELECT * FROM modelos WHERE modelo = '{$this->getModelo()}' and id_marca = {$this->getId_marca()}"; 
        $registro = $this->db->query($sql);

        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }

  


}// end of class