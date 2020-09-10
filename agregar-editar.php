<?php //No permite entrar por la url sin logearse?>
<?php require_once 'helpers/seguridad.php'?>
<?php $seguridad= new Seguridad();
      if($seguridad->getUsuario() == null){
        header('Location: login.html');     
      }
?>
<?php require_once 'includes/cabecera.php'?>

<?php if (isset($_SESSION['registro']) && $_SESSION['registro'] == 'complete'):?>
  <div class="alert alert-success">
  <strong>Registrado!</strong> Se ha registrado correctamente.
</div>
<?php elseif(isset($_SESSION['registro']) && $_SESSION['registro'] != 'complete'):?>
  <div class="alert alert-danger">
  <strong>Danger!</strong> Error al registrar. Campo incorrecto 
</div>
<?php endif;?>
<?php Utils::deleteSession('registro')?>

<?php if (isset($_SESSION['delete']) && $_SESSION['delete'] == 'complete'):?>
  <div class="alert alert-success">
  <strong>Registrado!</strong> Se ha eliminado correctamente.
</div>
<?php elseif(isset($_SESSION['delete']) && $_SESSION['delete'] != 'complete'):?>
  <div class="alert alert-danger">
  <strong>Danger!</strong> Error al borrar.  
</div>
<?php endif;?>
 
<?php Utils::deleteSession('delete')?>

 <?php if(isset($_GET['error'])){
   var_dump($_GET['error']); die();
 }?>
<div class="content">
<div class="container">

<form id= "buscador" class="form-inline d-flex justify-content-center md-form form-sm active-black active-black-2 mt-2" action="Data/search.php" method="POST">
          <button type="submit"  class="fa fa-search" aria-hidden="true"></button>
          <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
            aria-label="Search" name="search">
</form>

  <form class="form-horizontal" action="Data/agregar-editar.php" method="POST">
  <h2>Agregar/Editar</h2>
    <input type="hidden" id="Cid" name="id">
    <input type="hidden" id="Cccreacion" name="Cccreacion">
     <input type="hidden" id="Cmmodificado" name="Cmmodificado">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nombre:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="Cnombre" placeholder="Nombre" name="nombre">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Apellidos:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="Capellidos" placeholder="Apellidos" name="apellidos">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Año:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="Caño" placeholder="Año de ingreso" name="año">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Cargo:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="Ccargo" placeholder="Cargo" name="cargo">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" id="Cbutton" class="btn btn-success">Guardar</button>
      </div>
    </div>
  </form>

  <?php 
  
  $sql = "Select * from empleados order by id desc";
   $empleados = Database::connect()->query($sql);
  
   if(isset($_GET["search"])){
    $search =  Database::connect()->real_escape_string($_GET["search"]);
    $sql = "Select * from empleados where nombres ='$search' order by id desc";
    $empleados = Database::connect()->query($sql);
  }
  ?>

  <table class="table ">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Año</th>
      <th scope="col">Cargo</th>
      <th  scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody id="contenido">
     
  </tbody>
</table>
 
</div>
</div>

<script src="js/datos.js"></script>
<?php require_once 'includes/footer.php'?>