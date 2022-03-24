<?php

class Categoria
{
    private int $id;
    private string $categoria;
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
     * Get the value of categoria
     */ 
    public function getCategoria()
    {
        return $this->categoria;
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
     * Set the value of categoria
     *
     * @return  self
     */ 
    public function setCategoria($categoria)
    {
        $this->categoria = $this->db->real_escape_string($categoria);

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
        $sql = "SELECT * FROM categorias";
        $categorias = $this->db->query($sql);
        // Falta comprobar que tenemos un result-set del query   
        return $categorias;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $categoria = $query->fetch_object(); 

        }
        return $categoria;
        
    }


    public function getById()
    {
        $sql = "SELECT categoria FROM categorias WHERE id = {$this->getId()}";
        $categoria = $this->db->query($sql);

        if($categoria && $categoria->num_rows == 1){
            $result = $categoria->fetch_object();
        }else{
            $result = false;
        }

        return $result;
    }

    public function saveCategoria()
    // Cuidado las categorías tienen que ser úmicas
    {
        $sql = "INSERT INTO categorias VALUES (NULL, '{$this->getCategoria()}', '{$this->getImagen()}')";
        $save = $this->db->query($sql);

        $result = false;

        if($save){
            $result = true;
        }else{
            echo $this->db->error;
            die;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE categorias SET categoria = '{$this->getCategoria()}', imagen = '{$this->getImagen()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        if($save){
            return true;
        }else{
            echo $this->db->error;
            die;
        }
    }

    public function deleteOne()
    {
        $sql = "DELETE FROM categorias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);

        $result = false;
        if($query){
            $result = true;
        }

        return $result;
    }

    public function unicVerifyCategoria()
    {
        $error = false;
                
        // Comprobar si el campo de la tabla es recurrente
        $sql = "SELECT categoria FROM categorias WHERE categoria = '{$this->getCategoria()}'"; 
        $registro = $this->db->query($sql);
       
        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }

    
} 