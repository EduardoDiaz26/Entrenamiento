<?php
session_start();
require_once '../helpers/conexion.php';
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
            $fecha = date('Y-m-d H:i:s');
            $accion = "elimino el registro";
            $sql = "insert into auditoria values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $prep = mysqli_prepare($db, $sql);
            $prep->bind_param( 'iissssssss', $id, $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado,$accion, $fecha);
        
            $result = mysqli_stmt_execute($prep);
            $_SESSION['delete'] = 'complete';
         
        }else{
             $_SESSION['delete'] = 'failed';
         }
        
    }else{
        $_SESSION['delete'] = 'failed';
    }    

    header("Location:../agregar-editar.php");