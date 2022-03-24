<?php

class Familia
{
    private int $id;
    private string $familia;
    private $db;

    public function __construct()
    {
        $this->db=DataBase::connect();
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
     * Get the value of familia
     */ 
    public function getFamilia()
    {
        return $this->familia;
    }

    /**
     * Set the value of familia
     *
     * @return  self
     */ 
    public function setFamilia($familia)
    {
        $this->familia = $this->db->real_escape_string($familia);

        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM familias";
        $familias = $this->db->query($sql);

        if($familias -> num_rows == 0){
            $familias = false;
        }

        return $familias;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM familias WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $familia = $query->fetch_object(); 

        }
        return $familia;
        
    }

    public function saveFamilia()
    {
        // Ojo la familia tiene que ser única
        $sql = "INSERT INTO familias VALUES (null, '{$this->getFamilia()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE familias SET familia = '{$this->getFamilia()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        if($save){
            return true;
        }else{
            echo $this->db->error;
            die;
        }
    }


    public function unicVerifyFamilia()
    {
        $error = false;
                
        // Comprobar si el campo de la tabla es recurrente
        $sql = "SELECT familia FROM familias WHERE familia = '{$this->getFamilia()}'"; 
        $registro = $this->db->query($sql);
              
        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }
}
