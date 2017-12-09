DROP PROCEDURE IF EXISTS spGetCarrusel;

DELIMITER $$

CREATE PROCEDURE spGetCarrusel()

BEGIN

select id_imagen, imagen, producto
from pv_carrusel c
inner join pv_producto p
on p.id_producto = c.id_producto;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
