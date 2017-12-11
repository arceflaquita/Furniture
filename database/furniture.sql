-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: furniture
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `pv_carrusel`
--

DROP TABLE IF EXISTS `pv_carrusel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_carrusel` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(512) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `fk_PV_CARRUSEL_PV_PRODUCTO1` (`id_producto`),
  CONSTRAINT `fk_PV_CARRUSEL_PV_PRODUCTO1` FOREIGN KEY (`id_producto`) REFERENCES `pv_producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_carrusel`
--

LOCK TABLES `pv_carrusel` WRITE;
/*!40000 ALTER TABLE `pv_carrusel` DISABLE KEYS */;
INSERT INTO `pv_carrusel` VALUES (1,'d1b706_maxresdefault.jpg',4),(2,'c4e44c_images_comedor.jpg',6),(4,'26349c_tempo-design-panama-ofertas-de-navidad-en-muebles-sala-comedor-recamaras.jpg',1);
/*!40000 ALTER TABLE `pv_carrusel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_categoria`
--

DROP TABLE IF EXISTS `pv_categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_categoria`
--

LOCK TABLES `pv_categoria` WRITE;
/*!40000 ALTER TABLE `pv_categoria` DISABLE KEYS */;
INSERT INTO `pv_categoria` VALUES (1,'Dormitorio'),(2,'Sala'),(3,'Comedor'),(4,'Cocina'),(5,'Pieles');
/*!40000 ALTER TABLE `pv_categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_categoria_usuario`
--

DROP TABLE IF EXISTS `pv_categoria_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_categoria_usuario` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_categoria_usuario`
--

LOCK TABLES `pv_categoria_usuario` WRITE;
/*!40000 ALTER TABLE `pv_categoria_usuario` DISABLE KEYS */;
INSERT INTO `pv_categoria_usuario` VALUES (1,'administrador'),(2,'cliente'),(3,'secretaria');
/*!40000 ALTER TABLE `pv_categoria_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_cliente`
--

DROP TABLE IF EXISTS `pv_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(45) DEFAULT NULL,
  `ap_paterno_cliente` varchar(45) DEFAULT NULL,
  `ap_materno_cliente` varchar(45) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numero_exterior` varchar(50) DEFAULT NULL,
  `numero_interior` varchar(50) DEFAULT NULL,
  `entre_calles` varchar(512) DEFAULT NULL,
  `referencias` varchar(255) DEFAULT NULL,
  `id_estado` int(11) DEFAULT NULL,
  `id_municipio` int(11) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `nombre_contacto` varchar(255) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_PV_CLIENTE_PV_ESTADO` (`id_estado`),
  KEY `fk_PV_CLIENTE_PV_MUNICIPIO` (`id_municipio`),
  CONSTRAINT `fk_PV_CLIENTE_PV_ESTADO` FOREIGN KEY (`id_estado`) REFERENCES `pv_estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_CLIENTE_PV_MUNICIPIO` FOREIGN KEY (`id_municipio`) REFERENCES `pv_municipio` (`id_municipio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_cliente`
--

LOCK TABLES `pv_cliente` WRITE;
/*!40000 ALTER TABLE `pv_cliente` DISABLE KEYS */;
INSERT INTO `pv_cliente` VALUES (1,'Laura','Flores',NULL,55600,'11 cda seul','19','12','siempreviva','buenavista',26,8,'buenavista','Laura Flores',5512345678),(2,'manchitas','arce',NULL,55600,'jacarandas','101','12','9 cda y 11 cda','waltmart',15,12,'siempreviva','lupita arce',5552125412),(3,'guadalupe','arce',NULL,55600,'11 cda seul','c002','s/n','9 cda y lago ness','tiendita don migue',8,70,'Paseos del lago 2','Guadalupe Arce',5512345678);
/*!40000 ALTER TABLE `pv_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_detalle_venta`
--

DROP TABLE IF EXISTS `pv_detalle_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_detalle_venta` (
  `id_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `folio` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_detalle`),
  KEY `fk_PV_DETALLE_VENTA_PV_VENTA1_idx` (`folio`),
  KEY `fk_PV_DETALLE_VENTA_PV_PRODUCTO1_idx` (`id_producto`),
  CONSTRAINT `fk_PV_DETALLE_VENTA_PV_PRODUCTO1` FOREIGN KEY (`id_producto`) REFERENCES `pv_producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_DETALLE_VENTA_PV_VENTA1` FOREIGN KEY (`folio`) REFERENCES `pv_venta` (`folio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_detalle_venta`
--

LOCK TABLES `pv_detalle_venta` WRITE;
/*!40000 ALTER TABLE `pv_detalle_venta` DISABLE KEYS */;
INSERT INTO `pv_detalle_venta` VALUES (1,'2017-12-03',14440,1,2,2),(2,'2017-12-03',18500,1,3,5),(3,'2017-12-04',26500,1,4,1),(4,'2017-12-04',37500,1,5,4),(5,'2017-12-04',37500,1,6,4),(6,'2017-12-04',37500,1,7,4),(7,'2017-12-04',37500,1,8,4),(8,'2017-12-04',37500,1,9,4),(9,'2017-12-04',18500,1,10,5),(10,'2017-12-04',18500,1,11,5),(11,'2017-12-04',18500,1,12,5),(12,'2017-12-04',12000,1,13,6),(13,'2017-12-10',18500,1,14,5),(14,'2017-12-10',18500,1,15,5),(15,'2017-12-10',18500,1,16,5),(16,'2017-12-10',18500,1,17,5),(17,'2017-12-10',26500,1,20,1),(18,'2017-12-10',26500,1,20,1),(19,'2017-12-10',26500,1,23,1),(20,'2017-12-10',14440,1,23,2),(21,'2017-12-10',58900,1,23,3);
/*!40000 ALTER TABLE `pv_detalle_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_estado`
--

DROP TABLE IF EXISTS `pv_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_estado`
--

LOCK TABLES `pv_estado` WRITE;
/*!40000 ALTER TABLE `pv_estado` DISABLE KEYS */;
INSERT INTO `pv_estado` VALUES (1,'AGUAS CALIENTES'),(2,'BAJA CALIFORNIA'),(3,'BAJA CALIFORNIA SUR'),(4,'CAMPECHE'),(5,'CHIAPAS'),(6,'CHIHUAHUA'),(7,'COAHUILA'),(8,'CIUDAD DE MEXICO'),(9,'COLIMA'),(10,'DURANGO'),(11,'GUANAJUATO'),(12,'GUERRERO'),(13,'HIDALGO'),(14,'JALISCO'),(15,'MEXICO'),(16,'MICHOACAN'),(17,'MORELOS'),(18,'NAYARIT'),(19,'NUEVO LEON'),(20,'OAXACA'),(21,'PUEBLA'),(22,'QUERETARO'),(23,'QUINTANA ROO'),(24,'SAN LUIS POTOSI'),(25,'SINALOA'),(26,'SONORA'),(27,'TABASCO'),(28,'TAMAULIPAS'),(29,'TLAXCALA'),(30,'VERACRUZ'),(31,'YUCATAN'),(32,'ZACATECAS');
/*!40000 ALTER TABLE `pv_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_imagen`
--

DROP TABLE IF EXISTS `pv_imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_imagen` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(300) DEFAULT NULL,
  `id_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_imagen`),
  KEY `fk_PV_IMAGEN_PV_PRODUCTO1_idx` (`id_producto`),
  CONSTRAINT `fk_PV_IMAGEN_PV_PRODUCTO1` FOREIGN KEY (`id_producto`) REFERENCES `pv_producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_imagen`
--

LOCK TABLES `pv_imagen` WRITE;
/*!40000 ALTER TABLE `pv_imagen` DISABLE KEYS */;
INSERT INTO `pv_imagen` VALUES (1,'0839e6_savoir.jpg',1),(2,'515b3e_gales_gris_sala_modular_3_.jpg',2),(3,'e8d9e9_magnus-gris-pielmatch-salareclinable_1_5__1.jpg',3),(4,'fdf3b4_stephy_arena_2409_sala_44.jpg',4),(5,'8a7d5f_beirut_wengue_comedor_cuadrada_1.jpg',5),(6,'876be0_simply_ii_chocolate_comedor_7_pzas_editada.jpg',6),(8,'c5358e_Ã­ndice.jpg',8),(9,'8003cc_756 Dormitorio en roble-570x340.jpg',9),(10,'8688d6_016-6.jpg',10),(11,'91b4e7_007-21.jpg',11),(12,'5a545f_dormitorios-modernos_9.jpg',12),(13,'808919_bes-5.jpg',13),(14,'0e2bca_Ã­ndice.jpg',14),(15,'cc434c_J-3210046_ORION_CHOCO_3-2_1400x.jpg',15),(16,'7b7cd6_Ivory-Sectional-Living-Room-6pieces-set-Sofa-Set-Modern-Design-Imported-Genuine-Leather-Foshan-China.jpg_640x640.jpg',16),(17,'46b335_sal.jpg',17),(18,'f3c847_da3bcb69d4f80d3f2d02d5813be8d37d--charcoal.jpg',18),(19,'5df384_fotos-de-salas4.jpg',19),(20,'897b88_kendra-ambientada.jpg',20),(21,'5f205c_tre.jpg',21),(22,'80427e_uu.jpg',22),(23,'960ca0_yy.jpg',23),(24,'f99b58_tt.jpg',24),(25,'590fd5_com.jpg',25),(26,'6e2f21_ii.jpg',26),(27,'a38dfd_oo.jpg',27),(28,'7d457d_l.jpg',28),(29,'2bf16a_r.jpg',29),(30,'9f9274_w.jpg',30),(31,'66d927_v.jpg',31);
/*!40000 ALTER TABLE `pv_imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_municipio`
--

DROP TABLE IF EXISTS `pv_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_municipio` (
  `id_municipio` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(45) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_municipio`),
  KEY `fk_PV_MUNICIPIO_PV_ESTADO1_idx` (`id_estado`),
  CONSTRAINT `fk_PV_MUNICIPIO_PV_ESTADO1` FOREIGN KEY (`id_estado`) REFERENCES `pv_estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_municipio`
--

LOCK TABLES `pv_municipio` WRITE;
/*!40000 ALTER TABLE `pv_municipio` DISABLE KEYS */;
INSERT INTO `pv_municipio` VALUES (1,'ACAMBAY',1),(2,'ACOLMAN',2),(3,'ACULCO',3),(4,'ALMOLOYA DE ALQUISIRAS',4),(5,'ALMOLOYA DE JAUREZ',5),(6,'ALMOLOYA DEL RIO',20),(7,'AMANALCO',3),(8,'AMETEPEC',4),(9,'AMECAMECA',12),(10,'APAXCO',10),(11,'ATENCO',13),(12,'ATIZAPAN',2),(13,'ATIZAPAN DE ZARAGOZA',4),(14,'ATLACOMULCO',9),(15,'ATLAUTLA',8),(16,'AXAPUSCO',7),(17,'AYAPANGO',5),(18,'CALIMAYA',8),(19,'CAPULHUAC',20),(20,'COACALCO DE BERRIOZABAL',26),(21,'COATEPEC HARINAS',16),(22,'COCOTITLAN',13),(23,'COYOTEPEC',10),(24,'CUAUTITLAN',9),(25,'CHALCO',2),(26,'CHAPA DE MOTA',8),(27,'CHAPULTEPEC',4),(28,'CHIAUTLA',11),(29,'CHICOLOAPAN',21),(30,'CHINCONCUAC',13),(31,'CHIMALHUACAN',23),(32,'DONATO GUERRA',30),(33,'ECATEPEC DE MORELOS',31),(34,'ECATZINGO',1),(35,'HUEHUETOCA',3),(36,'HUEYPOXTLA',7),(37,'HUIXQUILUCAN',2),(38,'ISIDRO FABELA',4),(39,'IXTAPALUCA',13),(40,'IXTAPAN DE LA SAL',16),(41,'IXTAPAN DE ORO',18),(42,'IXTLAHUACA',20),(43,'XALATLACO',12),(44,'JALTENCO',15),(45,'JILOTEPEC',18),(46,'JILOTZINGO',10),(47,'JIQUIPILCO',9),(48,'JOCOTITLAN',8),(49,'JOQUINCINGO',5),(50,'JUCHITEPEC',4),(51,'LERMA',25),(52,'MALINALCO',29),(53,'METEPEC',8),(54,'MORELOS',6),(55,'NAUCALPAN DE JUAREZ',5),(56,'NEZAHUALCOYOTL',1),(57,'NEXTLALPAN',1),(58,'NOPALTEPEC',1),(59,'OCOYOACAC',4),(60,'OTUMBA',5),(61,'OZUMBA',11),(62,'SAN MARTIN ',12),(63,'SAN SIMON',28),(64,'SANTO TOMAS',27),(65,'TECAMAC',24),(66,'TEOTIHUACAN',23),(67,'TEXCOCO',22),(68,'TEZOYUCA',21),(69,'TOLUCA',20),(70,'ZUMPANGO',19),(71,'TONANITLA',8),(72,'SAN MATEO ATENCO',25);
/*!40000 ALTER TABLE `pv_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_proceso`
--

DROP TABLE IF EXISTS `pv_proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_proceso` (
  `id_proceso` int(11) NOT NULL AUTO_INCREMENT,
  `proceso` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_proceso`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_proceso`
--

LOCK TABLES `pv_proceso` WRITE;
/*!40000 ALTER TABLE `pv_proceso` DISABLE KEYS */;
INSERT INTO `pv_proceso` VALUES (1,'venta');
/*!40000 ALTER TABLE `pv_proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_producto`
--

DROP TABLE IF EXISTS `pv_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_producto` (
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(45) DEFAULT NULL,
  `precio_compra` float DEFAULT NULL,
  `precio_venta` float DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_provedor` int(11) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_PV_PRODUCTO_PV_CATEGORIA1_idx` (`id_categoria`),
  KEY `fk_PV_PRODUCTO_PV_PROVEDOR1_idx` (`id_provedor`),
  CONSTRAINT `fk_PV_PRODUCTO_PV_CATEGORIA1` FOREIGN KEY (`id_categoria`) REFERENCES `pv_categoria` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_PRODUCTO_PV_PROVEDOR1` FOREIGN KEY (`id_provedor`) REFERENCES `pv_provedor` (`id_provedor`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_producto`
--

LOCK TABLES `pv_producto` WRITE;
/*!40000 ALTER TABLE `pv_producto` DISABLE KEYS */;
INSERT INTO `pv_producto` VALUES (1,'Odisey',15794,26500,'Hay un nuevo e inteligente enfoque para el diseÃ±o de tu comedor. ODISEY es moderno y todo con lo que lo combines queda bien, una ingeniosa mezcla de chenille con cerezo, le agrega un toque de diferencia a lo convencional.',5,1),(2,'Gales',8599,14440,'No hay manera de equivocarse al elegir estÃ¡ sala con maravillosas lÃ­neas y sombras neutrales. El modelo GALES es una pieza central, brillante y suave que se complementa con cojines estampados y alguno de nuestros variados sillones ocasionales',5,1),(3,'Magnus',35198,58900,'Uno de los mejores ejemplares que MUEBLES DICO te puede ofrecer. La SALA MAGNUS es Ãºnica e innovadora en su tipo. Con sus reclinables descansar en ella serÃ¡ cÃ³modo y relajante al mismo tiempo. No pierdas el estilo y dÃ©jate llevar por el confort.',5,1),(4,'Sala Stephy Arena ',22498,37500,'Uno de los mejores ejemplares que MUEBLES DICO te puede ofrecer. La sala STEPHY representa calidad, comodidad y sobre todo estilo. El lugar mÃ¡s cÃ³modo del hogar ahora a un precio increÃ­ble.',2,1),(5,'Comedor Beirut Wengue con Sillas Atlanta',11099,18500,'Dale un toque de sobriedad a tu casa con este hermoso comedor BEIRUT elaborado en madera industrializada de la mÃ¡s alta calidad con sillas fabricadas en madera de pino y terminado en color chocolate.',3,1),(6,'Simply Chocolate Comedor ',5799,12000,'Un comedor lleno de gran diseÃ±o. Una mesa de vidrio templado sobre una base rectangular sencilla hacen del \"Simply\" el comedor de estilo moderno que estabas buscando. Tu elecciÃ³n entre un chocolate pulcro o un blanco espectacular, completan este comedor',3,1),(8,'Pragga',3600,5000,'La frescura y estilo de la nueva recÃ¡mara TABACO harÃ¡ de tu dormitorio tu lugar favorito. Hecha con madera de la mÃ¡s alta calidad, fina y resistente. Con grabado veta olmo y jaladeras metÃ¡licas. Duerme y sueÃ±a con el mejor estilo.',1,1),(9,'Pragga',6000,7000,'RecÃ¡mara de estilo contemporÃ¡neo hecha con madera fina de la mÃ¡s alta calidad. con acabado en laca de poliuretano y tapizada en tactopiel en diferentes tonalidades.',1,1),(10,'Golden Gris RecÃ¡mara K.S.',7000,9000,'Espaciosa, moderna y de hermosa, asi es la recÃ¡mara DORY; fabricada de madera con acabados en mate color chocolate y su gran cabecera tapizada en tactopiel color beige le dan un toque distintivo a esta.',1,1),(11,'Emily RecÃ¡mara',10000,12000,'Si existe un escenario perfecto para el descanso es la nueva recÃ¡mara EMILY. Realizada con elementos naturales de larga duraciÃ³n promete un diseÃ±o contemporÃ¡neo y Ãºnico. Perfecta para tus noches.',1,1),(12,'Braham Gris RecÃ¡mara',4000,6000,'Te sentirÃ¡s como en un hotel de cinco estrellas, cada maÃ±ana en tu recÃ¡mara BRAHAM, fabricada en madera de la mÃ¡s alta calidad, enchapada en okumÃ© y terminada en laca mate color avellana. ',1,1),(13,'Nappa Gris RecÃ¡mara K.S. ',5000,6000,'Todo aquello que alguna vez fue, lo sera por siempre. Elegante, contemporÃ¡nea, clÃ¡sica, retro, modernaâ€¦ Â¡simplemente VINTAGE! AsÃ­ es la recÃ¡mara NAPPA con acabados de madera finamente revisados y detalles metÃ¡licos, y un hermoso tapiz que dejara a',1,1),(14,'Torrento Camello Sala',6000,8000,'Para todos aquellos que gustan de estilo y modernidad, les presentamos la nueva sala TORRENTO. Realizada con madera de la mÃ¡s alta calidad y tapizada en piel match color vino y costuras al contraste. SiÃ©ntate, descansa y goza con esta sala a un precio i',5,1),(15,'Cordoba Terracota Piel Match Sala',7000,1000,'Da un paso adelante... descubre lo mÃ¡s fino que los muebles pueden ofrecer: confort y durabilidad incomparable. Eso es CORDOBA con diseÃ±os y materiales de alta calidad, nunca querrÃ¡s cambiar de sala.',5,1),(16,'Derby Marfil Sala',4000,8000,'La sala Derby crea un ambiente de elegancia en cualquier lugar. Sus brazos redondeados y asientos ajustados te harÃ¡n sentir en un confort como en las nubes. Tapizada en piel, disponible en piezas sueltas y colores marfil, chocolate y rojo.*',5,1),(17,'Alexa Aqua Linato Sala',4000,6000,'Si de variedad se trata, los modelos de ALEXA te van a encantar, elige el color que mÃ¡s te guste para tu casa. Sus lÃ­neas sutiles y delicadas le dan una vista muy moderna y de impecable presencia, sin mencionar lo espaciosas y cÃ³modas que son. Perfecta',2,1),(18,'Amaya Gris Oxford Sala Modular',5000,7000,'Lo bello y lo moderno se juntan para crear a la nueva sala AMAYA OXFORD. Un ejemplar que se atreve a jugar con diferentes tonalidades de colores y lograr un balance y armonÃ­a perfectos',2,1),(19,'Sala Stephy ',3000,7000,'Uno de los mejores ejemplares que MUEBLES DICO te puede ofrecer. La sala STEPHY representa calidad, comodidad y sobre todo estilo. El lugar mÃ¡s cÃ³modo del hogar ahora a un precio increÃ­ble.',2,1),(20,'England Chocolate Sala',4000,8000,'Estilo sobrio y actual, hacen de la sala ENGLAND el espacio perfecto para plÃ¡ticas interminables. Su tapiz en linato y las patas metÃ¡licas le dan perfecto al clavo para que a la vista sea la sala de tus sueÃ±os.',2,1),(21,'Lindsay Camello Chenille Sala',4000,8000,'Todo se ve mejor estando al lado de nuestro sofÃ¡ Lindsay, le darÃ¡ un nuevo ambiente a tu hogar. Su respaldo con cojines sueltos te brindarÃ¡n el mayor confort posible. Tapizado en fino chenille en opciones olivo, chocolate y camello.*',2,1),(22,'Comedor Beirut Wengue ',6000,8000,'Dale un toque de sobriedad a tu casa con este hermoso comedor BEIRUT elaborado en madera industrializada de la mÃ¡s alta calidad con sillas fabricadas en madera de pino y terminado en color chocolate.',3,1),(23,'Grayson Chocolate/Gris Comedor',8000,1000,'La elegancia se describe sola con este comedor GRAYSON diseÃ±ado en colores chocolate y gris dan un toque muy distintivo a este espacio de tu hogar, no pierdas de vista la lÃ­nea GRAYSON y deja que adornen los rincones de tu casa.',3,1),(24,'Dove Comedor',8000,10000,'Se parte de la escena actual de tu pelÃ­cula y ponle un poco de magia a tu comedor. Finos acabados en poliester al alto brillo en un espectacular blanco y gris reflejan una extravagancia pura. Desde los acentos de cristal en sus sillas hasta los detalles ',3,1),(25,'Simply Blanco Comedor',6000,8000,'Un comedor lleno de gran diseÃ±o. Una mesa de vidrio templado sobre una base rectangular sencilla hacen del \"Simply\" el comedor de estilo moderno que estabas buscando. ',3,1),(26,'Osaka Rojo Cocina',5000,10000,'Â¿Estabas buscando un estilo Ãºnico e innovador? Esta cocina \"Osaka\" es el ejemplo para personas que como tÃº, imponen la moda sin importar si se trata de la cocina, terminada en poliester al alto brillo y de fÃ¡cil limpieza, te ofrece gran durabilidad y ',4,1),(27,'Osaka Blanco Cocina',6000,11000,'Â¿Estabas buscando un estilo Ãºnico e innovador? Esta cocina \"Osaka\" es el ejemplo para personas que como tÃº, imponen la moda sin importar si se trata de la cocina, terminada en poliester al alto brillo y de fÃ¡cil limpieza, te ofrece gran durabilidad y ',4,1),(28,'Osaka  Cocina',8000,13000,'Crea tu cocina perfecta, demuestra tu buen gusto con la apariencia transicional de la cocina Victoria. El acabado cerezo destaca bellamente con el nÃ­quel de su herrerÃ­a, las puertas de cristal de sus alacenas le dan el toque nostÃ¡lgico que la complemen',4,1),(29,'Imperio Cocina',5000,10000,'Deja que la madera se convierta en la pieza principal de tu cocina, despuÃ©s aÃ±Ã¡deles un bello contorno y obtendrÃ¡s esta maravillosa cocina Imperio en estilo ClÃ¡sico que nunca pasarÃ¡ de moda, su delicada portacampana le agrega un toque adicional de d',4,1),(30,'Niza Vintage Gris ',9000,15000,' MÃ³dulo, alacena y porta campana.',4,1),(31,'Imperio Cocina Escuadra',7000,10000,'Deja que la madera se convierta en la pieza principal de tu cocina, despuÃ©s aÃ±Ã¡deles un bello contorno y obtendrÃ¡s esta maravillosa cocina Imperio en estilo ClÃ¡sico que nunca pasarÃ¡ de moda, su delicada portacampana le agrega un toque adicional de d',4,1);
/*!40000 ALTER TABLE `pv_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_provedor`
--

DROP TABLE IF EXISTS `pv_provedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_provedor` (
  `id_provedor` int(11) NOT NULL AUTO_INCREMENT,
  `provedor` varchar(45) DEFAULT NULL,
  `contacto` varchar(45) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `no_exterior` int(11) DEFAULT NULL,
  `no_interior` int(11) DEFAULT NULL,
  `id_estado` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_colonia` varchar(45) DEFAULT NULL,
  `id_cp` int(11) NOT NULL,
  PRIMARY KEY (`id_provedor`),
  KEY `fk_PV_PROVEDOR_PV_ESTADO1_idx` (`id_estado`),
  KEY `fk_PV_PROVEDOR_PV_MUNICIPIO1_idx` (`id_municipio`),
  CONSTRAINT `fk_PV_PROVEDOR_PV_ESTADO1` FOREIGN KEY (`id_estado`) REFERENCES `pv_estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_PROVEDOR_PV_MUNICIPIO1` FOREIGN KEY (`id_municipio`) REFERENCES `pv_municipio` (`id_municipio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_provedor`
--

LOCK TABLES `pv_provedor` WRITE;
/*!40000 ALTER TABLE `pv_provedor` DISABLE KEYS */;
INSERT INTO `pv_provedor` VALUES (1,'Muebles dico','jose ramon','5512345678','jose.ramon@dico.com.mx','alboledas del sur',69,10,1,1,'buenavista',55605);
/*!40000 ALTER TABLE `pv_provedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_usuario`
--

DROP TABLE IF EXISTS `pv_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_PV_USUARIO_PV_CATEGORIA_USUARIO_idx` (`id_categoria`),
  KEY `fk_PV_USUARIO_PV_CLIENTE` (`id_cliente`),
  CONSTRAINT `fk_PV_USUARIO_PV_CATEGORIA_USUARIO` FOREIGN KEY (`id_categoria`) REFERENCES `pv_categoria_usuario` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_USUARIO_PV_CLIENTE` FOREIGN KEY (`id_cliente`) REFERENCES `pv_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_usuario`
--

LOCK TABLES `pv_usuario` WRITE;
/*!40000 ALTER TABLE `pv_usuario` DISABLE KEYS */;
INSERT INTO `pv_usuario` VALUES (1,'admin','maNFFVN3iSshg','admin@furniture.com',1,NULL),(2,'alondra','mav6vjSDWNY7o','alondra@gmail.com',3,NULL),(3,'Laura','mav6vjSDWNY7o','laura@gmail.com',2,1),(4,'manchitas','mav6vjSDWNY7o','manchitas@furniture.com',2,2),(5,'guadalupe','mav6vjSDWNY7o','arceguadalupe2311@gmail.com',2,3);
/*!40000 ALTER TABLE `pv_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pv_venta`
--

DROP TABLE IF EXISTS `pv_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pv_venta` (
  `folio` int(11) NOT NULL AUTO_INCREMENT,
  `feha` date DEFAULT NULL,
  `monto` float DEFAULT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_proceso` int(11) NOT NULL,
  PRIMARY KEY (`folio`),
  KEY `fk_PV_VENTA_PV_CLIENTE1_idx` (`id_cliente`),
  KEY `fk_PV_VENTA_PV_PROCESO1_idx` (`id_proceso`),
  CONSTRAINT `fk_PV_VENTA_PV_CLIENTE1` FOREIGN KEY (`id_cliente`) REFERENCES `pv_cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_PV_VENTA_PV_PROCESO1` FOREIGN KEY (`id_proceso`) REFERENCES `pv_proceso` (`id_proceso`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pv_venta`
--

LOCK TABLES `pv_venta` WRITE;
/*!40000 ALTER TABLE `pv_venta` DISABLE KEYS */;
INSERT INTO `pv_venta` VALUES (2,'2017-12-03',14440,1,1),(3,'2017-12-03',18500,1,1),(4,'2017-12-04',84260,1,1),(5,'2017-12-04',37500,1,1),(6,'2017-12-04',37500,1,1),(7,'2017-12-04',37500,1,1),(8,'2017-12-04',37500,1,1),(9,'2017-12-04',37500,1,1),(10,'2017-12-04',18500,1,1),(11,'2017-12-04',18500,1,1),(12,'2017-12-04',18500,1,1),(13,'2017-12-04',12000,1,1),(14,'2017-12-10',18500,3,1),(15,'2017-12-10',32940,3,1),(16,'2017-12-10',32940,3,1),(17,'2017-12-10',32940,3,1),(18,'2017-12-10',99840,3,1),(19,'2017-12-10',99840,3,1),(20,'2017-12-10',99840,3,1),(21,'2017-12-10',99840,3,1),(22,'2017-12-10',99840,3,1),(23,'2017-12-10',99840,3,1);
/*!40000 ALTER TABLE `pv_venta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-10 20:08:26
