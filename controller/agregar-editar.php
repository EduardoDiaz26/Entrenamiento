<?php 
session_start();
require_once '../includes/conexion.php';
if(isset($_POST)){
    $db = Database::connect();
    $usuario_id = $_SESSION['identidad']['id'];
    $id = isset($_POST['id']) ? $_POST['id'] : false;
    $nombres = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $años = isset($_POST['año']) ? $_POST['año'] : false;
    $cargo = isset($_POST['cargo']) ? $_POST['cargo'] : false;

    $errores = array();

    if(!empty($nombres) && !preg_match("/[0-9]/", $nombres)){
        $nombre_validado = true;
    }else{
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(!empty($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else{
        $apellidos_validado = false;
        $errores['apellido'] = "El nombre no es valido";
    }

    if(!empty($años) && !preg_match("/[0-9]/", $años)){
        $año_validado = true;
    }else{
        $año_validado = false;
        $errores['año'] = "El nombre no es valido";
    }

    if(!empty($cargo) && !preg_match("/[0-9]/", $cargo)){
        $cargo_validado = true;
    }else{
        $cargo_validado = false;
        $errores['cargo'] = "El nombre no es valido";
    }

    $creado = date('Y-m-d H:i:s');
    $modificado = date('Y-m-d H:i:s');
    if(count($errores) == 0){
        $sql = "insert into empleados values(null, ?, ?, ?, ?, ?, ?, ?)";
        $prep = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($prep, 'issssdd', $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado);
     
        $result = mysqli_stmt_execute($prep);

        var_dump($result);
        die();

        if($result){
           
        }
    }    


}






?>