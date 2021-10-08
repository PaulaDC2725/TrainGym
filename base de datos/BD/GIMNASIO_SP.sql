/*Vistas*/
CREATE VIEW ConsultarMetodologia
AS
SELECT U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente,C.correoCliente, C.telefonoCliente, M.nombreMetodologia 
FROM Clientes C 
JOIN usuarios U 
JOIN metodologia m 
JOIN suscripcion_Metodologia sm 
JOIN Suscripciones as s
on C.idUsuarioFK = U.idUsuario 
and s.idClienteFK = C.idCliente 
and sm.idMetodologiaFK=m.idMetodologia 
and sm.idSuscripcionFK=s.idSuscripcion;


/*PROCEDIMIENTOS ALMACENADOS*/


/*---------------SP PARA VALIDACION DE LOGIN---------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `validar_login`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `validar_login` (	in `usuario` int(12), 
									in `password` VARCHAR(25), 
									in `rol` int(12), 
                                    in `estado` INT(1))
BEGIN
	SELECT COUNT(*) AS RESULTADO 
	FROM USUARIOS 
	WHERE NumeroIdentificacion=usuario 
	AND passwordUsuario=password 
	AND idRolFK=rol 
	AND estadoUsuario=estado;
END$$
DELIMITER ;

/*---------------SP PARA VALIDACION DE ROLES EN EL LOGIN------------------------------*/

/*Procedimiento almacenado que se encarga de validar que rol 
tiene el usuario logeado en el sistema, para asi mismo enviarlo a su correspondiente modulo,
esto teniendo en cuenta su numero de identificacion, el tipo de rol con el que se registro y el nombre del rol */

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `validar_login2`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `validar_login2` (in NumiD VARCHAR(15))
BEGIN
	SELECT idRolFK 
	FROM USUARIOS 
	WHERE NumeroIdentificacion=Numid;
END$$
DELIMITER ;

/*---------------SP PARA REGISTRAR UN USUARIO------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarUsuario`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarUsuario`  (	in numeroiu VARCHAR(35), 
										in passwordu VARCHAR(35), 
                                        in estadou INT(1),
                                        in rolu INT(1),
                                        in iddocu INT(1))
BEGIN
	INSERT INTO USUARIOS
	SELECT MAX(idUsuario) + 1,numeroiu,passwordu,estadou,rolu,iddocu 
	FROM USUARIOS;
END$$
DELIMITER ;

/*---------------SP PARA CONSULTAR UN USUARIO------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `consultarUsuario`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarUsuario` ()
BEGIN
	SELECT MAX(idUsuario) AS idUsuario 
	FROM USUARIOS;
END$$
DELIMITER ;

/*---------------SP PARA REGISTRAR UN CLIENTE------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarCliente`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarCliente`  (	in nombrec VARCHAR(35), 
                                        in apellidoc VARCHAR(35),
                                        in fnacimientoc DATE,
                                        in correoc VARCHAR(100),
                                        in telefonoc VARCHAR(11),
                                        in estadoc INT)
BEGIN
	INSERT INTO CLIENTES 
	SELECT MAX(idCliente) + 1,nombrec,apellidoc,fnacimientoc,correoc,telefonoc,estadoc,(SELECT MAX(idUsuario)FROM USUARIOS)
	FROM CLIENTES;
END$$
DELIMITER ;

/*---------------SP PARA ACTUALIZAR UN CLIENTE------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `actualizarCliente`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `actualizarCliente` (	in id int(10), 
										in correo VARCHAR(50), 
                                        in tel VARCHAR(12))
BEGIN
	UPDATE CLIENTES 
	SET correoCliente=correo , telefonoCliente = tel 
	WHERE idCliente = id;  
END$$
DELIMITER ;

/*---------------SP PARA REGISTRAR UN INSTRUCTOR------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarInstructor`  (in nombrei VARCHAR(35), 
                                        in appellidoi VARCHAR(35),
                                        in correoi VARCHAR(100),
                                        in telefonoi VARCHAR(11),
                                        in estadoi INT)
BEGIN
	INSERT INTO INSTRUCTORES 
	SELECT MAX(idInstructor) + 1,nombrei,appellidoi,correoi,telefonoi,estadoi,(SELECT MAX(idUsuario)FROM USUARIOS)
	FROM INSTRUCTORES;
END$$
DELIMITER ;

/*---------------SP PARA CONSULTAR UN INSTRUCTOR------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `consultarInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarInstructor` ()
BEGIN
	SELECT I.idInstructor,U.NumeroIdentificacion,I.nombreInstructor,I.apellidoInstructor,I.correoInstructor,I.telefonoInstructor 
	FROM USUARIOS AS U 
	JOIN INSTRUCTORES AS I 
	ON U.idUsuario=I.idUsuarioFK 
    WHERE U.estadoUsuario='1';
END$$
DELIMITER ;

/*---------------SP PARA ACTUALIZAR UN INSTRUCTOR------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `actualizarInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `actualizarInstructor` (	in id INT(10), 
											in correo VARCHAR(50), 
                                            in tel VARCHAR(12))
BEGIN
	UPDATE instructores 
	SET correoInstructor=correo , telefonoInstructor = tel
	WHERE idInstructor = id;  
END$$
DELIMITER ;

/*---------------SP PARA CONSULTAR LA SUSCRIPCION------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `consultarSuscripcion`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarSuscripcion` (in NumiD VARCHAR(15))
BEGIN
	SELECT c.nombreCliente, m.nombreMetodologia, s.valorSuscripcion, s.fechaSuscripcion 
	FROM  SUSCRIPCIONES AS s
    JOIN SUSCRIPCION_METODOLOGIA AS sm
    ON s.idSuscripcion=sm.idSuscripcionFK
	JOIN METODOLOGIA AS m 
	ON sm.idMetodologiaFK=m.idMetodologia
	JOIN USUARIOS AS u 
	JOIN CLIENTES AS c 
	ON u.idUsuario=c.idUsuarioFK 
	AND s.idClienteFK=c.idCliente
	WHERE u.numeroIdentificacion=NumiD;
END$$
DELIMITER ;

/*---------------SP PARA REGISTRAR LA PROGRAMACION ------------------------------*/

/*Procedimiento almacenado para llevar a cabo el registro de la programacion, 
esto teniendo en cuenta sus fechas de inicio y fin, 
ademas del numero de identificacion del usuario para que asi cada usuario tenga su programacion en el sisitema y 
realizar su correcta asistencia al gimansio*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarProgramacion`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarProgramacion` (	in fechaInicioPro DATE,
											in fechaFinPro DATE,
											in numid VARCHAR(25))
BEGIN
	INSERT INTO PROGRAMACION 
    SELECT MAX(idProgramacion) + 1 ,fechaInicioPro,fechaFinPro, 
    (SELECT idUsuario FROM USUARIOS WHERE numeroIdentificacion=numid) 
    FROM PROGRAMACION;
END$$
DELIMITER ;

/*---------------SP PARA REGISTRAR LA ASISTENCIA ------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarAsistencia`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarAsistencia` (in idAsis int,
										in idPro INT,
										in fechaHoraIngreso DATETIME,
										in fechaHoraSalida DATETIME)
BEGIN
	INSERT INTO ASISTENCIAS(idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK) 
    values (idAsis,fechaHoraIngreso,fechaHoraSalida,idPro);
END$$
DELIMITER ;

/*---------------SP PARA CONSULTAR LA ASISTENCIA DEL CLIENTE------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `consultarAsistenciaCliente`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarAsistenciaCliente` ()
BEGIN
	SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM ASISTENCIAS AS a
    JOIN PROGRAMACION AS p
	JOIN USUARIOS AS  u 
	JOIN CLIENTES AS c 
	ON  p.idProgramacion=a.idProgramacionFK
    AND u.idUsuario=p.idUsuarioFK 
	AND u.idUsuario=c.idUsuarioFK 
    WHERE c.idUsuarioFK=p.idUsuarioFK;
END$$
DELIMITER ;

Create view consultarAsistenciaCliente
as
SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM ASISTENCIAS AS a
    JOIN PROGRAMACION AS p
	JOIN USUARIOS AS  u 
	JOIN CLIENTES AS c 
	ON  p.idProgramacion=a.idProgramacionFK
    AND u.idUsuario=p.idUsuarioFK 
	AND u.idUsuario=c.idUsuarioFK 
    WHERE c.idUsuarioFK=p.idUsuarioFK;
    Select * from consultarAsistenciaCliente;



/*---------------SP PARA REGISTRAR PAGOS ------------------------------*/

/*Procedimiento almacenado para realizar el pago de la mensualidad del gimnasio, teniendo en cuenta el id de suscripcion*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarPagos`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarPagos` ( in fechaPago DATETIME,
									in ValorPago FLOAT,
                                    in descripcionPago VARCHAR(200),
                                    in urlSoportePago VARCHAR(500),
                                    in idSuscripcion int(100))
BEGIN
	INSERT INTO PAGOS 
    SELECT MAX(idPago) + 1,fechaPago,ValorPago,descripcionPago,urlSoportePago,idSuscripcion
    FROM PAGOS;
END$$
DELIMITER ;


/*---------------SP PARA CONSULTAR LA ASISTENCIA DEL INSTRUCTOR------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `consultarAsistenciaInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarAsistenciaInstructor` ()
BEGIN
	SELECT u.numeroIdentificacion, CONCAT(i.nombreInstructor ,' ', i.apellidoInstructor) AS 'Nombre Completo', a.fechaHoraIngreso, a.fechaHoraSalida 
	FROM ASISTENCIAS AS a
    JOIN PROGRAMACION AS p
	JOIN USUARIOS AS  u 
	JOIN INSTRUCTORES AS i
	ON  p.idProgramacion=a.idProgramacionFK
    AND u.idUsuario=p.idUsuarioFK 
	AND u.idUsuario=i.idUsuarioFK 
    WHERE i.idUsuarioFK=p.idUsuarioFK;
END$$
DELIMITER ;


/*---------------SP PARA REGISTRAR LA SERIE DE EJERCICIOS ------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarSerie`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarSerie` (	in nombreSerieEjercicio varchar(60), 
									in descripcionSerieEjercicio text,
                                    in repeticionEjercicio INT,
									in secuenciaEjercicio INT,
                                    in idMetodologiaFK INT)
BEGIN
	INSERT INTO SERIE_DE_EJERCICIO 
	SELECT MAX(idSerie) + 1,nombreSerieEjercicio,descripcionSerieEjercicio, repeticionEjercicio, secuenciaEjercicio, idMetodologiaFK 
	FROM SERIE_DE_EJERCICIO;
END$$
DELIMITER ;

/*Funciones Escalares*/

DROP FUNCTION IF EXISTS CantidadPagosCliente; 
DELIMITER $$ 
CREATE FUNCTION CantidadPagosCliente() 
RETURNS tinyint 
BEGIN 
DECLARE cantidadClientes int; 
set @cantidadClientes= (SELECT COUNT(DISTINCT idSuscripcionFK) From pagos); 
/*Select @cantidadClientes;*/
RETURN @cantidadClientes; 
END $$

/*PorcentajePagosCliente*/
DROP FUNCTION IF EXISTS PorcentajePagosCliente; 
DELIMITER $$ 
CREATE FUNCTION PorcentajePagosCliente() 
RETURNS float
BEGIN 
DECLARE cantidadClientes int; 
set @cantidadClientes= (SELECT COUNT(DISTINCT idSuscripcionFK) From pagos); 
set @Porcentaje=(@cantidadClientes*100/(Select count(*) From Clientes));
/*Select @Porcentaje;*/
/*Select @cantidadClientes;*/
RETURN @Porcentaje; 
END $$
Select PorcentajePagosCliente() AS 'Porcentaje de los pagos';
Select CantidadPagosCliente();
select CantidadPagosCliente() as 'Cantidad de los clientes que han pagado';