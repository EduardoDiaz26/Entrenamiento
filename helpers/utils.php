<?php

Class Utils{
    //Borra las sessiones que se disparan a la hora de insertar un registro, editarlo o eliminarlo
    public static function deleteSession($nombre){
        if(isset($_SESSION[$nombre])){
            $_SESSION[$nombre] = null;
            unset($_SESSION[$nombre]);
        }

        return $nombre;
    }

 
}


   