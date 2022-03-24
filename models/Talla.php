<?php

class Talla 
{
    private int $id;
    private string $talla;
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
     * Get the value of talla
     */ 
    public function getTalla()
    {
        return $this->talla;
    }

    /**
     * Set the value of talla
     *
     * @return  self
     */ 
    public function setTalla($talla)
    {
        $this->talla = $this->db->real_escape_string($talla);

        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM tallas";
        $tallas = $this->db->query($sql);

        return $tallas;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM tallas WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $talla = $query->fetch_object(); 

        }
        return $talla;
        
    }

    public function saveTalla()
    {
        // Las tallas no pueden repetirse
        $sql = "INSERT INTO tallas VALUES (null, '{$this->getTalla()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE tallas SET talla = '{$this->getTalla()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        if($save){
            return true;
        }else{
            echo $this->db->error;
            die;
        }
    }

    public function unicVerifyProveedor()
    {
        $error = false;
                
        // Comprobar si el campo de la tabla es recurrente
        $sql = "SELECT talla FROM tallas WHERE talla = '{$this->getTalla()}'"; 
        $registro = $this->db->query($sql);
              
        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }
} // end of class

