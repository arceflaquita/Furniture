DROP PROCEDURE IF EXISTS spAddCarrusel;

DELIMITER $$

CREATE PROCEDURE spAddCarrusel(
in _imagen varchar(512),
in _id_producto int
)

BEGIN

insert into pv_carrusel
(imagen, id_producto)
values
(_imagen, _id_producto);

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
DROP PROCEDURE IF EXISTS addDestalleVenta;

DELIMITER $$

CREATE PROCEDURE addDestalleVenta(
  IN _precio_venta float,
  IN _cantidad int,
  IN _id_producto int
)

BEGIN

 Select @folio := max(folio) from pv_venta ;

INSERT INTO `pv_detalle_venta`( `fecha`, `precio_venta`, `cantidad`, `folio`, `id_producto`)
VALUES (curdate(),_precio_venta,_cantidad,@folio,_id_producto);

END $$
DELIMITER ;
DROP PROCEDURE IF EXISTS addArticulo;

DELIMITER $$

CREATE PROCEDURE addArticulo(
  IN _producto varchar(255),
  IN _precio_compra float,
  IN _precio_venta float,
  IN _descripcion varchar(255),
  IN _id_categoria int,
  IN _id_provedor int,
  IN _imagen varchar(255)
)

BEGIN

INSERT INTO `pv_producto`( `producto`, `precio_compra`, `precio_venta`, `descripcion`, `id_categoria`, `id_provedor`)
VALUES (_producto,_precio_compra,_precio_venta,_descripcion,_id_categoria,_id_provedor);

 Select @idPro := max(id_producto) from pv_producto ;

INSERT INTO `pv_imagen`( `imagen`, `id_producto`) VALUES (_imagen,@idPro);
END $$
DELIMITER ;
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
DROP PROCEDURE IF EXISTS addVentaArticulo;

DELIMITER $$

CREATE PROCEDURE addVentaArticulo(
  IN _monto float,
  IN _id_cliente int
)

BEGIN

INSERT INTO `pv_venta`(`feha`, `monto`, `id_cliente`, `id_proceso`) VALUES (curdate(),_monto,_id_cliente,1);

END $$
DELIMITER ;
DROP PROCEDURE IF EXISTS spCheckUser;

DELIMITER $$

CREATE PROCEDURE spCheckUser(
  IN _email varchar(255),
  IN _password varchar(255)
)

BEGIN

SELECT id_categoria, email, nom_user,id_cliente
FROM pv_usuario
WHERE email = _email
AND password = _password;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
DROP PROCEDURE IF EXISTS spDelCarrusel;

DELIMITER $$

CREATE PROCEDURE spDelCarrusel(
  IN _id_imagen int
)

BEGIN

DELETE FROM `pv_carrusel` WHERE `id_imagen`= _id_imagen;

END $$
DELIMITER ;
DROP PROCEDURE IF EXISTS deleteProducto;

DELIMITER $$

CREATE PROCEDURE deleteProducto(
  IN _id_producto int
)

BEGIN

DELETE FROM `pv_imagen` WHERE `id_producto`=_id_producto;
DELETE FROM `pv_producto` WHERE `id_producto`=_id_producto;

END $$
DELIMITER ;
DROP PROCEDURE IF EXISTS spGetCarrusel;

DELIMITER $$

CREATE PROCEDURE spGetCarrusel()

BEGIN

select id_imagen, imagen, producto
from pv_carrusel c
inner join pv_producto p
on p.id_producto = c.id_producto;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
DROP PROCEDURE IF EXISTS spGetProductsByCategory;

DELIMITER $$

CREATE PROCEDURE spGetProductsByCategory(
  in _category int
)

BEGIN

select p.id_producto, producto, precio_venta, descripcion, imagen
from pv_producto p
inner join pv_imagen i on p.id_producto = i.id_producto
where id_categoria = _category;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
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
DROP PROCEDURE IF EXISTS spQueryAddress;

DELIMITER $$

CREATE PROCEDURE spQueryAddress(
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

/* show create procedure spQueryAddress; */
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
DROP PROCEDURE IF EXISTS searchProductos;

DELIMITER $$

CREATE PROCEDURE searchProductos()

BEGIN

select p.id_producto, producto, precio_venta, descripcion, imagen
from pv_producto p
inner join pv_imagen i on p.id_producto = i.id_producto;

END $$
DELIMITER ;
/* show create procedure spCheckUser; */
DROP PROCEDURE IF EXISTS spUpdCarrusel;

DELIMITER $$

CREATE PROCEDURE spUpdCarrusel(
  in _id_imagen int,
  in _imagen varchar(512),
  in _id_producto int
)

BEGIN

update pv_carrusel
set imagen = _imagen,
id_producto = _id_producto
where id_imagen = _id_imagen;

END $$
DELIMITER ;
/* show create procedure spUpdCarrusel; */
DROP PROCEDURE IF EXISTS updateProducto;

DELIMITER $$

CREATE PROCEDURE updateProducto(
  IN _producto varchar(255),
  IN _precio_compra float,
  IN _precio_venta float,
  IN _descripcion varchar(255),
  IN _id_categoria int,
  IN _id_provedor int,
  IN _id_producto int,
  IN _imagen varchar(255)
)

BEGIN

UPDATE `pv_imagen` SET `imagen`=_imagen WHERE `id_producto`=_id_producto;

UPDATE `pv_producto` SET
 `producto`=_producto,`precio_compra`=_precio_compra,`precio_venta`=_precio_venta,
 `descripcion`=_descripcion,`id_categoria`=_id_categoria,`id_provedor`=_id_provedor WHERE `id_producto`=_id_producto;


END $$
DELIMITER ;
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
DROP PROCEDURE IF EXISTS searProducto;

DELIMITER $$

CREATE PROCEDURE searProducto(
  IN _id_producto int
)

BEGIN

SELECT * FROM `pv_producto` WHERE `id_producto`=_id_producto;

END $$
DELIMITER ;
DROP PROCEDURE IF EXISTS searProducto;

DELIMITER $$

CREATE PROCEDURE searProducto(
  IN _id_producto int
)

BEGIN

SELECT * FROM pv_imagen, pv_producto WHERE pv_producto.`id_producto`=_id_producto;

END $$
DELIMITER ;
