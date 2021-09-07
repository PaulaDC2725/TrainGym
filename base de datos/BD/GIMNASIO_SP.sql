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

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `validar_login2`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `validar_login2` (in NumiD VARCHAR(15))
BEGIN
	SELECT idRolFK 
	FROM USUARIOS 
	WHERE NumeroIdentificacion= Numid;
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
	FROM  Suscripciones AS s
	JOIN Metodologia AS m 
	ON s.idMetodologiaFK=m.idMetodologia
	JOIN Usuarios AS u 
	JOIN Clientes AS c 
	ON u.idUsuario=c.idUsuarioFK 
	AND s.idClienteFK=c.idCliente
	WHERE u.numeroIdentificacion=NumiD;
END$$
DELIMITER ;

CALL consultarSuscripcion('1001299203');

/*---------------SP PARA REGISTRAR LA PROGRAMACION ------------------------------*/

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

CALL registrarProgramacion('2021-08-04','2021-09-10','1001299203');

/*---------------SP PARA REGISTRAR LA ASISTENCIA ------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarAsistencia`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarAsistencia` (in fechaHoraIngreso DATETIME,
										in fechaHoraSalida DATETIME,
                                        in numid VARCHAR(25))
BEGIN
	INSERT INTO ASISTENCIAS 
    SELECT MAX(idAsistencia) + 1,fechaHoraIngreso,fechaHoraSalida,(SELECT MAX(idProgramacion)FROM PROGRAMACION)
    FROM ASISTENCIAS AS a 
    JOIN PROGRAMACION AS p  
    JOIN USUARIOS AS u 
    ON a.idProgramacionFK=p.idProgramacion AND p.idUsuarioFK=u.idUsuario
    WHERE u.numeroIdentificacion=numid;
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

CALL consultarAsistenciaCliente();


/*---------------SP PARA REGISTRAR PAGOS ------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarPagos`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarPagos` ( in fechaPago DATETIME,
									in ValorPago FLOAT,
                                    in descripcionPago VARCHAR(200),
                                    in urlSoportePago VARCHAR(500))
BEGIN
	INSERT INTO PAGOS 
    SELECT MAX(idPago) + 1,fechaPago,ValorPago,descripcionPago,urlSoportePago,(SELECT MAX(idSuscripcion) FROM SUSCRIPCIONES)
    FROM PAGOS;
END$$
DELIMITER ;

CALL registrarPagos('2021-09-08',50.585,'Pago del mes de Septiembre','www.urldepagodeseptiembredenombreyapellido.com');

SELECT * FROM PAGOS;

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

CALL consultarAsistenciaInstructor();

/*NO ESTAN EJECUTADOS*/

/*---------------SP PARA REGISTRAR LA SERIE DE EJERCICIOS ------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `registrarSerie`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarSerie` (	in nombreSerieEjercicio varchar(60), 
									in descripcionSerieEjercicio text)
BEGIN
	INSERT INTO SERIE_DE_EJERCICIO 
	SELECT MAX(idSerie) + 1,nombreSerieEjercicio,descripcionSerieEjercicio 
	FROM SERIE_DE_EJERCICIO;
END$$
DELIMITER ;

/*---------------SP PARA CONSULTAR LA SERIE DE EJERCICIOS ------------------------------*/

USE `gimnasiobd`;
DROP PROCEDURE IF EXISTS `consultarSerieEjercicio`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarSerieEjercicio` ()
BEGIN
	SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', s.idSerie, s.nombreSerieEjercicio, s.descripcionSerieEjercicio
	FROM SERIE_DE_EJERCICIO AS s
	JOIN TIPO_RUTINAS_EJERCICIO AS t
    JOIN EJERCICIOS AS e
    JOIN IMAGENES AS i
    JOIN SUSCRIPCIONES_EJERCICIO AS se
    JOIN SUSCRIPCIONES AS sp
	JOIN CLIENTES AS c
    JOIN USUARIOS AS u
	ON  c.idCliente=sp.idClienteFK
    AND u.idUsuario=c.idClienteFK;
END$$
DELIMITER ;

CALL consultarSerieEjercicio();
