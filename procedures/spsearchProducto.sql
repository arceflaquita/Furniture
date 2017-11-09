DROP PROCEDURE IF EXISTS searProducto;

DELIMITER $$

CREATE PROCEDURE searProducto(
  IN _id_producto int
 
)

BEGIN


SELECT * FROM pv_imagen, pv_producto WHERE pv_producto.`id_producto`=_id_producto;



END $$
DELIMITER ;