DROP PROCEDURE IF EXISTS addProvedor;

DELIMITER $$

CREATE PROCEDURE addProvedor(
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
  IN _id_cp int
)

BEGIN

INSERT INTO `pv_provedor`( `provedor`, `contacto`, `telefono`, `correo`, `calle`, `no_exterior`, `no_interior`, `id_estado`, `id_municipio`, `id_colonia`, `id_cp`) VALUES
 (_provedor,_contacto,_telefono,_correo,_calle,_no_exterior,_no_interior,_id_estado,_id_municipio,_id_colonia,_id_cp);

END $$
DELIMITER ;
