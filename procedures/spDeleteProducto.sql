DROP PROCEDURE IF EXISTS deleteProducto;

DELIMITER $$

CREATE PROCEDURE deleteProducto(
  IN _id_producto int
)

BEGIN


DELETE FROM `pv_producto` WHERE `id_producto`=_id_producto;

END $$
DELIMITER ;
