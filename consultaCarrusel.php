<?php
include_once('conexion.php');
$resultado="<div class='row'>
        <div class='panel panel-primary'>
         <h1>Carrusel</h1>
            <div class='panel-heading' style='text-align:right;'>
                <a class='btn btn-success' title='Nuevo' href='newCarrusel.php'>
                        <span class='glyphicon glyphicon-plus-sign'> Agregar</span>
                </a>
            </div>
                <table class='table'>
                    <thead>
                        <th>#</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>URL</th>
                    </thead>
                    ";

$sql="CALL spGetCarrusel();";
$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
               $resultado.=" <tbody>
                        <tr>
                        	<td>".$row['id_imagen']."</td>
                            <td><img src='images/carrusel/".$row['imagen']."' width='40px' alt=''></td>
                            <td>".$row['descripcion']."</td>
                            <td>".$row['URL']."</td>
                            <td>
                                <a class='btn btn-default btn-sm' title='Modificar Imagen' href='modificarCarrusel.php?idProducto=".$row['id_imagen']."'>
                                    <span class='glyphicon glyphicon-edit'></span>
                                </a>
                                <a class='btn btn-default btn-sm' title='Eliminar Imagen'  onclick='eliminarCarrusel(".$row['id_imagen'].")'>
                                    <span class='glyphicon glyphicon-trash' ></span>
                                </a>
                            </td>
                        </tr>
                    </tbody>
               ";
            }
            $resultado.="</table>
        </div>
    </div>";
echo $resultado;
?>
