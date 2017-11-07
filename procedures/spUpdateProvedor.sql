DROP PROCEDURE IF EXISTS updateProvedor;

DELIMITER $$

CREATE PROCEDURE updateProvedor(
  IN _provedor varchar(255),
  IN _contacto varchar(45),
  IN _telefono varchar(45),
  IN _correo varchar(45),
  IN _calle varchar(45),
  IN _no_exterior int,
  IN _no_interior int,
  IN _id_estado int,
  IN _id_municipio int,
  IN _id_colonia int,
  IN _id_cp int,
  In _id_provedor int
)

BEGIN

UPDATE `pv_provedor` SET
 `provedor`=_provedor,`contacto`=_contacto,`telefono`=_telefono,`correo`=_correo,`calle`=_calle,`no_exterior`=_no_exterior,`no_interior`=_no_interior,
 `id_estado`=_id_estado,`id_municipio`=_id_municipio,`id_colonia`=_id_colonia,`id_cp`=_id_cp WHERE `id_provedor`=_id_provedor;


END $$
DELIMITER ;

