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

 <?php if(isset($_GET['error'])){
   var_dump($_GET['error']); die();
 }?>

<div class="container">
  <form class="form-horizontal" action="Data/agregar-editar.php" method="POST">
  <h2>Agregar/Editar</h2>
    <input type="hidden" id="Cid" name="id">
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

  <?php $empleados = Database::connect()->query("Select * from empleados");?>

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
  <tbody>
    <?php while($empleado = $empleados->fetch_object()): ?>
    <tr>
      <td id="id<?=$empleado->id?>" style="display: none"><?=$empleado->id?></td>
      <td id="nombre<?=$empleado->id?>"><?=$empleado->nombres?></td>
      <td id="apellido<?=$empleado->id?>"><?=$empleado->apellidos?></td>
      <td id="años<?=$empleado->id?>"><?=$empleado->años?></td>
      <td id="cargo<?=$empleado->id?>"><?=$empleado->cargo?></td>
      <td>
        <a href="#" onclick="abrir('<?=$empleado->id?>')" class="fa fa-pencil-square-o" style="font-size:24px">  </a>
        <a href="Data/eliminar.php?id=<?=$empleado->id?>" class="fa fa-trash-o" style="font-size:24px"></a>
      </td>
    </tr> 
    <?php endwhile;?>
  </tbody>
</table>
 
</div>
<br><br><br><br><br>

<?php require_once 'includes/footer.php'?>