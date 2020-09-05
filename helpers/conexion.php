<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'controlempleado');
        $db->query("SET NAMES 'UTF8'");
        return $db;

        /*if(!isset($_SESSION)){
        session_start();
        }*/

       
    }
    

    
}
