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
    $creado = $_POST['Cccreacion'];
    $modificado = $_POST['Cmmodificado'];

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

    if(!empty($años) && !preg_match("/[a-zA-Z]/", $años)){
        $año_validado = true;
    }else{
        $año_validado = false;
        $errores['año'] = "El año no es valido";
    }

    if(!empty($cargo) && !preg_match("/[0-9]/", $cargo)){
        $cargo_validado = true;
    }else{
        $cargo_validado = false;
        $errores['cargo'] = "El nombre no es valido";
    }
    $error = "Error";
    

    
    $fecha = date('Y-m-d H:i:s');
    if(count($errores) == 0){
        
      if($id == null){
        $creado = date('Y-m-d H:i:s');
        $modificado = date('Y-m-d H:i:s');
        $sql = "insert into empleados values(null, ?, ?, ?, ?, ?, ?, ?)";
        $prep = mysqli_prepare($db, $sql);
        $prep->bind_param( 'issssss', $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado);
     
        $result = mysqli_stmt_execute($prep);
        
        if($result){
            $creado = date('Y-m-d H:i:s');
            $modificado = date('Y-m-d H:i:s');
            $ID = $db->query("select id from empleados  order by id desc limit 1")->fetch_object();     
            $accion = "creo un nuevo registro";
            $sql = "insert into auditoria values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $prep = mysqli_prepare($db, $sql);
            $prep->bind_param( 'iissssssss', $ID, $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado, $accion, $fecha);
        
            $result = mysqli_stmt_execute($prep);
        }
        
    }else{
            $sql = "update empleados set usuario_id = ?, nombres = ?, apellidos = ?, años = ?, cargo = ?, modificado = ? where id= ?";
            $prep = mysqli_prepare($db, $sql);
            $prep->bind_param('isssssi', $usuario_id, $nombres, $apellidos, $años, $cargo, $modificado, $id);
         
            $result = mysqli_stmt_execute($prep); 
            
          
            if($result){
                $accion = "actualizo el registro";
                $sql = "insert into auditoria values(null, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $prep = mysqli_prepare($db, $sql);
                $prep->bind_param( 'iissssssss', $id, $usuario_id, $nombres, $apellidos, $años, $cargo, $creado, $modificado,$accion, $fecha);
            
                $result = mysqli_stmt_execute($prep);
             }
            }

        if($result){
           $_SESSION['registro'] = 'complete';
        }else{
            $_SESSION['registro'] = 'failed';
        }
    }else{
        $_SESSION['registro'] = 'failed';
        
    }

    

}else{
    $_SESSION['registro'] = 'failed';
}

header("location:../agregar-editar.php");






?>