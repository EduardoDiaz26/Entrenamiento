<?php require_once 'includes/cabecera.php'?>
 

<div class="container">
  <h2>Agregar/Editar</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Nombre:</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Apellidos:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Año:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="año" placeholder="Año de ingreso" name="año">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Cargo:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" id="cargo" placeholder="Cargo" name="cargo">
      </div>
    </div>
    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <div class="checkbox">
          <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>


<?php require_once 'includes/footer.php'?>