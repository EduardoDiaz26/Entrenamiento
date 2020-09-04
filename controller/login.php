<?php
require_once '../includes/conexion.php';
session_start();

if(isset($_POST)){
    
    $user = trim($_POST['usuario']);
    $password = $_POST['contraseña'];
    $db = Database::connect();
    $sql = "select * from Usuarios where usuario =? limit 1";
    $prep = mysqli_prepare($db, $sql);
    
    mysqli_stmt_bind_param($prep, "s", $user);
    $result = mysqli_stmt_execute($prep);

    if($result ){
                
        $prep->bind_result($id, $nombres, $apellidos, $usuario, $contraseña, $admin); 
             
        //var_dump($datos);die();
        while(mysqli_stmt_fetch($prep)){
            $id;
            $nombres;
            $apellidos;
            $usuario;
            $contraseña;
            $admin;
        }
        
        if($contraseña == $password){
            
            $_SESSION['identidad']['id'] = $id;
            $_SESSION['identidad']['nombres'] = $nombres;
            $_SESSION['identidad']['apellidos'] = $apellidos;
            $_SESSION['identidad']['usuario'] = $usuario;
            $_SESSION['identidad']['contraseña'] = $contraseña;
            $_SESSION['identidad']['admin'] = $admin;        
        }
    }

    //$prep->bind_result($id, $nombre, $apellido, $usuario, $contraseña, $admin);
}

header("Location:../index.php");

?>