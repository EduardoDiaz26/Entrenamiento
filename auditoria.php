<?php //No permite entrar por la url sin logearse?>
<?php require_once 'helpers/seguridad.php'?>
<?php $seguridad= new Seguridad();
      if($seguridad->getUsuario() == null){
        header('Location: login.html');     
      }
?>

<?php require_once 'includes/cabecera.php'?>

 <div class="container">
<ul class="list-group"> 
<li class="list-group-item active">Registro de actividades</li>

</ul>
</div>
<script src="js/auditoria.js"></script>
<?php require_once 'includes/footer.php'?>