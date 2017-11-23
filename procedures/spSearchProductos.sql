DROP PROCEDURE IF EXISTS searchProductos;

DELIMITER $$

CREATE PROCEDURE searchProductos()

BEGIN

SELECT * FROM pv_imagen, pv_producto group by pv_imagen.`id_imagen`;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
