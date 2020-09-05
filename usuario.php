<?php require_once 'includes/cabecera.php'?>

<?php 
$db = Database::Connect()->query("select * from auditoria");


 ?>
<ul class="list-group">
  <li class="list-group-item active">Cras justo odio</li>
  <li class="list-group-item">Dapibus ac facilisis in</li>
  <li class="list-group-item">Morbi leo risus</li>
  <li class="list-group-item">Porta ac consectetur ac</li>
  <li class="list-group-item">Vestibulum at eros</li>
</ul>

<?php require_once 'includes/footer.php'?>