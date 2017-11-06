
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <link href="css/furniture.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
  <header id="header"><!--header-->
    <?php include_once('header.php'); ?>
  </header><!--/header-->
  <section id="form"><!--form-->
    <div class="container">
  
        <div class="col-md-10">
          <div class="signup-form"><!--sign up form-->
            <h2>Nuevo Provedor</h2>
            <form action="addProvedor.php" method="post">
              <div class="col-md-5">
              <input type="text" name="txtProvedor"  class="form-control" placeholder="Nombre del Provedor" required="required"/>
               
              <input type="text" name="txtContacto" class="form-control" placeholder="contacto" required="required"/>
            
              <input type="tel" name="txtTelefono" class="form-control" placeholder="Telefono" required="required"/>

              <input type="email" name="txtCorreo" class="form-control" placeholder="Correo" required="required"/>

              <input type="text" name="txtCalle" class="form-control" placeholder="Calle" required="required"/>
              <div class="col-md-7">
                <input type="text" name="txtNumExterior" class="form-control" placeholder="Numero Exterio" required="required"/>
                <input type="text" name="txtNumInterior" class="form-control" placeholder="Numero Interior" required="required"/>
              </div>
          
            </div>
            <div class="col-md-5">
          
            
              <h5>Estado</h5>
              <select name="estado" id="estado">
                
              </select>
              
              <h5>Municipio</h5>
              <select name="municipio" id="municipio">
                <option value="0">Seleccione un Municipio</option>
              </select>
              

              
              <h5>Colonia</h5>
              <select name="colonia" id="colonia">
                <option value="0">Seleccione una Colonia</option>
              </select>
              

             
              <h5>Codigo Postal</h5>
              <select name="codigoPostal" id="codigoPostal">
                <option value="0">Seleccione un codigo Postal</option>
              </select>
              
            

              </br></br>
             
              </div>
              <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span> AGREGAR</button>
              


            </form>
          </div><!--/sign up form-->
        </div>
      
    </div>
  </section><!--/form-->

  <footer id="footer"><!--Footer-->
    <?php include_once('footer.php'); ?>
  </footer><!--/Footer-->

  <script src="js/jquery.js"></script>
  <script src="js/price-range.js"></script>
  <script src="js/jquery.scrollUp.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.prettyPhoto.js"></script>
  <script src="js/main.js"></script>
  <script src="js/index.js"></script>
</body>
</html>
