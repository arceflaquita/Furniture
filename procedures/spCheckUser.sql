DROP PROCEDURE IF EXISTS spCheckUser;

DELIMITER $$

CREATE PROCEDURE spCheckUser(
  IN _email varchar(255),
  IN _password varchar(255)
)

BEGIN

SELECT id_categoria, email, nom_user
FROM pv_usuario
WHERE email = _email
AND password = _password;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
