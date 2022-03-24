<?php

class Proveedor
{
    private int $id;
    private string $nombre;
    private string $email;
    private string $telefono;
    private string $contacto;
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
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $this->db->real_escape_string($nombre);

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $this->db->real_escape_string($email);

        return $this;
    }

    /**
     * Get the value of telefono
     */ 
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set the value of telefono
     *
     * @return  self
     */ 
    public function setTelefono($telefono)
    {
        $this->telefono = $this->db->real_escape_string($telefono);

        return $this;
    }

    /**
     * Get the value of contacto
     */ 
    public function getContacto()
    {
        return $this->contacto;
    }

    /**
     * Set the value of contacto
     *
     * @return  self
     */ 
    public function setContacto($contacto)
    {
        $this->contacto = $this->db->real_escape_string($contacto);

        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM proveedores";
        $proveedores = $this->db->query($sql);
        if(!$proveedores->num_rows >= 1){
            
            return $error = true;
        }

        return $proveedores;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM Proveedores WHERE id = {$this->getId()}";
        $query = $this->db->query($sql);
        if($query && $query->num_rows == 1){
            $marca = $query->fetch_object(); 

        }
        return $marca;
        
    }

    public function saveProveedor()
    // los proveedores no pueden repetirse
    {
        $sql = "INSERT INTO proveedores VALUES (
            null,
            '{$this->getNombre()}',
            '{$this->getEmail()}',
            '{$this->getTelefono()}',
            '{$this->getContacto()}'
            )";
        $save = $this->db->query($sql);
        $result = false;
        if($save){
            $result = true;
        }

        return $result;
    }

    public function update()
    {
        $results = 0;
        
        if(!is_null($this->getNombre())){
            $sql = "UPDATE proveedores SET nombre = '{$this->getNombre()}' WHERE id = {$this->getId()}";
            $query = $this->db->query($sql);
            if($query){
                $results++;
            }
        }
        
        if(!is_null($this->getEmail())){
            $sql = "UPDATE proveedores SET email = '{$this->getEmail()}' WHERE id = {$this->getId()}";
            $query = $this->db->query($sql);
            if($query){
                $results++;
            }
        }
        
        if(!is_null($this->getTelefono())){
            $sql = "UPDATE proveedores SET telefono = '{$this->getTelefono()}' WHERE id = {$this->getId()}";
            $query = $this->db->query($sql);
            if($query){
                $results++;
            }
        }
        
        if(!is_null($this->getContacto())){
            $sql = "UPDATE proveedores SET contacto = '{$this->getContacto()}' WHERE id = {$this->getId()}";
            $query = $this->db->query($sql);
            if($query){
                $results++;
            }
        }
        
        if($results > 0){
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
        $sql = "SELECT nombre FROM proveedores WHERE nombre = '{$this->getNombre()}'"; 
        $registro = $this->db->query($sql);
              
        if($registro && $registro->num_rows > 0 ){
            // El registro ya existe
            $error = true;          
        }

       return $error;
    }
} // end of class