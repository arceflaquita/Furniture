DROP PROCEDURE IF EXISTS addVentaArticulo;

DELIMITER $$

CREATE PROCEDURE addVentaArticulo(
  IN _monto float,
  IN _id_cliente int
)

BEGIN



INSERT INTO `pv_venta`(`feha`, `monto`, `id_cliente`, `id_proceso`) VALUES (curdate(),_monto,_id_cliente,1);




END $$
DELIMITER ;