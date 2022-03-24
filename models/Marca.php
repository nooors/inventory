<?php

class Marca
{
    private int $id;
    private string $marca;
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
     * Get the value of marca
     */ 
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set the value of marca
     *
     * @return  self
     */ 
    public function setMarca($marca)
    {
        $this->marca = $this->db->real_escape_string($marca);

        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM marcas";
        $marcas = $this->db->query($sql);

        return $marcas;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM marcas WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $marca = $query->fetch_object(); 

        }
        return $marca;
        
    }

    public function saveMarca()
    {
        // Ojo, se tiene que comprobar que la marca sea única
        $sql = "INSERT INTO marcas VALUES (null, '{$this->getMarca()}')";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE marcas SET marca = '{$this->getMarca()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        if($save){
            return true;
        }else{
            echo $this->db->error;
            die;
        }
    }

    public function unicVerifyMarca()
    {
        $error = false;
                
        // Comprobar si el campo de la tabla es recurrente
        $sql = "SELECT marca FROM marcas WHERE marca = '{$this->getMarca()}'"; 
        $registro = $this->db->query($sql);
              
        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }
}