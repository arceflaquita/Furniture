<?php

  include_once('conexion.php');
$resultado="<div class='row'>
        <div class='panel panel-primary'>
         <h1>Productos</h1>
            <div class='panel-heading' style='text-align:right;'>
           
                <a class='btn btn-success' title='Nuevo' href='newProducto.php'>
                        <span class='glyphicon glyphicon-plus-sign'> Agregar</span>
                </a>
            </div>
                <table class='table'>
                    <thead>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>descripcion</th>
                        <th>Opciones</th>
                        
                    </thead>
                    ";

$sql="select * from pv_producto";


$result = $conn->query($sql) or die("error: " . mysqli_error($conn));
            while($row=$result->fetch_assoc()){
              
               $resultado.=" <tbody>
                        <tr>
                        	<td>".$row['id_producto']."</td>
                            <td>".$row['producto']."</td>
                            <td>".$row['descripcion']."</td>
                            
                            <td>
                                <a class='btn btn-default btn-sm' title='Modificar Producto' href='consultaProducto.php?idProducto=".$row['id_producto']."'>
                                    <span class='glyphicon glyphicon-edit'></span> 
                                </a>
                                <a class='btn btn-default btn-sm' title='Eliminar Producto'  onclick='eliminar(".$row['id_producto'].")'>
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