-- MySQL Script generated by MySQL Workbench
-- 10/11/17 15:19:01
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema furniture
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema furniture
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `furniture` DEFAULT CHARACTER SET utf8 ;
USE `furniture` ;

-- -----------------------------------------------------
-- Table `furniture`.`PV_CATEGORIA_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_CATEGORIA_USUARIO` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `furniture`.`PV_CLIENTE`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_CLIENTE` (
  `id_cliente` INT NOT NULL AUTO_INCREMENT,
  `nombre_cliente` VARCHAR(45) NULL,
  `ap_paterno_cliente` VARCHAR(45) NULL,
  `ap_materno_cliente` VARCHAR(45) NULL,
  `codigo_postal` INT NULL,
  `calle` VARCHAR(255) NULL,
  `numero_exterior` VARCHAR(50) NULL,
  `numero_interior` VARCHAR(50) NULL,
  `entre_calles` VARCHAR(512) NULL,
  `referencias` VARCHAR(255) NULL,
  `id_estado` INT NULL,
  `id_municipio` INT NULL,
  `colonia` VARCHAR(255) NULL,
  `nombre_contacto` VARCHAR(255) NULL,
  `telefono` BIGINT NULL,
  PRIMARY KEY (`id_cliente`),
  CONSTRAINT `fk_PV_CLIENTE_PV_ESTADO`
    FOREIGN KEY (`id_estado`)
    REFERENCES `furniture`.`PV_ESTADO` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_CLIENTE_PV_MUNICIPIO`
    FOREIGN KEY (`id_municipio`)
    REFERENCES `furniture`.`PV_MUNICIPIO` (`id_municipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_USUARIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_USUARIO` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nom_user` VARCHAR(45) NULL,
  `password` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `id_categoria` INT NOT NULL,
  `id_cliente` INT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_PV_USUARIO_PV_CATEGORIA_USUARIO_idx` (`id_categoria` ASC),
  CONSTRAINT `fk_PV_USUARIO_PV_CATEGORIA_USUARIO`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `furniture`.`PV_CATEGORIA_USUARIO` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_USUARIO_PV_CLIENTE`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `furniture`.`PV_CLIENTE` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_PROCESO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_PROCESO` (
  `id_proceso` INT NOT NULL AUTO_INCREMENT,
  `proceso` VARCHAR(45) NULL,
  PRIMARY KEY (`id_proceso`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_VENTA` (
  `folio` INT NOT NULL AUTO_INCREMENT,
  `feha` DATE NULL,
  `monto` FLOAT NULL,
  `id_cliente` INT NOT NULL,
  `id_proceso` INT NOT NULL,
  PRIMARY KEY (`folio`),
  INDEX `fk_PV_VENTA_PV_CLIENTE1_idx` (`id_cliente` ASC),
  INDEX `fk_PV_VENTA_PV_PROCESO1_idx` (`id_proceso` ASC),
  CONSTRAINT `fk_PV_VENTA_PV_CLIENTE1`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `furniture`.`PV_CLIENTE` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_VENTA_PV_PROCESO1`
    FOREIGN KEY (`id_proceso`)
    REFERENCES `furniture`.`PV_PROCESO` (`id_proceso`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_CATEGORIA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_CATEGORIA` (
  `id_categoria` INT NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(45) NULL,
  PRIMARY KEY (`id_categoria`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_ESTADO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_ESTADO` (
  `id_estado` INT NOT NULL AUTO_INCREMENT,
  `estado` VARCHAR(45) NULL,
  PRIMARY KEY (`id_estado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_MUNICIPIO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_MUNICIPIO` (
  `id_municipio` INT NOT NULL AUTO_INCREMENT,
  `municipio` VARCHAR(45) NULL,
  `id_estado` INT NOT NULL,
  PRIMARY KEY (`id_municipio`),
  INDEX `fk_PV_MUNICIPIO_PV_ESTADO1_idx` (`id_estado` ASC),
  CONSTRAINT `fk_PV_MUNICIPIO_PV_ESTADO1`
    FOREIGN KEY (`id_estado`)
    REFERENCES `furniture`.`PV_ESTADO` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_PROVEDOR`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_PROVEDOR` (
  `id_provedor` INT NOT NULL AUTO_INCREMENT,
  `provedor` VARCHAR(45) NULL,
  `contacto` VARCHAR(45) NULL,
  `telefono` VARCHAR(10) NULL,
  `correo` VARCHAR(45) NULL,
  `calle` VARCHAR(45) NULL,
  `no_exterior` INT NULL,
  `no_interior` INT NULL,
  `id_estado` INT NOT NULL,
  `id_municipio` INT NOT NULL,
  `id_colonia` VARCHAR(45) NULL,
  `id_cp` INT NOT NULL,
  PRIMARY KEY (`id_provedor`),
  INDEX `fk_PV_PROVEDOR_PV_ESTADO1_idx` (`id_estado` ASC),
  INDEX `fk_PV_PROVEDOR_PV_MUNICIPIO1_idx` (`id_municipio` ASC),
  CONSTRAINT `fk_PV_PROVEDOR_PV_ESTADO1`
    FOREIGN KEY (`id_estado`)
    REFERENCES `furniture`.`PV_ESTADO` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_PROVEDOR_PV_MUNICIPIO1`
    FOREIGN KEY (`id_municipio`)
    REFERENCES `furniture`.`PV_MUNICIPIO` (`id_municipio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_PRODUCTO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_PRODUCTO` (
  `id_producto` INT NOT NULL AUTO_INCREMENT,
  `producto` VARCHAR(45) NULL,
  `precio_compra` FLOAT NULL,
  `precio_venta` FLOAT NULL,
  `descripcion` VARCHAR(255) NULL,
  `id_categoria` INT NOT NULL,
  `id_provedor` INT NOT NULL,
  PRIMARY KEY (`id_producto`),
  INDEX `fk_PV_PRODUCTO_PV_CATEGORIA1_idx` (`id_categoria` ASC),
  INDEX `fk_PV_PRODUCTO_PV_PROVEDOR1_idx` (`id_provedor` ASC),
  CONSTRAINT `fk_PV_PRODUCTO_PV_CATEGORIA1`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `furniture`.`PV_CATEGORIA` (`id_categoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_PRODUCTO_PV_PROVEDOR1`
    FOREIGN KEY (`id_provedor`)
    REFERENCES `furniture`.`PV_PROVEDOR` (`id_provedor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_DETALLE_VENTA`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_DETALLE_VENTA` (
  `id_detalle` INT NOT NULL AUTO_INCREMENT,
  `fecha` DATE NULL,
  `precio_venta` FLOAT NULL,
  `cantidad` INT NULL,
  `folio` INT NOT NULL,
  `id_producto` INT NOT NULL,
  PRIMARY KEY (`id_detalle`),
  INDEX `fk_PV_DETALLE_VENTA_PV_VENTA1_idx` (`folio` ASC),
  INDEX `fk_PV_DETALLE_VENTA_PV_PRODUCTO1_idx` (`id_producto` ASC),
  CONSTRAINT `fk_PV_DETALLE_VENTA_PV_VENTA1`
    FOREIGN KEY (`folio`)
    REFERENCES `furniture`.`PV_VENTA` (`folio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_DETALLE_VENTA_PV_PRODUCTO1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `furniture`.`PV_PRODUCTO` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `furniture`.`PV_IMAGEN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_IMAGEN` (
  `id_imagen` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(300) NULL,
  `id_producto` INT NOT NULL,
  PRIMARY KEY (`id_imagen`),
  INDEX `fk_PV_IMAGEN_PV_PRODUCTO1_idx` (`id_producto` ASC),
  CONSTRAINT `fk_PV_IMAGEN_PV_PRODUCTO1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `furniture`.`PV_PRODUCTO` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `furniture`.`PV_IMAGEN`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `furniture`.`PV_CARRUSEL` (
  `id_imagen` INT NOT NULL AUTO_INCREMENT,
  `imagen` VARCHAR(512) NOT NULL,
  `id_producto` INT NOT NULL,
  PRIMARY KEY (`id_imagen`),
  CONSTRAINT `fk_PV_CARRUSEL_PV_PRODUCTO1`
    FOREIGN KEY (`id_producto`)
    REFERENCES `furniture`.`PV_PRODUCTO` (`id_producto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Datos
-- -----------------------------------------------------
insert into pv_categoria_usuario (categoria) values ('administrador');
insert into pv_categoria_usuario (categoria) values ('cliente');
insert into pv_categoria_usuario (categoria) values ('secretaria');
insert into pv_usuario (nom_user,password,id_categoria, email) values ('admin','maNFFVN3iSshg',1, 'admin@furniture.com'); --admin23
insert into pv_usuario (nom_user,password,id_categoria, email) values ('alondra','mav6vjSDWNY7o',3, 'alondra@gmail.com');  --1234


--PV_PROCESO
insert into pv_proceso(proceso) values ('venta');

  --PV_CATEGORIA
  -- -----------------------------------------------------

  insert into PV_CATEGORIA values(null, "Dormitorio");
  insert into PV_CATEGORIA values(null, "Sala");
  insert into PV_CATEGORIA values(null, "Comedor");
  insert into PV_CATEGORIA values(null, "Cocina");
  insert into PV_CATEGORIA values(null, "Pieles");

  --PV_ESTADO`
  -- -----------------------------------------------------
  insert into PV_ESTADO values(null, "AGUAS CALIENTES");
  insert into PV_ESTADO values(null, "BAJA CALIFORNIA");
  insert into PV_ESTADO values(null, "BAJA CALIFORNIA SUR");
  insert into PV_ESTADO values(null, "CAMPECHE");
  insert into PV_ESTADO values(null, "CHIAPAS");
  insert into PV_ESTADO values(null, "CHIHUAHUA");
  insert into PV_ESTADO values(null, "COAHUILA");
  insert into PV_ESTADO values(null, "CIUDAD DE MEXICO");
  insert into PV_ESTADO values(null, "COLIMA");
  insert into PV_ESTADO values(null, "DURANGO");
  insert into PV_ESTADO values(null, "GUANAJUATO");
  insert into PV_ESTADO values(null, "GUERRERO");
  insert into PV_ESTADO values(null, "HIDALGO");
  insert into PV_ESTADO values(null, "JALISCO");
  insert into PV_ESTADO values(null, "MEXICO");
  insert into PV_ESTADO values(null, "MICHOACAN");
  insert into PV_ESTADO values(null, "MORELOS");
  insert into PV_ESTADO values(null, "NAYARIT");
  insert into PV_ESTADO values(null, "NUEVO LEON");
  insert into PV_ESTADO values(null, "OAXACA");
  insert into PV_ESTADO values(null, "PUEBLA");
  insert into PV_ESTADO values(null, "QUERETARO");
  insert into PV_ESTADO values(null, "QUINTANA ROO");
  insert into PV_ESTADO values(null, "SAN LUIS POTOSI");
  insert into PV_ESTADO values(null, "SINALOA");
  insert into PV_ESTADO values(null, "SONORA");
  insert into PV_ESTADO values(null, "TABASCO");
  insert into PV_ESTADO values(null, "TAMAULIPAS");
  insert into PV_ESTADO values(null, "TLAXCALA");
  insert into PV_ESTADO values(null, "VERACRUZ");
  insert into PV_ESTADO values(null, "YUCATAN");
  insert into PV_ESTADO values(null, "ZACATECAS");

  -- Table `mydb`.`PV_MUNICIPIO`
  -- -----------------------------------------------------
  insert into PV_MUNICIPIO values(null, "ACAMBAY",1);
  insert into PV_MUNICIPIO values(null, "ACOLMAN",2);
  insert into PV_MUNICIPIO values(null, "ACULCO",3);
  insert into PV_MUNICIPIO values(null, "ALMOLOYA DE ALQUISIRAS",4);
  insert into PV_MUNICIPIO values(null, "ALMOLOYA DE JAUREZ",5);
  insert into PV_MUNICIPIO values(null, "ALMOLOYA DEL RIO",20);
  insert into PV_MUNICIPIO values(null, "AMANALCO",3);
  insert into PV_MUNICIPIO values(null, "AMETEPEC",4);
  insert into PV_MUNICIPIO values(null, "AMECAMECA",12);
  insert into PV_MUNICIPIO values(null, "APAXCO",10);
  insert into PV_MUNICIPIO values(null, "ATENCO",13);
  insert into PV_MUNICIPIO values(null, "ATIZAPAN",2);
  insert into PV_MUNICIPIO values(null, "ATIZAPAN DE ZARAGOZA",4);
  insert into PV_MUNICIPIO values(null, "ATLACOMULCO",9);
  insert into PV_MUNICIPIO values(null, "ATLAUTLA",8);
  insert into PV_MUNICIPIO values(null, "AXAPUSCO",7);
  insert into PV_MUNICIPIO values(null, "AYAPANGO",5);
  insert into PV_MUNICIPIO values(null, "CALIMAYA",8);
  insert into PV_MUNICIPIO values(null, "CAPULHUAC",20);
  insert into PV_MUNICIPIO values(null, "COACALCO DE BERRIOZABAL",26);
  insert into PV_MUNICIPIO values(null, "COATEPEC HARINAS",16);
  insert into PV_MUNICIPIO values(null, "COCOTITLAN",13);
  insert into PV_MUNICIPIO values(null, "COYOTEPEC",10);
  insert into PV_MUNICIPIO values(null, "CUAUTITLAN",9);
  insert into PV_MUNICIPIO values(null, "CHALCO",2);
  insert into PV_MUNICIPIO values(null, "CHAPA DE MOTA",8);
  insert into PV_MUNICIPIO values(null, "CHAPULTEPEC",4);
  insert into PV_MUNICIPIO values(null, "CHIAUTLA",11);
  insert into PV_MUNICIPIO values(null, "CHICOLOAPAN",21);
  insert into PV_MUNICIPIO values(null, "CHINCONCUAC",13);
  insert into PV_MUNICIPIO values(null, "CHIMALHUACAN",23);
  insert into PV_MUNICIPIO values(null, "DONATO GUERRA",30);
  insert into PV_MUNICIPIO values(null, "ECATEPEC DE MORELOS",31);
  insert into PV_MUNICIPIO values(null, "ECATZINGO",1);
  insert into PV_MUNICIPIO values(null, "HUEHUETOCA",3);
  insert into PV_MUNICIPIO values(null, "HUEYPOXTLA",7);
  insert into PV_MUNICIPIO values(null, "HUIXQUILUCAN",2);
  insert into PV_MUNICIPIO values(null, "ISIDRO FABELA",4);
  insert into PV_MUNICIPIO values(null, "IXTAPALUCA",13);
  insert into PV_MUNICIPIO values(null, "IXTAPAN DE LA SAL",16);
  insert into PV_MUNICIPIO values(null, "IXTAPAN DE ORO",18);
  insert into PV_MUNICIPIO values(null, "IXTLAHUACA",20);
  insert into PV_MUNICIPIO values(null, "XALATLACO",12);
  insert into PV_MUNICIPIO values(null, "JALTENCO",15);
  insert into PV_MUNICIPIO values(null, "JILOTEPEC",18);
  insert into PV_MUNICIPIO values(null, "JILOTZINGO",10);
  insert into PV_MUNICIPIO values(null, "JIQUIPILCO",9);
  insert into PV_MUNICIPIO values(null, "JOCOTITLAN",8);
  insert into PV_MUNICIPIO values(null, "JOQUINCINGO",5);
  insert into PV_MUNICIPIO values(null, "JUCHITEPEC",4);
  insert into PV_MUNICIPIO values(null, "LERMA",25);
  insert into PV_MUNICIPIO values(null, "MALINALCO",29);
  insert into PV_MUNICIPIO values(null, "METEPEC",8);
  insert into PV_MUNICIPIO values(null, "MORELOS",6);
  insert into PV_MUNICIPIO values(null, "NAUCALPAN DE JUAREZ",5);
  insert into PV_MUNICIPIO values(null, "NEZAHUALCOYOTL",1);
  insert into PV_MUNICIPIO values(null, "NEXTLALPAN",1);
  insert into PV_MUNICIPIO values(null, "NOPALTEPEC",1);
  insert into PV_MUNICIPIO values(null, "OCOYOACAC",4);
  insert into PV_MUNICIPIO values(null, "OTUMBA",5);
  insert into PV_MUNICIPIO values(null, "OZUMBA",11);
  insert into PV_MUNICIPIO values(null, "SAN MARTIN ",12);
  insert into PV_MUNICIPIO values(null, "SAN SIMON",28);
  insert into PV_MUNICIPIO values(null, "SANTO TOMAS",27);
  insert into PV_MUNICIPIO values(null, "SAN MATEO ATENCO", 25);
  insert into PV_MUNICIPIO values(null, "TECAMAC",24);
  insert into PV_MUNICIPIO values(null, "TEOTIHUACAN",23);
  insert into PV_MUNICIPIO values(null, "TEXCOCO",22);
  insert into PV_MUNICIPIO values(null, "TEZOYUCA",21);
  insert into PV_MUNICIPIO values(null, "TOLUCA",20);
  insert into PV_MUNICIPIO values(null, "ZUMPANGO",19);
  insert into PV_MUNICIPIO values(null, "TONANITLA",8);
