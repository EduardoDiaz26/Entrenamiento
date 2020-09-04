<?php
require_once '../includes/conexion.php';
if($_GET){

    $db = Database::connect();
    $id = $_GET['id'];

    $sql = "delete from empleados where id = ?";
        $prep = mysqli_prepare($db, $sql);
        $prep->bind_param( 'i', $id);
     
        $result = mysqli_stmt_execute($prep);
        header("Location:../agregar-editar.php");
}