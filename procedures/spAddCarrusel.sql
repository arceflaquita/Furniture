DROP PROCEDURE IF EXISTS spAddCarrusel;

DELIMITER $$

CREATE PROCEDURE spAddCarrusel(
in _imagen varchar(512),
in _descripcion varchar(512),
in _URL varchar(512)
)

BEGIN

insert into pv_carrusel
(imagen, descripcion, URL)
values
(_imagen, _descripcion, _URL);

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
