DROP PROCEDURE IF EXISTS addArticulo;

DELIMITER $$

CREATE PROCEDURE addArticulo(
  IN _producto varchar(255),
  IN _precio_compra float,
  IN _precio_venta float,
  IN _descripcion varchar(45),
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

