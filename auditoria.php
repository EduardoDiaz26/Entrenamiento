<?php session_start(); ?>
<?php require_once 'includes/cabecera.php'?>

<?php 
$auditoria = Database::Connect()->query("select a.*, u.usuario from auditoria a INNER JOIN usuarios u on a.usuario_id = u.id order by a.id desc");
 ?>
 <div class="container">
<ul class="list-group"> 
<li class="list-group-item active">Registro de actividades</li>
<?php while ($actividades = $auditoria->fetch_object()):?>
  <li class="list-group-item">El usuario <?=$actividades->usuario.' '.$actividades->accion.' ('.$actividades->usuario_id.
                                        ', '.$actividades->nombres.', '.$actividades->apellidos.', '.$actividades->años
                                        .', '.$actividades->cargo.', '.$actividades->creado.', '.$actividades->modificado.') Fecha:'.$actividades->fecha
                                        ?>  </li>
<?php endwhile;?>
</ul>
</div>
<?php require_once 'includes/footer.php'?>