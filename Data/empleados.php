<?php
require_once './helpers/conexion.php';

class empleados{

    public function mostrar()
    {
        $sql = "Select * from empleados order by id desc";
        $empleado = Database::connect()->query($sql);
        $empleados["items"] = array();

             $empleados = mysqli_fetch_all($empleado, MYSQLI_ASSOC);
             exit (json_encode($empleados));
    }

    public function mostrar1(){

        $total = Database::connect()->query("Select count(id) as total from empleados");
          $limit = 6;
          $total = $total->fetch_object()->total;
          $total_pages = ceil($total/$limit); 

          if(isset($_GET['page']) && $_GET['page'] != "") {
            $page = $_GET['page'];
            $offset = $limit * ($page-1);
          } else {
            $page = 1;
            $offset = 0;
          }

          $empleado = Database::connect()->query("Select * from empleados  limit $offset, $limit "); 
          $empleados["items"] = array();
          $res = $empleado;
          $empleados = mysqli_fetch_all($res, MYSQLI_ASSOC);
           
         
          if($total_pages <= (1+($limit * 2))) {
            $start = 1;
            $end   = $total_pages;
          } else {
            if(($page - $limit) > 1) { 
              if(($page + $limit) < $total_pages) { 
                $start = ($page - $limit);            
                $end   = ($page + $limit);         
              } else {             
                $start = ($total_pages - (1+($limit*2)));  
                $end   = $total_pages;               
              }
            } else {               
              $start = 1;                                
              $end   = (1+($limit * 2));             
            }
          }

          exit (json_encode($empleados));
          



    }

  public function auditoria(){
  
$auditoria = Database::Connect()->query("select a.*, u.usuario from auditoria a INNER JOIN usuarios u on a.usuario_id = u.id order by a.id desc");
$empleados["items"] = array();

$empleados = mysqli_fetch_all($auditoria, MYSQLI_ASSOC);
exit (json_encode($empleados));
 

  

}



}