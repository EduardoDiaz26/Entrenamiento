
<?php require_once 'includes/cabecera.php'?>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img class="d-block img-fluid" src="https://academia.crandi.com/wp-content/uploads/2020/07/programa-de-beneficios-para-empleados.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://www.bizneo.com/blog/wp-content/uploads/2019/10/como-motivar-a-los-empleados-810x455.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img class="d-block img-fluid" src="https://www.popularenlinea.com/Personas/blog/PublishingImages/2020/Marzo/Qu%C3%A9_hago_si_uno_de_mis_empleados_se_enferma_de_coronavirus.jpg" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">

          <?php 
                $total = Database::connect()->query("Select count(id) as total from empleados");
          //var_dump($total->fetch_object());
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

          $empleados = Database::connect()->query("Select * from empleados limit $offset, $limit"); 
          ?>
          <?php if(mysqli_num_rows($empleados) > 0):?>
            <?php while($empleado = mysqli_fetch_object($empleados)):?>
              
            <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
              <a href="#"><img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/04/26/12/25/male-1354358_960_720.png" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#"><?=$empleado->nombres.' '.$empleado->apellidos?></a>
                </h4>
                <h5><?=$empleado->cargo?></h5>
                <p class="card-text">Ingreso a la empresa en el año <?=$empleado->años?></p>
              </div>
              
            </div>
          </div>
            <?php endwhile; ?>
            <?php endif; ?>    

 <?php

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
      ?>    
          <!--Pagination-->
          <?php if($total_pages > 1): ?>
          <ul class="pagination pagination-sm5 justify-content-center">
            <!-- Link of the first page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index.php?page=1'><<</a>
            </li>
            <!-- Link of the previous page -->
            <li class='page-item <?php ($page <= 1 ? print 'disabled' : '')?>'>
              <a class='page-link' href='index.php?page=<?php ($page>1 ? print($page-1) : print 1)?>'><</a>
            </li>
            <!-- Links of the pages with page number -->
            <?php for($i=$start; $i<=$end; $i++) { ?>
            <li class='page-item <?php ($i == $page ? print 'active' : '')?>'>
              <a class='page-link' href='index.php?page=<?php echo $i;?>'><?php echo $i;?></a>
            </li>
            <?php } ?>
            <!-- Link of the next page -->
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index.php?page=<?php ($page < $total_pages ? print($page+1) : print $total_pages)?>'>></a>
            </li>
            <!-- Link of the last page -->
            <li class='page-item <?php ($page >= $total_pages ? print 'disabled' : '')?>'>
              <a class='page-link' href='index.php?page=<?php echo $total_pages;?>'>>>                      
              </a>
            </li>
          </ul>
            <?php endif; ?>
       
    </div>
 </div>
</div>
        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->
    
  </div>
  <!-- /.container -->

  <?php require_once 'includes/footer.php'?>