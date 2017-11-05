DROP PROCEDURE IF EXISTS spInsCustomer;

DELIMITER $$

CREATE PROCEDURE spInsCustomer(
  IN _email varchar(255),
  IN _password varchar(255),
  IN _nombre_cliente varchar(45),
  IN _ap_paterno_cliente varchar(45),
  OUT _id_cliente int
)

BEGIN

/* si no existe inserta el cliente y usuario */
IF NOT EXISTS (SELECT id_categoria FROM pv_usuario WHERE email = _email)
THEN

INSERT INTO pv_cliente
(nombre_cliente, ap_paterno_cliente)
VALUES (_nombre_cliente, _ap_paterno_cliente);

select last_insert_id() into _id_cliente;

INSERT INTO pv_usuario
(nom_user, password, email, id_cliente, id_categoria)
VALUES (_nombre_cliente, _password, _email, _id_cliente, 2);

ELSE
/* si existe manda -1 como error */
select -1 into _id_cliente;

END IF;

END $$
DELIMITER ;
/* show create procedure spInsCustomer; */
