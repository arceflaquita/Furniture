DROP PROCEDURE IF EXISTS spQueryProfileCustomer;

DELIMITER $$

CREATE PROCEDURE spQueryProfileCustomer(
  IN _email varchar(255)
)

BEGIN

SELECT nombre_cliente,
  ap_paterno_cliente,
  ap_materno_cliente,
  email,
  calle,
  numero_exterior,
  numero_interior,
  colonia,
  entre_calles,
  referencias,
  codigo_postal,
  nombre_contacto,
  telefono
FROM pv_cliente pc
INNER JOIN pv_usuario pu
ON pc.id_cliente = pu.id_cliente
WHERE email = _email;

END $$
DELIMITER ;
/* show create procedure spQueryProfileCustomer; */
