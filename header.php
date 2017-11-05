<div class="header_top"><!--header_top-->
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="contactinfo">
          <ul class="nav nav-pills">
            <li><a href="#"><i class=""></i>INICIO</a></li>
            <li><a href="#"><i class=""></i>NUEVO</a></li>
            <li><a href="#"><i class=""></i>DESTACADOS</a></li>
            <li><a href="#"><i class=""></i>MÁS VENDIDOS</a></li>
            <li><a href="#"><i class=""></i>OFERTAS</a></li>
            <li><a href="#"><i class=""></i>FABRICANTES</a></li>
            <li><a href="#"><i class=""></i>NUEVO</a></li>
            <li><a href="#"><i class=""></i>COMENTARIOS</a></li>
            <li><a href="contact-us.html"><i class=""></i>CONTACTOS</a></li>
          </ul>
        </div>
      </div>
      <div class="col-sm-6 username">
        <?php
        if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
            echo '<a href="profileCustomer.php"><img src="images/admin/user.png" width="20px">&nbsp;Mi cuenta</a>';
        }
        ?>
      </div>
      <div class="col-sm-6 username">
        <a href="logout.php">Salir</a>
      </div>
    </div>
  </div>
</div><!--/header_top-->

<div class="header-middle"><!--header-middle-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="logo pull-left">
          <a href="index.html"><img class="logo" src="images/home/logo.png" alt="" /></a>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="shop-menu pull-right">
          <ul class="nav navbar-nav">
            <li><a href="cart.php" style="color:orange;"><i class="fa fa-shopping-cart"></i> Carrito: <span style="color:gray;">Carrito de Compras <label style="color:black;"> 0 productos</label></span> </a></li>
            <li>
            <div class="btn-group pull-right">
              <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                  US DOLLAR
                  <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                  <li><a href="#">Canadian Dollar</a></li>
                  <li><a href="#">Pound</a></li>
                </ul>
              </div>
            </div>
          </li>
          </ul>
        </div>
      </div>
      <div class="search_box pull-right">
        <input type="text" placeholder="Busqueda del sitio"/>
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
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="index.html" class="active">BEDROOM</a></li>
            <li class="dropdown"><a href="#">LIVING ROOM<i class="fa fa-angle-down"></i></a></li>
            <li class="dropdown"><a href="#">DINING ROOM<i class="fa fa-angle-down"></i></a></li>
            <li><a href="404.html">KITCHEN</a></li>
            <li><a href="contact-us.html">LEATHER SECTIONALS</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div><!--/header-bottom-->
