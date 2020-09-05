<?php
session_start();
require_once '../includes/conexion.php';
if($_POST){

    $db = Database::connect();
    $usuario_id = $_SESSION['identidad']['id'];
    $id = isset($_POST['Did']) ? $_POST['Did'] : false;
    $nombres = isset($_POST['Dnombre']) ? $_POST['Dnombre'] : false;
    $apellidos = isset($_POST['Dapellido']) ? $_POST['Dapellido'] : false;
    $años = isset($_POST['Daño']) ? $_POST['Daño'] : false;
    $cargo = isset($_POST['Dcargo']) ? $_POST['Dcargo'] : false;
    $creado = $_POST['Dccreacion'];
    $modificado = $_POST['Dmmodificado'];

    $sql = "delete from empleados where id = ?";
        $prep = mysqli_prepare($db, $sql);
        $prep->bind_param( 'i', $id);
     
        $result = mysqli_stmt_execute($prep);
        if($result){
            $accion = "elimino el registro";
            $sql = "insert into auditoria values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $prep = mysqli_prepare($db, $sql);
            $prep->bind_param( 'iisssssss', $id, $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado,$accion);
        
            $result = mysqli_stmt_execute($prep);
         }

         if($result){
            $_SESSION['delete'] = 'complete';
            header("Location:../agregar-editar.php");
         }else{
             $_SESSION['delete'] = 'failed';
         }
     
       
}else{
    $_SESSION['delete'] = 'failed';
    }