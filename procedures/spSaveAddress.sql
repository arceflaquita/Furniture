DROP PROCEDURE IF EXISTS spSaveAddress;

DELIMITER $$

CREATE PROCEDURE spSaveAddress(
  IN _email varchar(255),
  IN _nombre_contacto varchar(255),
  IN _calle varchar(255),
  IN _numero_exterior varchar(50),
  IN _numero_interior varchar(50),
  IN _colonia  varchar(255),
  IN _entre_calles  varchar(512),
  IN _referencias  varchar(255),
  IN _codigo_postal   int,
  IN _telefono   bigint,
  IN _id_estado   int,
  IN _id_municipio   int
)

BEGIN

SET @_id_cliente = (SELECT pc.id_cliente
FROM pv_cliente pc
INNER JOIN pv_usuario pu
ON pc.id_cliente = pu.id_cliente
WHERE email = _email
);

UPDATE pv_cliente
SET nombre_contacto = _nombre_contacto,
calle = _calle,
numero_exterior = _numero_exterior,
numero_interior = _numero_interior,
colonia = _colonia,
entre_calles = _entre_calles,
referencias = _referencias,
codigo_postal = _codigo_postal,
telefono = _telefono,
id_estado = _id_estado,
id_municipio = _id_municipio
WHERE id_cliente = @_id_cliente;

END $$
DELIMITER ;
/* show create procedure spSaveAddress; */
