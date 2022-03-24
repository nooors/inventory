-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema inventario
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `inventario` DEFAULT CHARACTER SET utf8mb4 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`timestamps`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`timestamps` (
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` TIMESTAMP NULL);

USE `inventario` ;

-- -----------------------------------------------------
-- Table `inventario`.`categorias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`categorias` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `categoria` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`colores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`colores` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `color` VARCHAR(255) NOT NULL,
  `codigo` VARCHAR(6) NULL DEFAULT NULL,
  `orden` TINYINT(2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`familias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`familias` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `familia` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`marcas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`marcas` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `marca` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`modelos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`modelos` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `id_marca` TINYINT(2) NOT NULL,
  `modelo` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_modelo_marca` (`id_marca` ASC),
  CONSTRAINT `fk_modelo_marca`
    FOREIGN KEY (`id_marca`)
    REFERENCES `inventario`.`marcas` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`proveedores`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`proveedores` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `telefono` INT(20) NULL DEFAULT NULL,
  `contacto` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`tallas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`tallas` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `talla` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 7
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`prendas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`prendas` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `id_categoria` TINYINT(2) NOT NULL,
  `id_familia` TINYINT(2) NOT NULL,
  `id_talla` TINYINT(2) NOT NULL,
  `id_color` TINYINT(2) NOT NULL,
  `id_proveedor` TINYINT(2) NOT NULL,
  `id_marca` TINYINT(2) NULL DEFAULT NULL,
  `id_modelo` TINYINT(2) NOT NULL,
  `referencia` VARCHAR(40) NULL DEFAULT NULL,
  `cantidad` INT(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_prenda_categoria` (`id_categoria` ASC),
  INDEX `fk_prenda_familia` (`id_familia` ASC),
  INDEX `fk_prenda_talla` (`id_talla` ASC),
  INDEX `fk_prenda_color` (`id_color` ASC),
  INDEX `fk_prenda_proveedor` (`id_proveedor` ASC),
  INDEX `fk_prenda_marcas` (`id_marca` ASC),
  INDEX `fk_prenda_modelos` (`id_modelo` ASC),
  CONSTRAINT `fk_prenda_categoria`
    FOREIGN KEY (`id_categoria`)
    REFERENCES `inventario`.`categorias` (`id`),
  CONSTRAINT `fk_prenda_color`
    FOREIGN KEY (`id_color`)
    REFERENCES `inventario`.`colores` (`id`),
  CONSTRAINT `fk_prenda_familia`
    FOREIGN KEY (`id_familia`)
    REFERENCES `inventario`.`familias` (`id`),
  CONSTRAINT `fk_prenda_marcas`
    FOREIGN KEY (`id_marca`)
    REFERENCES `inventario`.`marcas` (`id`),
  CONSTRAINT `fk_prenda_modelos`
    FOREIGN KEY (`id_modelo`)
    REFERENCES `inventario`.`modelos` (`id`),
  CONSTRAINT `fk_prenda_proveedor`
    FOREIGN KEY (`id_proveedor`)
    REFERENCES `inventario`.`proveedores` (`id`),
  CONSTRAINT `fk_prenda_talla`
    FOREIGN KEY (`id_talla`)
    REFERENCES `inventario`.`tallas` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 40
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `inventario`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `inventario`.`usuarios` (
  `id` TINYINT(2) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NOT NULL,
  `apellidos` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `rol` VARCHAR(255) NOT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email` (`email` ASC),
  UNIQUE INDEX `uq_email` (`email` ASC))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
