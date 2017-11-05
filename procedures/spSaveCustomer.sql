DROP PROCEDURE IF EXISTS spSaveCustomer;

DELIMITER $$

CREATE PROCEDURE spSaveCustomer(
  IN _email varchar(255),
  IN _nombre_contacto varchar(45),
  IN _ap_paterno_cliente varchar(45),
  IN _ap_materno_cliente varchar(45),
  IN _new_email varchar(255),
  IN _actualPass  varchar(255),
  IN _newPass  varchar(255)
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
ap_paterno_cliente = _ap_paterno_cliente,
ap_materno_cliente = _ap_materno_cliente
WHERE id_cliente = @_id_cliente;

IF _actualPass = '' THEN
  /* si no va a cambiar password solo cambia los datos del cliente, nombre de usuario y correo */
  UPDATE pv_usuario
  SET nom_user  = _nombre_contacto,
  email = _new_email
  WHERE id_cliente = @_id_cliente;

  SELECT '' AS sql_error;

ELSE
  /* si envia password valida password actual */
  SET @oldPass = (SELECT password
  FROM pv_usuario
  WHERE email = _email
  );

  IF(@oldPass != _actualPass) THEN
    SELECT 'Password actual incorrecto' AS sql_error;
  ELSE

    UPDATE pv_usuario
    SET nom_user  = _nombre_contacto,
    email = _new_email,
    password = _newPass
    WHERE id_cliente = @_id_cliente;

    SELECT '' AS sql_error;
  END IF;

END IF;

END $$
DELIMITER ;
/* show create procedure spSaveCustomer; */
