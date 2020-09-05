<?php 
 
if(isset($_POST)){
    $search = trim($_POST['search']);    
}
header("Location:../agregar-editar.php?search=$search");