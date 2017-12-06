DROP PROCEDURE IF EXISTS spGetProductsByCategory;

DELIMITER $$

CREATE PROCEDURE spGetProductsByCategory(
  in _category int
)

BEGIN

select p.id_producto, producto, precio_venta, descripcion, imagen
from pv_producto p
inner join pv_imagen i on p.id_producto = i.id_producto
where id_categoria = _category;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
