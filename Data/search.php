<?php 
require_once '../includes/conexion.php';
if(isset($_POST)){

    $search = trim($_POST['search']);
   /* $db = Database::connect();
    $sql = "select * from empleados where nombres =? ";
    $prep = mysqli_prepare($db, $sql);
    
    mysqli_stmt_bind_param($prep, "s", $search);
    $result = mysqli_stmt_execute($prep);

    if($result){
                
        $prep->bind_result($id, $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado); 
             
        //var_dump($datos);die();
        while(mysqli_stmt_fetch($prep)){
            $id;
            $usuario_id;
            $nombres;
            $apellidos;
            $años;
            $cargo;
            $creado;
            $modificado;
        }*/
     

}

header("Location:../agregar-editar.php?search=$search");