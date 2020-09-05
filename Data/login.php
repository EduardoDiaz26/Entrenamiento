<?php
require_once '../helpers/conexion.php';
session_start();

if(isset($_POST)){
    
    
    $user = trim($_POST['usuario']);
    $password = $_POST['contraseña'];
    $db = Database::connect();
     //Consultas preparadas para mayor seguridad evitando inyecciones sql
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
        // La funcion password_hash encripta la password
        $hash = password_hash($password, PASSWORD_DEFAULT, ['cost'=>10]);
        
        //Verifica si la password es igual a la de la base de datos
        $verify = password_verify($password, $contraseña);
       
        
        if($verify){
            //Se crea la session de el usuario logeado
            $_SESSION['identidad']['id'] = $id;
            $_SESSION['identidad']['nombres'] = $nombres;
            $_SESSION['identidad']['apellidos'] = $apellidos;
            $_SESSION['identidad']['usuario'] = $usuario;
            $_SESSION['identidad']['contraseña'] = $contraseña;
            $_SESSION['identidad']['admin'] = $admin;    

            header("Location:../index.php"); 
        }else {
            header("Location:../login.html"); 
        }
    }

    
}

//Para encriptar
//$password = '';
//echo password_hash($password, PASSWORD_DEFAULT, ['COST' => 10]);



?>