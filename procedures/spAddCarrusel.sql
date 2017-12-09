DROP PROCEDURE IF EXISTS spAddCarrusel;

DELIMITER $$

CREATE PROCEDURE spAddCarrusel(
in _imagen varchar(512),
in _id_producto int
)

BEGIN

insert into pv_carrusel
(imagen, id_producto)
values
(_imagen, _id_producto);

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
