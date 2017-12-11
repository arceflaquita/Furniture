<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | Furniture</title>
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
    <?php include_once('headeradmin.php'); ?>
  </header><!--/header-->
  <section id="form"><!--form-->
    <div class="container">

        <div class="col-md-10">
          <div class="signup-form"><!--sign up form-->
            <h2>Reporte de Ventas</h2>
            <?php
            include_once('conexion.php');
            $sql = "select folio, date_format(feha, '%d/%m/%Y') as feha, monto, c.nombre_cliente, c.ap_paterno_cliente,
            c.ap_materno_cliente, c.nombre_contacto, c.calle, c.numero_exterior, c.numero_interior, c.entre_calles, c.referencias, c.colonia,
            e.estado, m.municipio, c.codigo_postal
            from pv_venta v
            inner join pv_cliente c on v.id_cliente = c.id_cliente
            inner join pv_estado e on c.id_estado = e.id_estado
            inner join pv_municipio m on c.id_municipio = m.id_municipio ";

            $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Folio</th>";
            echo "<th>Fecha</th>";
            echo "<th>Monto</th>";
            echo "<th>Nombre cliente</th>";
            echo "<th>Apellido materno</th>";
            echo "<th>Apellido paterno</th>";
            echo "<th>Nombre contacto</th>";
            echo "</tr>";
            while($row=$resulta->fetch_assoc()){
              echo "<tr>";
              echo "<td><a href='reporteDetalle.php?folio=" . $row['folio'] . "'>". $row['folio'] ."</a></td>";
              echo "<td>". $row['feha'] ."</td>";
              echo "<td>$ ". $row['monto'] ."</td>";
              echo "<td>". $row['nombre_cliente'] ."</td>";
              echo "<td>". $row['ap_paterno_cliente'] ."</td>";
              echo "<td>". $row['ap_materno_cliente'] ."</td>";
              echo "<td>". $row['nombre_contacto'] ."</td>";
              echo "</tr>";
            }
            echo "</table>";
            ?>
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
  <script src="js/index2.js"></script>
</body>
</html>
