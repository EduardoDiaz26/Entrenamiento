<?php //No permite entrar por la url sin logearse?>
<?php require_once 'helpers/seguridad.php'?>
<?php $seguridad= new Seguridad();
      if($seguridad->getUsuario() == null){
        header('Location: login.html');     
      }
?>
<?php require_once 'includes/cabecera.php'?>
  <!-- Page Content -->
  <div class="container">

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
        <!-- Search form -->
        <form class="form-inline d-flex justify-content-center md-form form-sm active-pink active-pink-2 mt-2" action="" method="POST">
          <a href="#" class="fa fa-search" aria-hidden="true"></a>
          <input class="form-control form-control-sm ml-3 w-75" type="text" placeholder="Search"
            aria-label="Search">
        </form>
        <div  class="row">
 
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
  <script src="js/principal.js"></script>
  <?php require_once 'includes/footer.php'?>