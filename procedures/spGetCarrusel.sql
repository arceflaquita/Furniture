DROP PROCEDURE IF EXISTS spGetCarrusel;

DELIMITER $$

CREATE PROCEDURE spGetCarrusel()

BEGIN

select id_imagen, imagen, descripcion, URL
from pv_carrusel;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
