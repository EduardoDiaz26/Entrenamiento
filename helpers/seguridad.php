<?php
session_start();
class Seguridad
{
    private $usuario = null;

    public function __construct(){
  
        if(isset($_SESSION["identidad"]["usuario"])){
            $this->usuario = $_SESSION["identidad"]["usuario"];
            
        }
    }

 function getUsuario(){
    
        return $this->usuario;
    }
}
