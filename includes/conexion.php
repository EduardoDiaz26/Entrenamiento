<?php

class Database{
    public static function connect(){
        $db = new mysqli('localhost', 'root', '', 'controlempleado');
        
        return $db;
    }
    
}
