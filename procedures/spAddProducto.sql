DROP PROCEDURE IF EXISTS addArticulo;

DELIMITER $$

CREATE PROCEDURE addArticulo(
  IN _producto varchar(255),
  IN _precio_compra float,
  IN _precio_venta float,
  IN _descripcion varchar(45),
  IN _id_categoria int,
  IN _id_provedor int
)

BEGIN



INSERT INTO `pv_producto`( `producto`, `precio_compra`, `precio_venta`, `descripcion`, `id_categoria`, `id_provedor`) 
VALUES (_producto,_precio_compra,_precio_venta,_descripcion,_id_categoria,_id_provedor);

select 'los datos se insertaron correctamente' as mensaje;

END $$
DELIMITER ;

