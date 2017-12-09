DROP PROCEDURE IF EXISTS spDelCarrusel;

DELIMITER $$

CREATE PROCEDURE spDelCarrusel(
  IN _id_imagen int
)

BEGIN

DELETE FROM `pv_carrusel` WHERE `id_imagen`= _id_imagen;

END $$
DELIMITER ;
