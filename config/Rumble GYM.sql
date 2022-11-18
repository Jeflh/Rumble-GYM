-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema rumble_gym
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema rumble_gym
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `rumble_gym` DEFAULT CHARACTER SET utf8 ;
USE `rumble_gym` ;

-- -----------------------------------------------------
-- Table `rumble_gym`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rumble_gym`.`clientes` (
  `id_cliente` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido_paterno` VARCHAR(45) NOT NULL,
  `apellido_m` VARCHAR(45) NOT NULL,
  `sexo` VARCHAR(1) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `peso` FLOAT NOT NULL,
  `altura` FLOAT NOT NULL,
  `imc` FLOAT NOT NULL,
  `domicilio` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `estado` TINYINT NOT NULL,
  `tipo_suscripcion` INT NOT NULL,
  `estado_suscripcion` TINYINT NOT NULL,
  `fecha_inicio` DATE NOT NULL,
  `fecha_fin` DATE NOT NULL,
  PRIMARY KEY (`id_cliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rumble_gym`.`empleados`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rumble_gym`.`empleados` (
  `id_empleado` INT NOT NULL,
  `password` VARCHAR(60) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `apellido_paterno` VARCHAR(45) NOT NULL,
  `apellino_materno` VARCHAR(45) NOT NULL,
  `fecha_nacimiento` VARCHAR(45) NOT NULL,
  `domicilio` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(10) NOT NULL,
  `tipo` INT NOT NULL,
  PRIMARY KEY (`id_empleado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rumble_gym`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rumble_gym`.`ventas` (
  `id_venta` INT NOT NULL,
  `fecha_venta` DATE NOT NULL,
  `monto_venta` FLOAT NOT NULL,
  PRIMARY KEY (`id_venta`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rumble_gym`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rumble_gym`.`productos` (
  `id_producto` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `cantidad` INT NOT NULL,
  `precio` FLOAT NOT NULL,
  PRIMARY KEY (`id_producto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `rumble_gym`.`asistencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rumble_gym`.`asistencias` (
  `id_asistencias` INT NOT NULL,
  `id_cliente` INT NOT NULL,
  `fecha_asistencia` DATE NOT NULL,
  `estado` TINYINT NOT NULL,
  PRIMARY KEY (`id_asistencias`),
  INDEX `id_cliente_idx` (`id_cliente` ASC) VISIBLE,
  CONSTRAINT `id_cliente`
    FOREIGN KEY (`id_cliente`)
    REFERENCES `rumble_gym`.`clientes` (`id_cliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
