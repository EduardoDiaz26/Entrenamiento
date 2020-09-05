<?php 
 //Se obtiene lo que escribe el usuario en el buscador y se redirige por get a agregar-editar.php
if(isset($_POST)){
    $search = trim($_POST['search']);    
}
header("Location:../agregar-editar.php?search=$search");