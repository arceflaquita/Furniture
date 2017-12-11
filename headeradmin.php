<div class="header_top"><!--header_top-->
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="contactinfo">
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li>
            <?php
            if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
              echo '<a href="#" class="active">';
              echo strtoupper($_SESSION['name']);
              echo '</a>';
            }
            ?>
            </li>
            <li><a href="logout.php">SALIR</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="logo pull-left">
          <a href="index.php"><img class="logo" src="images/home/logo.png" alt="" /></a>
        </div>
      </div>
    </div>
  </div>
</div><!--/header-middle-->

<div class="header-bottom"><!--header-bottom-->
  <div class="container">
    <div class="row">
      <div class="col-sm-9">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="mainmenu pull-left">
          <b>
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="carrusel.php" class="active">CARRUSEL</a></li>
            <li><a href="searchProvedor.php" class="active">PROVEDORES</a></li>
            <li><a href="searchProducto.php" class="active">PRODUCTOS</a></li>
            <li><a href="queryCustomers.php" class="active">CLIENTES</a></li>
            <?php
            if($_SESSION['id_categoria'] == 1){
            ?>
              <li><a href="reporte.php" class="active">REPORTE VENTAS</a></li>
            <?php
            }
            ?>
          </ul>
          </b>
        </div>
      </div>
    </div>
  </div>
</div><!--/header-bottom-->
