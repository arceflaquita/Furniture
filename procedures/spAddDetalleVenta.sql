DROP PROCEDURE IF EXISTS addDestalleVenta;

DELIMITER $$

CREATE PROCEDURE addDestalleVenta(
  IN _precio_venta float,
  IN _cantidad int,
  IN _id_producto int
)

BEGIN

 Select @folio := max(folio) from pv_venta ;

INSERT INTO `pv_detalle_venta`( `fecha`, `precio_venta`, `cantidad`, `folio`, `id_producto`) 
VALUES (curdate(),_precio_venta,_cantidad,@folio,_id_producto);




END $$
DELIMITER ;