DROP PROCEDURE IF EXISTS spQueryCustomers;

DELIMITER $$

CREATE PROCEDURE spQueryCustomers()

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
ON pc.id_cliente = pu.id_cliente;

END $$
DELIMITER ;

/* show create procedure spQueryCustomers; */
