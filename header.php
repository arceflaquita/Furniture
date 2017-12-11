<div class="header_top"><!--header-bottom-->
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

        </div>
        <div class="contactinfo">
          <ul class="nav navbar-nav collapse navbar-collapse">
            <li><a href="index.php" class="active">INICIO</a></li>
            <li><a href="contact-us.php" class="active">CONTACTO</a></li>
            <li><a href="login.php" class="active">LOGIN</a></li>
            <li>
            <?php
            if(isset($_SESSION['name']) && $_SESSION['name'] != ''){
                echo '<a href="profileCustomer.php"><img src="images/admin/user.png" width="20px">&nbsp;MI CUENTA</a>';
            }
            ?>
            </li>
            <li><a href="logout.php">SALIR</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div><!--/header-bottom-->

<div class="header-middle"><!--header-middle-->
  <div class="container">
    <div class="row">
      <div class="col-sm-4">
        <div class="logo pull-left">
          <a href="index.php"><img class="logo" src="images/home/logo.png" alt="" /></a>
        </div>
      </div>
      <div class="col-sm-8">
        <div class="shop-menu pull-right">
          <ul class="nav navbar-nav">
            <li><a href="carritodecompras.php" style="color:orange;"><i class="fa fa-shopping-cart"></i> Carrito: <span style="color:gray;">Carrito de Compras <label style="color:black;"> <?php
             if(isset($_SESSION['carrito'])){
                 echo count($_SESSION['carrito']);
             }else{
                echo 0;
             }
             ?></label></span> </a></li>
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
        <input id='txtSearch' type="text" placeholder="Buscar productos"/>
      </div>
    </div>
  </div>
</div><!--/header-middle-->
