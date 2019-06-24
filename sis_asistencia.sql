/*
 Navicat Premium Data Transfer

 Source Server         : omar
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : sis_asistencia

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 19/06/2019 13:44:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for detalle_asistencia
-- ----------------------------
DROP TABLE IF EXISTS `detalle_asistencia`;
CREATE TABLE `detalle_asistencia`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codPracticante_fk` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NULL DEFAULT NULL,
  `horEntrada` time(0) NULL DEFAULT NULL,
  `horSalida` time(0) NULL DEFAULT NULL,
  `horTotales` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `codPracticante_fk`(`codPracticante_fk`) USING BTREE,
  CONSTRAINT `practicantes -> detalle` FOREIGN KEY (`codPracticante_fk`) REFERENCES `practicantes` (`dni`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 57 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for practicantes
-- ----------------------------
DROP TABLE IF EXISTS `practicantes`;
CREATE TABLE `practicantes`  (
  `dni` char(8) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apePaterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apeMaterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecNacimiento` date NOT NULL,
  `sexo` char(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `codTurno_fk` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`dni`) USING BTREE,
  INDEX `codTurno_fk`(`codTurno_fk`) USING BTREE,
  CONSTRAINT `practicantes -> turnos` FOREIGN KEY (`codTurno_fk`) REFERENCES `turnos` (`codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for turnos
-- ----------------------------
DROP TABLE IF EXISTS `turnos`;
CREATE TABLE `turnos`  (
  `codigo` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(25) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `Id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  `clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`Id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Procedure structure for horario_dia
-- ----------------------------
DROP PROCEDURE IF EXISTS `horario_dia`;
delimiter ;;
CREATE PROCEDURE `horario_dia`()
BEGIN
SELECT dni,CONCAT(apePaterno,' ',apeMaterno,', ',nombres) as nomCompleto,horEntrada,IFNULL(horSalida,'<i>Aun no Sale</i>') as horSalida,fecha
FROM practicantes p inner join detalle_asistencia d on p.dni=d.codPracticante_fk where fecha=DATE_FORMAT(NOW(), "%Y-%m-%d");
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listaAlumnos
-- ----------------------------
DROP PROCEDURE IF EXISTS `listaAlumnos`;
delimiter ;;
CREATE PROCEDURE `listaAlumnos`()
BEGIN
SELECT dni,CONCAT(codTurno_fk,' - ',apePaterno,' ',apeMaterno,', ',nombres)as nomCompleto,fecha,horEntrada,horSalida FROM practicantes p left join detalle_asistencia d 
on p.dni=d.codPracticante_fk where fecha=DATE_FORMAT(NOW(), "%Y-%m-%d") or fecha<=>null;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for marcarAsistencia
-- ----------------------------
DROP PROCEDURE IF EXISTS `marcarAsistencia`;
delimiter ;;
CREATE PROCEDURE `marcarAsistencia`(`codigo` CHAR(8), `accion` VARCHAR(100))
BEGIN
if(accion="ingreso") then
insert into detalle_asistencia(codPracticante_fk,fecha,horEntrada) value(codigo,DATE_FORMAT(NOW(), "%Y-%m-%d"),DATE_FORMAT(NOW(), "%h:%i:%s"));
elseif (accion="salida") then
update detalle_asistencia set horSalida=DATE_FORMAT(NOW(), "%h:%i:%s") where codPracticante_fk=codigo;
end if;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for pc_eliminar
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_eliminar`;
delimiter ;;
CREATE PROCEDURE `pc_eliminar`(dn CHAR(8))
BEGIN
delete from practicantes where
dni=dn;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for pc_insertar
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_insertar`;
delimiter ;;
CREATE PROCEDURE `pc_insertar`(dni CHAR(8),
apeP VARCHAR(100),
apeM VARCHAR (100),
nombres VARCHAR (100),
fecNa datetime,
sexo CHAR (1),
codTurno_fk CHAR (2),
descripcion MEDIUMTEXT)
BEGIN
INSERT INTO practicantes VALUES (dni,apeP,apeM,nombres,fecNa,sexo,codTurno_fk,descripcion);
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for pc_modificar
-- ----------------------------
DROP PROCEDURE IF EXISTS `pc_modificar`;
delimiter ;;
CREATE PROCEDURE `pc_modificar`(dn CHAR(8),
apeP VARCHAR(100),
apeM VARCHAR (100),
nombres VARCHAR (100),
fecNa datetime,
sexo CHAR (1),
codTurno_fk CHAR (2),
descripcion MEDIUMTEXT)
BEGIN
UPDATE
practicantes
set
apePaterno=apeP,
apeMaterno=apeM,
nombres=nombres,
fecNacimiento=fecNa,
sexo=sexo,
codTurno_fk=codTurno_fk,
descripcion=descripcion
WHERE
dn=dni;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for verificar_asistencia
-- ----------------------------
DROP PROCEDURE IF EXISTS `verificar_asistencia`;
delimiter ;;
CREATE PROCEDURE `verificar_asistencia`(`dni2` CHAR(8))
BEGIN
declare btnIngreso varchar(100);
declare btnSalida varchar(100);
declare conIngreso int;
declare conSalida int;
declare count int;
set count =(SELECT count(*) FROM practicantes WHERE dni=dni2);
if(count=0) then
select * from practicantes where 1=0;
else
set conIngreso=(select count(*) from detalle_asistencia where fecha=DATE_FORMAT(NOW(), "%Y-%m-%d") and NOT (horEntrada <=> NULL) and codPracticante_fk=dni2);
set conSalida=(select count(*) from detalle_asistencia where fecha=DATE_FORMAT(NOW(), "%Y-%m-%d") and NOT (horSalida <=> NULL) and codPracticante_fk=dni2);
select DATE_FORMAT(NOW(), "%Y-%m-%d") as fecha,conIngreso,conSalida;
end if;
END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;