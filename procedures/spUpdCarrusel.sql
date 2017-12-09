DROP PROCEDURE IF EXISTS spUpdCarrusel;

DELIMITER $$

CREATE PROCEDURE spUpdCarrusel(
  in _id_imagen int,
  in _imagen varchar(512),
  in _id_producto int
)

BEGIN

update pv_carrusel
set imagen = _imagen,
id_producto = _id_producto
where id_imagen = _id_imagen;

END $$
DELIMITER ;
/* show create procedure spUpdCarrusel; */
