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
            <h2>Detalle de Ventas</h2>
            <?php

            $folio = $_GET['folio'];

            include_once('conexion.php');
            $sql = "select folio, date_format(feha, '%d/%m/%Y') as feha, monto, c.nombre_cliente, c.ap_paterno_cliente,
            c.ap_materno_cliente, c.nombre_contacto, c.calle, c.numero_exterior, c.numero_interior, c.entre_calles, c.referencias, c.colonia,
            e.estado, m.municipio, c.codigo_postal
            from pv_venta v
            inner join pv_cliente c on v.id_cliente = c.id_cliente
            inner join pv_estado e on c.id_estado = e.id_estado
            inner join pv_municipio m on c.id_municipio = m.id_municipio
            where folio=" . $folio;
            $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
            echo "<table class='table'>";
            while($row=$resulta->fetch_assoc()){
              echo "<tr><td>Folio</td><td>". $row['folio'] ."</td></tr>";
              echo "<tr><td>Fecha</td><td>". $row['feha'] ."</td></tr>";
              echo "<tr><td>Monto</td><td>$ ". $row['monto'] ."</td></tr>";
              echo "<tr><td>Nombre cliente</td><td>". $row['nombre_cliente'] ."</td></tr>";
              echo "<tr><td>Apellido materno</td><td>". $row['ap_paterno_cliente'] ."</td></tr>";
              echo "<tr><td>Apellido paterno</td><td>". $row['ap_materno_cliente'] ."</td></tr>";
              echo "<tr><td>Nombre contacto</td><td>". $row['nombre_contacto'] ."</td></tr>";
              echo "<tr><td>Calle</td><td>". $row['calle'] ."</td></tr>";
              echo "<tr><td>Numero Ext.</td><td>". $row['numero_exterior'] ."</td></tr>";
              echo "<tr><td>Numero Int.</td><td>". $row['numero_interior'] ."</td></tr>";
              echo "<tr><td>Entre calles</td><td>". $row['entre_calles'] ."</td></tr>";
              echo "<tr><td>Referencias</td><td>". $row['referencias'] ."</td></tr>";
              echo "<tr><td>Colonia</td><td>". $row['colonia'] ."</td></tr>";
              echo "<tr><td>Municipio</td><td>". $row['municipio'] ."</td></tr>";
              echo "<tr><td>Estado</td><td>". $row['estado'] ."</td></tr>";
              echo "<tr><td>C.P.</td><td>". $row['codigo_postal'] ."</td></tr>";
            }
            echo "</table>";
            $sql = "select date_format(fecha, '%d/%m/%Y') as fecha, imagen, producto, dv.precio_venta, cantidad
            from pv_detalle_venta dv
            inner join pv_producto p on p.id_producto = dv.id_producto
            inner join pv_imagen i on p.id_producto = i.id_producto
            where dv.folio = " . $folio;
            $resulta = $conn->query($sql) or die("error: " . mysqli_error($conn));
            echo "<hr/><h2>Listado de productos</h2></br>";
            echo "<table class='table'>";
            echo "<tr>";
            echo "<th>Fecha</th>";
            echo "<th>Imagen</th>";
            echo "<th>Producto</th>";
            echo "<th>Precio</th>";
            echo "<th>Cantidad</th>";
            echo "<th>Subtotal</th>";
            echo "</tr>";
            while($row=$resulta->fetch_assoc()){
              echo "<tr>";
              echo "<td>". $row['fecha'] ."</td>";
              echo "<td><img src='files/". $row['imagen'] ."' width='150px'></td>";
              echo "<td>". $row['producto'] ."</td>";
              echo "<td>$ ". $row['precio_venta'] ."</td>";
              echo "<td>". $row['cantidad'] ."</td>";
              echo "<td>$ ". $row['precio_venta']*$row['cantidad'] ."</td>";
              echo "</tr>";
            }
            echo "</table>";
            echo "</br>";
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
