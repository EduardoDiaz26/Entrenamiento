
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
 <?php if(isset($_GET['error'])){
   var_dump($_GET['error']); die();
 }?>
<div class="container">
  <form class="form-horizontal" action="controller/agregar-editar.php" method="POST">
  <h2>Agregar/Editar</h2>
    <input type="hidden" name="id">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nombre:</label>
      <div class="col-sm-3">
        <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Apellidos:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Año:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="año" placeholder="Año de ingreso" name="año">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Cargo:</label>
      <div class="col-sm-3">          
        <input type="text" class="form-control" id="cargo" placeholder="Cargo" name="cargo">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-success">Guardar</button>
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
      <td><?=$empleado->nombres?></td>
      <td><?=$empleado->apellidos?></td>
      <td><?=$empleado->años?></td>
      <td><?=$empleado->cargo?></td>
      <td>
        <a href="·" class="fa fa-pencil-square-o" style="font-size:24px">  </a>
        <a href="·" class="fa fa-trash-o" style="font-size:24px"></a>
      </td>
    </tr> 
    <?php endwhile;?>
  </tbody>
</table>
 
</div>
<br><br><br>

<?php require_once 'includes/footer.php'?>