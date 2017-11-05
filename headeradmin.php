<div class="header_top"><!--header_top-->
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
        <div class="contactinfo">
        </div>
      </div>
      <div class="col-sm-6">
        <?php
        if(isset($_SESSION['name']) && $_SESSION['name'] <> ''){
            echo '<div class="username">' . $_SESSION['name'] . '</div>';
        }
        ?>
      </div>
      <div class="username">
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
            <li><a href="queryCustomers.php" class="active">C L I E N T E S</a></li>
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
