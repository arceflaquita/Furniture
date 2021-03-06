<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="col-md-8">
      <div id="slider-carousel"  data-ride="carousel" data-interval="5000">
        <ol class="carousel-indicators">
        <?php
        include_once('conexion.php');
        $sql = "select id_imagen, imagen, id_producto from pv_carrusel;;";
        $result = $conn->query($sql) or die("error: " . mysqli_error($conn));
        while($row=$result->fetch_assoc()){
        ?>
        <li data-target="#slider-carousel" data-slide-to="<?php echo $row['id_imagen'] - 1; ?>" <?php if($row['id_imagen'] == 1) { echo 'class=\'active\''; } ?> ></li>

        <?php } ?>
        </ol>
        <div class="carousel-inner">
          <?php
            mysqli_data_seek($result,0);
            while($row=$result->fetch_assoc()){
            ?>
            <div class="item <?php if($row['id_imagen'] == 1) { echo 'active'; } ?>">
              <div class="col-md-8">
                <a href="consultaDetalleProducto.php?idProducto=<?php echo $row['id_producto']; ?>" >
                <img src="images/carrusel/<?php echo $row['imagen']; ?>"  style="width: 720px; height:317px;" />
                </a>
              </div>
            </div>
            <?php
              }
            ?>
        </div>
        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
          <i class="fa fa-angle-left"></i>
        </a>
        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
          <i class="fa fa-angle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-md-4">
        <table>
         <thead>
           <th><img src="images/home/promo1.png" style="width: 100%; height: 184px;" alt="" /></th>
         </thead>
         <tbody>
         </tbody>
         <td><img src="images/home/promo2.png" style="width: 100%; height: 132px; " alt="" /></td>
        </table>
    </div>
    </div>
  </div>
</div>
