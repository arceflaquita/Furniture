DROP PROCEDURE IF EXISTS searProducto;

DELIMITER $$

CREATE PROCEDURE searProducto(
  IN _id_producto int
 
)

BEGIN

SELECT * FROM `pv_producto` WHERE `id_producto`=_id_producto;

END $$
DELIMITER ;