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
//Llamando esta funcion permite saber si el usuario esta logeado o no y asi restringir el acceso
 function getUsuario(){ 
        return $this->usuario;
    }
}
