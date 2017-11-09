DROP PROCEDURE IF EXISTS searchProductos;

DELIMITER $$

CREATE PROCEDURE searchProductos()

BEGIN

SELECT * FROM pv_imagen, pv_producto;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
