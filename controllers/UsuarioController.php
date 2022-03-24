<?php

require_once 'models/Usuario.php';

class UsuarioController
{
    public function index()
    {
        $usuario = new Usuario();
        $result = $usuario->getAll();
        if(!$result){
            $error = true;
        }

        require_once 'views/usuarios/index.php';
    }

    public function login()
    {
        if(!isset($_SESSION['login'])){
            $_SESSION['login'] = 'nooors';
            header('location:'._URL_BASE_.'/index.php?controller=CategoriaController&action=index');
        }
    }

    public function logout()
    {
        if(isset($_SESSION['login'])){
            unset($_SESSION['login']);
            header('location:'._URL_BASE_.'/index.php?controller=CategoriaController&action=index');;
        }
    }
}