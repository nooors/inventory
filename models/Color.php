<?php

class Color{
    private int $id;
    private string $color;
    private int $orden;
    private string $codigo;
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
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set the value of color
     *
     * @return  self
     */ 
    public function setColor($color)
    {
        $this->color = $this->db->real_escape_string($color);

        return $this;
    }
    
    /**
     * Get the value of orden
     */ 
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set the value of orden
     *
     * @return  self
     */ 
    public function setOrden($orden)
    {
        $this->orden = $orden;

        return $this;
    }

    /**
     * Get the value of codigo
     */ 
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set the value of codigo
     *
     * @return  self
     */ 
    public function setCodigo($codigo)
    {
        $this->codigo = $this->db->real_escape_string($codigo);

        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM colores";
        $colores = $this->db->query($sql);

        return $colores;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM colores WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $color = $query->fetch_object(); 

        }
        return $color;
        
    }

    public function saveColor()
    {
        // Ojo los colores no tiene que estar repetidos
        $sql = "INSERT INTO colores VALUES (null, '{$this->getColor()}', '{$this->getCodigo()}', null)";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $sql = "UPDATE colores SET color = '{$this->getColor()}', codigo = '{$this->getCodigo()}' WHERE id = {$this->getId()}";
        $save = $this->db->query($sql);

        if($save){
            return true;
        }else{
            echo $this->db->error;
            die;
        }
    }

    public function unicVerifyColor()
    {
        $error = false;
                
        // Comprobar si el campo de la tabla es recurrente
        $sql = "SELECT color FROM colores WHERE color = '{$this->getColor()}'"; 
        $registro = $this->db->query($sql);
              
        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }
}
