DROP PROCEDURE IF EXISTS searchProductos;

DELIMITER $$

CREATE PROCEDURE searchProductos()

BEGIN

select p.id_producto, producto, precio_venta, descripcion, imagen
from pv_producto p
inner join pv_imagen i on p.id_producto = i.id_producto;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
