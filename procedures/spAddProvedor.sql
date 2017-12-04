DROP PROCEDURE IF EXISTS addProvedor;

DELIMITER $$

CREATE PROCEDURE addProvedor(
  _provedor varchar(45),
  _contacto varchar(45),
  _telefono varchar(10),
  _correo varchar(45),
  _calle varchar(45),
  _numExterior int,
  _numInterior int,
  _estado int,
  _municipio int,
  _colonia varchar(45),
  _codigoPostal int
)

BEGIN

INSERT INTO pv_provedor( provedor, contacto, telefono, correo, calle, no_exterior, no_interior, id_estado, id_municipio, id_colonia, id_cp)
VALUES (_provedor, _contacto, _telefono, _correo, _calle, _numExterior, _numInterior, _estado, _municipio, _colonia, _codigoPostal);

END $$
DELIMITER ;
