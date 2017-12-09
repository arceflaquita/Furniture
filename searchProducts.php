<?php
  include_once('conexion.php');
  $desc = $_POST['desc'];
  $resp='<div class="features_items">
    <h2 class="title text-center">Productos encontrados</h2>
    <hr style="color: red; border-top: 3px solid #eee;">';
  $sql="select p.id_producto, producto, precio_venta, descripcion, imagen "
  ."from pv_producto p inner join pv_imagen i on p.id_producto = i.id_producto "
  ."where producto like '%" . $desc . "%'";
  $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
  while($row=$result->fetch_assoc()){
    $resp.="<div class='col-sm-4'>
      <div class='product-image-wrapper'>
        <div class='single-products'>
            <div class='productinfo text-center'>
              <img src='files/".$row['imagen']."' style='height: 139px;'  />
              <h2>$".$row['precio_venta']."</h2>
              <p>".$row['producto']."</p>
              <p style='color:gray;'>".$row['descripcion']."</p>
            </div>
            <div class='product-overlay'>
              <div class='overlay-content'>
                <h2>$".$row['precio_venta']."</h2>
                <p>".$row['producto']."</p>
              </div>
            </div>
        </div>
        <div class='choose'>
          <ul class='nav nav-pills nav-justified'>
            <li class='añadir'><a href='carritodecompras.php?id=".$row['id_producto']."' style='color:white;'>Añadir a la Cesta</a></li>
            <li class='detalles'><a href='consultaDetalleProducto.php?idProducto=".$row['id_producto']."' style='color:black;'></i>Detalles</a></li>
          </ul>
        </div>
      </div>
    </div>";
  }
  $resp.="</div>";
  echo $resp;
?>
