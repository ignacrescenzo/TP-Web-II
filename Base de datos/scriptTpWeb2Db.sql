-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema tpWeb2Db
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema tpWeb2Db
-- -----------------------------------------------------
DROP DATABASE IF EXISTS tpWeb2Db;
CREATE SCHEMA IF NOT EXISTS `tpWeb2Db` DEFAULT CHARACTER SET utf8 ;
USE `tpWeb2Db` ;

-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Rol` (
  `idRol` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Comercio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Comercio` (
  `idComercio` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `direccion` VARCHAR(45) NULL,
  `ciudad` VARCHAR(200) NULL,
  `banner` VARCHAR(200) NULL,
  `telefono` VARCHAR(200) NULL,
  `habilitado` VARCHAR(200) NULL,
  `imagen` VARCHAR (45) NULL,
  `tiempoEntrega` INT NULL,
  PRIMARY KEY (`idComercio`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(45) NULL,
  `clave` VARCHAR(150) NULL,
  `email` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `Rol_idRol` INT NOT NULL,
  `domicilio` VARCHAR(100) NULL,
  `telefono` BIGINT(12) NULL,
  `estado` TINYINT(1) NULL,
  `horaActivo` DATETIME NULL,
  `horaDesconectado` DATETIME NULL,
  `habilitado` TINYINT(2) NULL,
  `horaPenalizado` DATETIME NULL,
  `Comercio_idComercio` INT NULL,
  PRIMARY KEY (`idUsuario`),
  UNIQUE INDEX `nombreUsuario_UNIQUE` (`nombreUsuario` ASC),
  CONSTRAINT `fk_Usuario_Rol1`
    FOREIGN KEY (`Rol_idRol`)
    REFERENCES `tpWeb2Db`.`Rol` (`idRol`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Comercio1`
    FOREIGN KEY (`Comercio_idComercio`)
    REFERENCES `tpWeb2Db`.`Comercio` (`idComercio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `mydb`.`cuenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`cuenta` (
  `idCuenta` INT NOT NULL AUTO_INCREMENT,
  `monto` FLOAT NULL,
  `comercio_idComercio` INT(11) NULL,
  `usuario_idUsuario` INT(11) NULL,
  PRIMARY KEY (`idCuenta`),
  INDEX `fk_cuenta_comercio_idx` (`comercio_idComercio` ASC),
  INDEX `fk_cuenta_usuario1_idx` (`usuario_idUsuario` ASC),
  CONSTRAINT `fk_cuenta_comercio`
    FOREIGN KEY (`comercio_idComercio`)
    REFERENCES `tpweb2db`.`comercio` (`idComercio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cuenta_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `tpweb2db`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`movimiento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`movimiento` (
  `idMovimiento` INT NOT NULL AUTO_INCREMENT,
  `monto` FLOAT NULL,
  `fecha` DATETIME NULL,
  `usuario_idUsuario` INT(11) NULL,
  `comercio_idComercio` INT(11) NULL,
  PRIMARY KEY (`idMovimiento`),
  INDEX `fk_movimiento_usuario1_idx` (`usuario_idUsuario` ASC),
  INDEX `fk_movimiento_comercio1_idx` (`comercio_idComercio` ASC),
  CONSTRAINT `fk_movimiento_usuario1`
    FOREIGN KEY (`usuario_idUsuario`)
    REFERENCES `tpweb2db`.`usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_movimiento_comercio1`
    FOREIGN KEY (`comercio_idComercio`)
    REFERENCES `tpweb2db`.`comercio` (`idComercio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `tpweb2db` ;
-- -----------------------------------------------------
-- Table `tpWeb2Db`.`PuntoDeVenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`PuntoDeVenta` (
  `idPuntoDeVenta` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(45) NULL,
  `telefono` VARCHAR(20) NULL,
  `Comercio_idComercio` INT NOT NULL,
  PRIMARY KEY (`idPuntoDeVenta`),
  CONSTRAINT `fk_PuntoDeVenta_Comercio1`
    FOREIGN KEY (`Comercio_idComercio`)
    REFERENCES `tpWeb2Db`.`Comercio` (`idComercio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT,
  `fechaHoraEntrega` DATETIME NULL,
  `fechaHoraRetiro` DATETIME NULL,
  `fechaHoraGenerado` DATETIME NULL,
  `montoTotal` FLOAT NULL,
  `Usuario_idCliente` INT NOT NULL,
  `Usuario_idDelivery` INT NULL,
  `idPuntoDeVenta` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  CONSTRAINT `fk_Pedido_Usuario1`
    FOREIGN KEY (`Usuario_idCliente`)
    REFERENCES `tpWeb2Db`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Usuario2`
    FOREIGN KEY (`Usuario_idDelivery`)
    REFERENCES `tpWeb2Db`.`Usuario` (`idUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idPuntoDeVenta`
    FOREIGN KEY (`idPuntoDeVenta`)
    REFERENCES `tpWeb2Db`.`puntodeventa` (`idPuntoDeVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Precio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Precio` (
  `idPrecio` INT NOT NULL AUTO_INCREMENT,
  `monto` DOUBLE NULL,
  `porcDesc` INT NULL,
  PRIMARY KEY (`idPrecio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Menu` (
  `idMenu` INT NOT NULL AUTO_INCREMENT,
  `foto` VARCHAR(45) NULL,
  `ofertado` tinyint(1) NULL,
  `descripcion` VARCHAR(45) NULL,
  `Precio_idPrecio` INT NOT NULL,
  `Precio_idPrecioAnterior` INT NULL,
  `idPuntoDeVenta` INT NOT NULL,
  PRIMARY KEY (`idMenu`),
  CONSTRAINT `fk_Menu_Precio1`
    FOREIGN KEY (`Precio_idPrecio`)
    REFERENCES `tpWeb2Db`.`Precio` (`idPrecio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Menu_Precio2`
    FOREIGN KEY (`Precio_idPrecioAnterior`)
    REFERENCES `tpWeb2Db`.`Precio` (`idPrecio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_Menu_PuntoDeVenta`
    FOREIGN KEY (`idPuntoDeVenta`)
    REFERENCES `tpWeb2Db`.`puntodeventa` (`idPuntoDeVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Menu_has_Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Menu_has_Pedido` (
  `Menu_idMenu` INT NOT NULL,
  `Pedido_idPedido` INT NOT NULL,
  PRIMARY KEY (`Menu_idMenu`, `Pedido_idPedido`),
  CONSTRAINT `fk_Menu_has_Pedido_Menu1`
    FOREIGN KEY (`Menu_idMenu`)
    REFERENCES `tpWeb2Db`.`Menu` (`idMenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Menu_has_Pedido_Pedido1`
    FOREIGN KEY (`Pedido_idPedido`)
    REFERENCES `tpWeb2Db`.`Pedido` (`idPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`PuntoDeVenta_has_Menu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`PuntoDeVenta_has_Menu` (
  `PuntoDeVenta_idPuntoDeVenta` INT NOT NULL,
  `Menu_idMenu` INT NOT NULL,
  PRIMARY KEY (`PuntoDeVenta_idPuntoDeVenta`, `Menu_idMenu`),
  CONSTRAINT `fk_PuntoDeVenta_has_Menu_PuntoDeVenta1`
    FOREIGN KEY (`PuntoDeVenta_idPuntoDeVenta`)
    REFERENCES `tpWeb2Db`.`PuntoDeVenta` (`idPuntoDeVenta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_PuntoDeVenta_has_Menu_Menu1`
    FOREIGN KEY (`Menu_idMenu`)
    REFERENCES `tpWeb2Db`.`Menu` (`idMenu`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

insert into Rol 
values
(1,'Administrador'),(2,'Cliente'),(3,'Delivery'),(4,'OperadorComercio');

insert into comercio
values
(1,'Comercio 1','a@a.com','direccion falsa','Buenos Aires', null, '11535433',1,'logo1',30),
(2,'Comercio 2','b@b.com','direccion falsa2','Mendoza',null,'1246215133',1,'logo2',45);




insert into puntodeventa
values
(1,'direccion 1','333-444',1),(2,'direccion 2','666-999',1);

insert into Usuario(idUsuario, nombreUsuario, clave, Rol_idRol,Comercio_idComercio,domicilio,estado,habilitado)
values
( 1,'admin1',md5('1111'),1,null,null,null,null),
( 2,'cliente1',md5('2222'),2,null,'otra direccion falsa',null,null),
( 3,'delivery1',md5('3333'),3,null,null,0,1),
( 4,'opcomercio1',md5('4444'),4,1,null,null,null);

insert into precio 
values 
(1,120,null),
(2,140,null);

insert into menu
values
(1,null,0,'Carne con papas',1,null,1),
(2,null,0,'Hamburguesa',2,null,1);

insert into cuenta (monto,comercio_idComercio,usuario_idUsuario)
values
(0,1,null),
(0,2,null),
(0,null,1),
(0,null,2),
(0,null,3),
(0,null,4);

insert into movimiento (monto,fecha,usuario_idUsuario,comercio_idComercio)
values
(0,null,1,null),
(0,null,2,null),
(0,null,3,null),
(0,null,4,null),
(0,null,null,1),
(0,null,null,2);

/*
select Comercio_idComercio from PuntoDeVenta where idPuntodeventa = (select max(idPuntodeventa) from PuntoDeVenta);

insert into PuntoDeVenta (direccion, telefono, Comercio_idComercio)
			values ('springfield','333-789',2);
            
update PuntoDeVenta set direccion="miau", telefono="111" where idPuntoDeVenta=3;

OBTENER MENUS DE UN COMERCIO
select * from menu m 
						 inner join precio p on p.idPrecio = m.Precio_idPrecio
						 inner join puntodeventa pdv on pdv.idPuntoDeVenta = m.idPuntoDeVenta
						 inner join comercio com on com.idComercio = pdv.Comercio_idComercio  where com.idComercio = 1;*/
                         
                         
/*select p.idPedido as id, u.domicilio dom, c.direccion as dir,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
inner join Comercio as c on c.idComercio = p.Comercio_idComercio
where p.Usuario_idDelivery = 3 and p.fechaHoraEntrega is null;

select u.domicilio dom, c.direccion as dir, p.idPedido as id
from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
inner join Comercio as c on c.idComercio = p.Comercio_idComercio
where p.Usuario_idDelivery is null;


select c.direccion as dir, p.idPedido as id,p.fechaHoraRetiro as retiro, p.fechaHoraEntrega as entrega
from Pedido as p inner join Usuario as u on u.idUsuario = p.Usuario_idCliente
inner join Comercio as c on c.idComercio = p.Comercio_idComercio
where p.Usuario_idCliente = 2;*/
/*select * from pedido; verifica carga de fecha y hora

select now(); insertar fehca y hora actual

update Pedido
set Usuario_idDelivery=null
where idPedido=5;

*/
