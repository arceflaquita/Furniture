DROP PROCEDURE IF EXISTS updateProducto;

DELIMITER $$

CREATE PROCEDURE updateProducto(
  IN _producto varchar(255),
  IN _precio_compra float,
  IN _precio_venta float,
  IN _descripcion varchar(45),
  IN _id_categoria int,
  IN _id_provedor int,
  IN _id_producto int
)

BEGIN


UPDATE `pv_producto` SET
 `producto`=_producto,`precio_compra`=_precio_compra,`precio_venta`=_precio_venta,
 `descripcion`=_descripcion,`id_categoria`=_id_categoria,`id_provedor`=_id_provedor WHERE `id_producto`=_id_producto;


END $$
DELIMITER ;
