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
CREATE SCHEMA IF NOT EXISTS `tpWeb2Db` DEFAULT CHARACTER SET utf8 ;
USE `tpWeb2Db` ;

-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Rol` (
  `idRol` INT NOT NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE INDEX `tipo_UNIQUE` (`tipo` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Comercio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Comercio` (
  `idComercio` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `banner` VARCHAR(200) NULL,
  PRIMARY KEY (`idComercio`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tpWeb2Db`.`Usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`Usuario` (
  `idUsuario` INT NOT NULL AUTO_INCREMENT,
  `nombreUsuario` VARCHAR(45) NULL,
  `clave` VARCHAR(45) NULL,
  `email` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellido` VARCHAR(45) NULL,
  `Rol_idRol` INT NOT NULL,
  `direccion` VARCHAR(45) NULL,
  `telefono` BIGINT(12) NULL,
  `estado` TINYINT(1) NULL,
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
-- Table `tpWeb2Db`.`PuntoDeVenta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tpWeb2Db`.`PuntoDeVenta` (
  `idPuntoDeVenta` INT NOT NULL AUTO_INCREMENT,
  `direccion` VARCHAR(45) NULL,
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
  `numero` INT NULL,
  `fechaHoraEntrega` DATETIME NULL,
  `fechaHoraRetiro` DATETIME NULL,
  `Usuario_idCliente` INT NOT NULL,
  `Usuario_idDelivery` INT NOT NULL,
  `PuntoDeVenta_idPuntoDeVenta` INT NOT NULL,
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
  CONSTRAINT `fk_Pedido_PuntoDeVenta1`
    FOREIGN KEY (`PuntoDeVenta_idPuntoDeVenta`)
    REFERENCES `tpWeb2Db`.`PuntoDeVenta` (`idPuntoDeVenta`)
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
  `foto` VARCHAR(300) NULL,
  `descripcion` VARCHAR(45) NULL,
  `Precio_idPrecio` INT NOT NULL,
  PRIMARY KEY (`idMenu`),
  CONSTRAINT `fk_Menu_Precio1`
    FOREIGN KEY (`Precio_idPrecio`)
    REFERENCES `tpWeb2Db`.`Precio` (`idPrecio`)
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

insert into Rol values(1,'Administrador'),(2,'Cliente'),(3,'Delivery'),(4,'OperadorComercio');
