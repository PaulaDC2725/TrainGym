CREATE DATABASE GIMNASIOBD;
USE GIMNASIOBD;
/*DROP DATABASE GIMNASIOBD;*/

/*CREACION TABLA ROL*/
CREATE TABLE ROL(
	idRol INT(12) NOT NULL,
	nombreRol VARCHAR(20) NOT NULL
);

/*CREACION TABLA TIPO IDENTIFICACION*/
CREATE TABLE TIPO_IDENTIFICACION(
	idTipoDocumento INT(12) NOT NULL,
	nombreDocumento VARCHAR(25) NOT NULL
);

/*CREACION TABLA USUARIOS*/
CREATE TABLE USUARIOS(
	idUsuario INT(12) NOT NULL,
	NumeroIdentificacion VARCHAR(12) NOT NULL ,
	passwordUsuario VARCHAR(20) NOT NULL,
	estadoUsuario INT NOT NULL,
	idRolFK INT(12) NOT NULL,
	idTipoDocumentoFK INT(12) NOT NULL
);

/*CREACION TABLA INSTRUCTORES*/
CREATE TABLE INSTRUCTORES(
	idInstructor INT(12) NOT NULL ,
    nombreInstructor VARCHAR(35) NOT NULL,
    apellidoInstructor VARCHAR(35) NOT NULL,
    correoInstructor VARCHAR(100) NOT NULL,
    telefonoInstructor VARCHAR(11) NOT NULL,
    estadoInstructor INT NOT NULL, 
    idUsuarioFK INT(12) NOT NULL 
);

/*CREACION TABLA CLIENTES*/
CREATE TABLE CLIENTES(
	idCliente INT(12) NOT NULL ,
    nombreCliente VARCHAR(35) NOT NULL,
    apellidoCliente VARCHAR(35) NOT NULL,
    fechaNacimientoCliente DATE NOT NULL,
    correoCliente VARCHAR(100) NOT NULL,
    telefonoCliente VARCHAR(11) NOT NULL,
    estadoCliente INT NOT NULL, 
    idUsuarioFK INT(12) NOT NULL
);

/*CREACION TABLA PROGRAMACION*/
CREATE TABLE PROGRAMACION(
	idProgramacion INT(12) NOT NULL ,
	fechaInicioPro DATE NOT NULL,
    fechaFinPro DATE NOT NULL,
    idUsuarioFK INT(12) NOT NULL
);

/*CREACION TABLA ASISTENCIA*/
CREATE TABLE ASISTENCIAS(
	idAsistencia INT(12) NOT NULL,
    fechaAsistencia DATE NOT NULL
);

/*CREACION TABLA PROGRAMACION ASISTENCIA*/
CREATE TABLE PROGRAMACION_ASISTENCIA(
	idProgramacionFK INT(12) NOT NULL,
    idAsistenciaFK INT(12) NOT NULL,
    horaIngreso DATETIME NOT NULL,
    horaSalida DATETIME NOT NULL
);

/*CREACION TABLA HORARIOS*/
CREATE TABLE HORARIOS(
	idHorario INT(12) NOT NULL,
    horaInicioHorario DATETIME NOT NULL,
    horaFinHorario DATETIME NOT NULL,
    semanaDiaHorario VARCHAR(10) NOT NULL,
    aforoHorario INT(2) NOT NULL
);

/*CREACION TABLA PROGRAMACION HORARIO*/
CREATE TABLE PROGRAMACION_HORARIO(
	idProgramacionFK INT(12) NOT NULL,
    idHorarioFK INT(12) NOT NULL
);

/*CREACION TABLA METODOLOGIA*/
CREATE TABLE METODOLOGIA(
	idMetodologia INT(12) NOT NULL,
    nombreMetodologia VARCHAR(50) NOT NULL
);

/*CREACION TABLA SUSCRIPCIONES*/
CREATE TABLE SUSCRIPCIONES(
	idSuscripcion INT(12) NOT NULL,
    valorSuscripcion FLOAT NOT NULL,
    fechaSuscripcion DATE NOT NULL,
    estadoSuscripcion INT NOT NULL,
    idClienteFK INT(12) NOT NULL,
    idMetodologiaFK INT(12) NOT NULL
);

/*CREACION TABLA PAGOS*/
CREATE TABLE PAGOS(
	idPago INT(12) NOT NULL,
    fechaPago DATE NOT NULL,
    valorPago FLOAT NOT NULL,
    descripcionPago VARCHAR(200) NOT NULL,
    urlSoportePago VARCHAR(500) NOT NULL,
    idSuscripcionFK INT(12) NOT NULL
);

/*CREACION TABLA TIPO NOVEDAD*/
CREATE TABLE TIPO_NOVEDAD(
	idTipoNov INT(12) NOT NULL,
    nombreNovedad VARCHAR(35) NOT NULL
);

/*CREACION TABLA NOVEDAD*/
CREATE TABLE NOVEDAD(
	idNovedad INT(12) NOT NULL,
    fechaNovedad DATE NOT NULL,
    descripcionNovedad VARCHAR(200) NOT NULL,
    idSuscripcionFK INT(12) NOT NULL,
    idTipoNovFK INT(12) NOT NULL
);


/*CREACION TABLA FICHA ANTROPOMETRICA*/
CREATE TABLE FICHA_ANTROPOMETRICA(
	idFicha INT(12) NOT NULL,
    fechaFicha DATE NOT NULL,
    EstaturaCliente FLOAT NOT NULL,
    pesoCliente FLOAT NOT NULL,
    descripcionFicha VARCHAR(200) NOT NULL,
    idSuscripcionFK INT(12) NOT NULL
);

/*CREACION TABLA PARTES DEL CUERPO*/
CREATE TABLE PARTE_DEL_CUERPO(
	idParteDelCuerpo INT(12) NOT NULL,
    nombreParteCuerpo VARCHAR(35) NOT NULL
);


/*CREACION TABLA FICHA MEDIDAS*/
CREATE TABLE FICHA_MEDIDA(
	idFichaFK INT(12) NOT NULL,
    idParteDelCuerpoFK INT(12) NOT NULL,
    medida FLOAT NOT NULL
);

/*CREACION TABLA EJERCICIOS*/
CREATE TABLE EJERCICIOS(
	idEjercicio INT(12) NOT NULL,
    nombreEjercicio VARCHAR(50) NOT NULL,
    idParteDelCuerpo INT(12) NOT NULL
);

/*CREACION TABLA SUSCRIPCIONES EJERCICIOS*/
CREATE TABLE SUSCRIPCIONES_EJERCICIO(
	idEjercicioFK INT(12) NOT NULL,
    idSuscripcionFK INT(12) NOT NULL,
    fechaInicio DATE NOT NULL,
    fechaFin DATE NOT NULL,
    repeticionEjercicio INT(2) NOT NULL,
    secuenciaEjercicio INT(2) NOT NULL
);

/*CREACION TABLA IMAGENES*/
CREATE TABLE IMAGENES(
	idImagen INT(12) NOT NULL,
    urlImagen VARCHAR(500) NOT NULL,
    descripcionImagen VARCHAR(300) NOT NULL,
    idEjercicioFK INT(12) NOT NULL
);

/*CREACION TABLA SERIES DE EJERCICIO*/
CREATE TABLE SERIE_DE_EJERCICIO(
	idSerie INT(12) NOT NULL,
    nombreSerieEjercicio VARCHAR(50) NOT NULL,
    descripcionSerieEjercicio VARCHAR(300) NOT NULL
);

/*CREACION TABLA TIPO DE RUTINAS DE EJERCICIO*/
CREATE TABLE TIPO_RUTINAS_EJERCICIO(
	idEjercicioFK INT(12) NOT NULL,
    idSerieFK INT(12) NOT NULL
);


/*INDICES DE TABLA USUARIOS*/
ALTER TABLE USUARIOS
ADD PRIMARY KEY (idUsuario),
ADD  KEY  FK_idTipoDocumentoFK_USUARIOS_idx (idTipoDocumentoFK),
ADD  KEY  FK_idRolFK_USUARIOS_idx (idRolFK);

/*INDICES DE TABLA ROL*/
ALTER TABLE ROL
ADD PRIMARY KEY (idRol);

/*INDICES DE TABLA TIPO IDENTIFICACION*/
ALTER TABLE TIPO_IDENTIFICACION
ADD PRIMARY KEY (idTipoDocumento);

/*INDICES DE TABLA INSTRUCTORES*/
ALTER TABLE INSTRUCTORES
ADD PRIMARY KEY (idInstructor),
ADD  KEY  FK_idUsuarioFK_INSTRUCTORES_idx (idUsuarioFK);

/*INDICES DE TABLA CLIENTES*/
ALTER TABLE CLIENTES
ADD PRIMARY KEY (idCliente),
ADD  KEY  FK_idUsuarioFK_CLIENTES_idx (idUsuarioFK);

/*INDICES DE TABLA PROGRAMACION*/
ALTER TABLE PROGRAMACION
ADD PRIMARY KEY (idProgramacion),
ADD  KEY  FK_idUsuarioFK_PROGRAMACION_idx (idUsuarioFK);

/*INDICES DE TABLA ASISTENCIAS*/
ALTER TABLE ASISTENCIAS
ADD PRIMARY KEY (idAsistencia);

/*INDICES DE TABLA PROGRAMACION_ASISTENCIA*/
ALTER TABLE PROGRAMACION_ASISTENCIA
ADD PRIMARY KEY (idProgramacionFK,idAsistenciaFK),
ADD  KEY  FK_idProgramacionFK_PROGRAMACION_ASISTENCIA_idx (idProgramacionFK),
ADD  KEY  FK_idAsistenciaFK_PROGRAMACION_ASISTENCIA_idx (idAsistenciaFK);

/*INDICES DE TABLA HORARIOS*/
ALTER TABLE HORARIOS
ADD PRIMARY KEY (idHorario);

/*INDICES DE TABLA PROGRAMACION_HORARIO*/
ALTER TABLE PROGRAMACION_HORARIO
ADD PRIMARY KEY (idProgramacionFK,idHorarioFK),
ADD  KEY  FK_idProgramacionFK_PROGRAMACION_HORARIO_idx (idProgramacionFK),
ADD  KEY  FK_idHorarioFK_PROGRAMACION_HORARIO_idx (idHorarioFK);

/*INDICES DE TABLA METODOLOGIA*/
ALTER TABLE METODOLOGIA
ADD PRIMARY KEY (idMetodologia);

/*INDICES DE TABLA SUSCRIPCIONES*/
ALTER TABLE SUSCRIPCIONES
ADD PRIMARY KEY (idSuscripcion),
ADD  KEY  FK_idMetodologiaFK_SUSCRIPCIONES_idx (idMetodologiaFK),
ADD  KEY  FK_idClienteFK_SUSCRIPCIONES_idx (idClienteFK);

/*INDICES DE TABLA PAGOS*/
ALTER TABLE PAGOS
ADD PRIMARY KEY (idPago),
ADD  KEY  FK_idSuscripcionFK_PAGOS_idx (idSuscripcionFK);

/*INDICES DE TABLA TIPO DE NOVEDAD*/
ALTER TABLE TIPO_NOVEDAD
ADD PRIMARY KEY (idTipoNov);

/*INDICES DE TABLA NOVEDAD*/
ALTER TABLE NOVEDAD
ADD PRIMARY KEY (idNovedad),
ADD  KEY  FK_idSuscripcionFK_NOVEDAD_idx (idSuscripcionFK),
ADD  KEY  FK_idTipoNovFK_NOVEDAD_idx (idTipoNovFK);

/*INDICES DE TABLA FICHA_ANTROPOMETRICA*/
ALTER TABLE FICHA_ANTROPOMETRICA
ADD PRIMARY KEY (idFicha),
ADD  KEY  FK_idSuscripcionFK_FICHA_ANTROPOMETRICA_idx (idSuscripcionFK);

/*INDICES DE TABLA PARTES DEL CUERPO*/
ALTER TABLE PARTE_DEL_CUERPO
ADD PRIMARY KEY (idParteDelCuerpo);

/*INDICES DE TABLA FICHA_MEDIDA*/
ALTER TABLE FICHA_MEDIDA
ADD PRIMARY KEY (idFichaFK,idParteDelCuerpoFK),
ADD  KEY  FK_idFichaFK_FICHA_MEDIDA_idx (idFichaFK),
ADD  KEY  FK_idParteDelCuerpoFK_FICHA_MEDIDA_idx (idParteDelCuerpoFK);

/*INDICES DE TABLA EJERCICIOS*/
ALTER TABLE EJERCICIOS
ADD PRIMARY KEY (idEjercicio);

/*INDICES DE TABLA SUSCRIPCIONES_EJERCICIO*/
ALTER TABLE SUSCRIPCIONES_EJERCICIO
ADD PRIMARY KEY (idSuscripcionFK,idEjercicioFK),
ADD  KEY  FK_idSuscripcionFK_SUSCRIPCIONES_EJERCICIO_idx (idSuscripcionFK),
ADD  KEY  FK_idEjercicioFK_SUSCRIPCIONES_EJERCICIO_idx (idEjercicioFK);

/*INDICES DE TABLA IMAGENES*/
ALTER TABLE IMAGENES
ADD PRIMARY KEY (idImagen),
ADD  KEY  FK_idEjercicioFK_IMAGENES_idx (idEjercicioFK);

/*INDICES DE TABLA SERIE_DE_EJERCICIO*/
ALTER TABLE SERIE_DE_EJERCICIO
ADD PRIMARY KEY (idSerie);

/*INDICES DE TABLA TIPO_RUTINAS_EJERCICIO*/
ALTER TABLE TIPO_RUTINAS_EJERCICIO
ADD PRIMARY KEY (idSerieFK,idEjercicioFK),
ADD  KEY  FK_idSerieFK_TIPO_RUTINAS_EJERCICIO_idx (idSerieFK),
ADD  KEY  FK_idEjercicioFK_TIPO_RUTINAS_EJERCICIO_idx (idEjercicioFK);

/*FILTROS PARA LA TABLA USUARIOS*/
ALTER TABLE USUARIOS
ADD CONSTRAINT FK_idTipoDocumentoFK_USUARIOS FOREIGN KEY (idTipoDocumentoFK)
REFERENCES TIPO_IDENTIFICACION (idTipoDocumento) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idRolFK_USUARIOS FOREIGN KEY (idRolFK)
REFERENCES ROL (idRol) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA INSTRUCTORES*/
/*drop table if exists INSTRUCTORES;*/
ALTER TABLE INSTRUCTORES
ADD CONSTRAINT FK_idUsuarioFK_INSTRUCTORES FOREIGN KEY (idUsuarioFK)
REFERENCES USUARIOS (idUsuario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PROGRAMACION*/
ALTER TABLE PROGRAMACION
ADD CONSTRAINT FK_idUsuarioFK_PROGRAMACION FOREIGN KEY (idUsuarioFK)
REFERENCES USUARIOS (idUsuario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA CLIENTES*/
ALTER TABLE CLIENTES
ADD CONSTRAINT FK_idUsuarioFK_CLIENTES FOREIGN KEY (idUsuarioFK)
REFERENCES USUARIOS (idUsuario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PROGRAMACION_ASISTENCIA*/
ALTER TABLE PROGRAMACION_ASISTENCIA
ADD CONSTRAINT FK_idProgramacionFK_PROGRAMACION_ASISTENCIA FOREIGN KEY (idProgramacionFK)
REFERENCES PROGRAMACION (idProgramacion) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idAsistenciaFK_PROGRAMACION_ASISTENCIA FOREIGN KEY (idAsistenciaFK)
REFERENCES ASISTENCIAS (idAsistencia) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PROGRAMACION_HORARIO*/
ALTER TABLE PROGRAMACION_HORARIO
ADD CONSTRAINT FK_idProgramacionFK_PROGRAMACION_HORARIO FOREIGN KEY (idProgramacionFK)
REFERENCES PROGRAMACION (idProgramacion) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idHorarioFK_PROGRAMACION_HORARIO FOREIGN KEY (idHorarioFK)
REFERENCES HORARIOS (idHorario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA SUSCRIPCIONES*/
ALTER TABLE SUSCRIPCIONES
ADD CONSTRAINT FK_idMetodologiaFK_SUSCRIPCIONES FOREIGN KEY (idMetodologiaFK)
REFERENCES METODOLOGIA (idMetodologia) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idClienteFK_SUSCRIPCIONES FOREIGN KEY (idClienteFK)
REFERENCES CLIENTES (idCliente) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PAGOS*/
ALTER TABLE PAGOS
ADD CONSTRAINT FK_idSuscripcionFK_PAGOS FOREIGN KEY (idSuscripcionFK)
REFERENCES SUSCRIPCIONES (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA NOVEDAD*/
ALTER TABLE NOVEDAD
ADD CONSTRAINT FK_idSuscripcionFK_NOVEDAD FOREIGN KEY (idSuscripcionFK)
REFERENCES SUSCRIPCIONES (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idTipoNovFK_NOVEDAD FOREIGN KEY (idTipoNovFK)
REFERENCES TIPO_NOVEDAD (idTipoNov) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA FICHA_ANTROPOMETRICA*/
ALTER TABLE FICHA_ANTROPOMETRICA
ADD CONSTRAINT FK_idSuscripcionFK_FICHA_ANTROPOMETRICA FOREIGN KEY (idSuscripcionFK)
REFERENCES SUSCRIPCIONES (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA FICHA_MEDIDA*/
ALTER TABLE FICHA_MEDIDA
ADD CONSTRAINT FK_idFichaFK_FICHA_MEDIDA FOREIGN KEY (idFichaFK)
REFERENCES FICHA_ANTROPOMETRICA (idFicha) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idParteDelCuerpoFK_FICHA_MEDIDA FOREIGN KEY (idParteDelCuerpoFK)
REFERENCES PARTE_DEL_CUERPO (idParteDelCuerpo) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA SUSCRIPCIONES_EJERCICIO*/
ALTER TABLE SUSCRIPCIONES_EJERCICIO
ADD CONSTRAINT FK_idSuscripcionFK_SUSCRIPCIONES_EJERCICIO FOREIGN KEY (idSuscripcionFK)
REFERENCES SUSCRIPCIONES (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idEjercicioFK_SUSCRIPCIONES_EJERCICIO FOREIGN KEY (idEjercicioFK)
REFERENCES EJERCICIOS (idEjercicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA IMAGENES*/
ALTER TABLE IMAGENES
ADD CONSTRAINT FK_idEjercicioFK_IMAGENES FOREIGN KEY (idEjercicioFK)
REFERENCES EJERCICIOS (idEjercicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA TIPO_RUTINAS_EJERCICIO*/
ALTER TABLE TIPO_RUTINAS_EJERCICIO
ADD CONSTRAINT FK_idSerieFK_TIPO_RUTINAS_EJERCICIO FOREIGN KEY (idSerieFK)
REFERENCES SERIE_DE_EJERCICIO (idSerie) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idEjercicioFK_TIPO_RUTINAS_EJERCICIO FOREIGN KEY (idEjercicioFK)
REFERENCES EJERCICIOS (idEjercicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*VALORES UNICOS PARA LA TABLA INSTRUCTORES*/
CREATE UNIQUE INDEX INDICE1 ON INSTRUCTORES (correoInstructor);
CREATE UNIQUE INDEX INDICE2 ON INSTRUCTORES (telefonoInstructor);
CREATE UNIQUE INDEX INDICE3 ON INSTRUCTORES (idInstructor);
CREATE UNIQUE INDEX INDICE4 ON INSTRUCTORES (idUsuarioFK);

/*VALORES UNICOS PARA LA TABLA CLIENTES*/
CREATE UNIQUE INDEX INDICE5 ON CLIENTES (correoCliente);
CREATE UNIQUE INDEX INDICE7 ON CLIENTES (telefonoCliente);
CREATE UNIQUE INDEX INDICE8 ON CLIENTES (idCliente);
CREATE UNIQUE INDEX INDICE9 ON CLIENTES (idUsuarioFK);

/*VALORES UNICOS PARA LA TABLA USUARIOS*/
CREATE UNIQUE INDEX INDICE10 ON USUARIOS (NumeroIdentificacion);

/*REGISTROS*/
USE GIMNASIOBD;

/*TABLA ROL*/
INSERT INTO ROL (idRol,nombreRol) VALUES (1,'Recepcionista');
INSERT INTO ROL (idRol,nombreRol) VALUES (2,'Instructor');
INSERT INTO ROL (idRol,nombreRol) VALUES (3,'Cliente');

SELECT * FROM ROL;

/*TABLA TIPO IDENTIFICACION*/
INSERT INTO TIPO_IDENTIFICACION (idTipoDocumento,nombreDocumento) VALUES (1,'Cedula de cuidadania');
INSERT INTO TIPO_IDENTIFICACION (idTipoDocumento,nombreDocumento) VALUES (2,'Tarjeta de identidad');
INSERT INTO TIPO_IDENTIFICACION (idTipoDocumento,nombreDocumento) VALUES (3,'Cedula extranjera');
INSERT INTO TIPO_IDENTIFICACION (idTipoDocumento,nombreDocumento) VALUES (4,'Pasaporte');

SELECT * FROM TIPO_IDENTIFICACION;

/*TABLA USUARIOS*/
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (1,1000216054,'dani123',1,1,1);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (2,1000713178,'andrea12334',1,2,1);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (3,1004529469,'ana890',1,2,2);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK)
VALUES (4,1000213057,'Maria789',1,3,2);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (5,1001299203,'5657paula',1,3,1);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (6,1028481864,'prueba234',1,3,4);

SELECT * FROM USUARIOS;

/*TABLA INSTRUCTORES*/
INSERT INTO INSTRUCTORES (idInstructor,nombreInstructor,apellidoInstructor,correoInstructor,telefonoInstructor,estadoInstructor,idUsuarioFK)
VALUES (1,'Andrea','Sastoque','andreas@gmail.com',321348028,1,2);
INSERT INTO INSTRUCTORES (idInstructor,nombreInstructor,apellidoInstructor,correoInstructor,telefonoInstructor,estadoInstructor,idUsuarioFK)
VALUES (2,'Ana Maria','Valencia','anaMaria@gmail.com',300535096,1,3);

SELECT * FROM INSTRUCTORES;

/*TABLA CLIENTES*/
INSERT INTO CLIENTES (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (1,'Maria','Castillo','2002-05-12','mariacastillo@hotmail.com',302455687,1,4);
INSERT INTO CLIENTES (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (2,'Paula Catalina','Delgado','2002-09-12','kimikta45@gmail.com',312361710,1,5);
INSERT INTO CLIENTES (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (3,'Valentina','Prueba','2000-02-25','prueba@hotmail.com',300230005,1,6);

SELECT * FROM CLIENTES;

/*TABLA PROGRAMACION*/
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (1,'2021-06-28','2021-07-04',2);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (2,'2021-07-05','2021-07-11',3);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (3,'2021-07-12','2021-07-18',4);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (4,'2021-09-19','2021-09-25',5);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (5,'2021-06-28','2021-07-04',6);

SELECT * FROM PROGRAMACION;

/*TABLA ASISTENCIAS*/
INSERT INTO ASISTENCIAS (idAsistencia,fechaAsistencia)
VALUES (1,'2021-06-28');
INSERT INTO ASISTENCIAS (idAsistencia,fechaAsistencia)
VALUES (2,'2021-07-04');
INSERT INTO ASISTENCIAS (idAsistencia,fechaAsistencia)
VALUES (3,'2021-07-05');
INSERT INTO ASISTENCIAS (idAsistencia,fechaAsistencia)
VALUES (4,'2002-09-12');

SELECT * FROM ASISTENCIAS;

/*TABLA PROGRAMACION_ASISTENCIA*/
INSERT INTO PROGRAMACION_ASISTENCIA (idProgramacionFK,idAsistenciaFK,horaIngreso,horaSalida)
VALUES (1,1,'2021-06-28 08:10','2021-06-28 09:10');
INSERT INTO PROGRAMACION_ASISTENCIA (idProgramacionFK,idAsistenciaFK,horaIngreso,horaSalida)
VALUES (2,2,'2021-07-04 18:15','2021-07-04 19:15');
INSERT INTO PROGRAMACION_ASISTENCIA (idProgramacionFK,idAsistenciaFK,horaIngreso,horaSalida)
VALUES (4,3,'2021-07-05 06:00','2021-07-05 07:00');
INSERT INTO PROGRAMACION_ASISTENCIA (idProgramacionFK,idAsistenciaFK,horaIngreso,horaSalida)
VALUES (3,4,'2002-09-12 10:35','2002-09-12 11:55');

SELECT * FROM  PROGRAMACION_ASISTENCIA;

/*TABLA HORARIOS*/
INSERT INTO HORARIOS (idHorario,horaInicioHorario,horaFinHorario,semanaDiaHorario,aforoHorario)
VALUES (1,'2021-06-29 06:00','2021-06-29 02:00','Martes',7);
INSERT INTO HORARIOS (idHorario,horaInicioHorario,horaFinHorario,semanaDiaHorario,aforoHorario)
VALUES (2,'2021-06-29 02:00','2021-06-29 22:00','Martes',7);
INSERT INTO HORARIOS (idHorario,horaInicioHorario,horaFinHorario,semanaDiaHorario,aforoHorario)
VALUES (3,'2021-06-30 06:00','2021-06-30 02:00','Miercoles',7);
INSERT INTO HORARIOS (idHorario,horaInicioHorario,horaFinHorario,semanaDiaHorario,aforoHorario)
VALUES (4,'2021-06-30 02:00','2021-06-30 22:00','Moercoles',7);

SELECT * FROM HORARIOS;

/*TABLA PROGRAMACION_HORARIO*/
INSERT INTO PROGRAMACION_HORARIO (idProgramacionFK,idHorarioFK)
VALUES (1,1);
INSERT INTO PROGRAMACION_HORARIO (idProgramacionFK,idHorarioFK)
VALUES (2,3);
INSERT INTO PROGRAMACION_HORARIO (idProgramacionFK,idHorarioFK)
VALUES (3,2);
INSERT INTO PROGRAMACION_HORARIO (idProgramacionFK,idHorarioFK)
VALUES (4,4);

SELECT * FROM PROGRAMACION_HORARIO;

/*TABLA METODOLOGIA*/
INSERT INTO METODOLOGIA (idMetodologia,nombreMetodologia)
VALUES (1,'Disminuir de peso');
INSERT INTO METODOLOGIA (idMetodologia,nombreMetodologia)
VALUES (2,'Aumentar masa muscular');
INSERT INTO METODOLOGIA (idMetodologia,nombreMetodologia)
VALUES (3,'2X1');

SELECT * FROM METODOLOGIA;

/*TABLA SUSCRIPCIONES*/
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,idClienteFK,idMetodologiaFK)
VALUES (1,39.900,'2021-06-29',1,3,2);
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,idClienteFK,idMetodologiaFK)
VALUES (2,79.800,'2021-06-30',1,2,1);
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,idClienteFK,idMetodologiaFK)
VALUES (3,39.900,'2021-06-29',1,1,2);


SELECT * FROM SUSCRIPCIONES;

/*TABLA PAGOS*/
INSERT INTO PAGOS (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (1,'2021-06-29',19.950,'Pago por un mes, con NOVEDAD','www.pagonumero1.com',1);
INSERT INTO PAGOS (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (2,'2021-06-30',79.800,'Pago por dos meses','www.pagonumero2.com',2);
INSERT INTO PAGOS (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (3,'2021-06-29',39.900,'Pago por un mes','www.pagonumero2.com',3);

SELECT * FROM PAGOS;

/*TABLA TIPO_NOVEDAD*/
INSERT INTO TIPO_NOVEDAD (idTipoNov,nombreNovedad)
VALUES (1,'Pago a dos cuotas');
INSERT INTO TIPO_NOVEDAD (idTipoNov,nombreNovedad)
VALUES (2,'Pago completo');
INSERT INTO TIPO_NOVEDAD (idTipoNov,nombreNovedad)
VALUES (3,'Pago por adelantado');

SELECT * FROM TIPO_NOVEDAD;

/*TABLA NOVEDAD*/
INSERT INTO NOVEDAD (idNovedad,fechaNovedad,descripcionNovedad,idSuscripcionFK,idTipoNovFK)
VALUES (1,'2021-06-29','Realizo la mitad del pago para el mes de julio',1,1);
INSERT INTO NOVEDAD (idNovedad,fechaNovedad,descripcionNovedad,idSuscripcionFK,idTipoNovFK)
VALUES (2,'2021-06-30','Realizo el pago correspondiente al mes de julio y agosto',2,3);

SELECT * FROM NOVEDAD;

/*TABLA FICHA_ANTROPOMETRICA*/
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (1,'2021-06-29',1.65,56,'Sin novedad',1);
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (2,'2021-06-30',1.81,74.3,'Tiene lesion rodilla derecha',2);
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (3,'2021-06-29',1.54,50,'Sin novedad',3);

SELECT * FROM FICHA_ANTROPOMETRICA;

/*TABLA PARTE_DEL_CUERPO*/
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (1,'Cabeza');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (2,'Cintura');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (3,'Biceps');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (4,'Pecho');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (5,'Pierna');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (6,'Craneo');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (7,'Bicep Derecho');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (8,'Bicep Izquierdo');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (9,'Muslo Derecho');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (10,'Muslo Izquierdo');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (11,'Cintura');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (12,'Brazo Derecho');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (13,'Brazo Izquierdo');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (14,'Pierna Derecha');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (15,'Pierna Izquierda');


SELECT * FROM PARTE_DEL_CUERPO;

/*TABLA FICHA_MEDIDA*/
INSERT INTO FICHA_MEDIDA (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,2,65.2);
INSERT INTO FICHA_MEDIDA (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (2,1,40);
INSERT INTO FICHA_MEDIDA (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,4,74.6);

SELECT * FROM FICHA_MEDIDA;

/*TABLA EJERCICIOS*/
INSERT INTO EJERCICIOS (idEjercicio,nombreEjercicio,idParteDelCuerpo)
VALUES (1,'Sentadilla',5);
INSERT INTO EJERCICIOS (idEjercicio,nombreEjercicio,idParteDelCuerpo)
VALUES (2,'Movientos circulares',1);
INSERT INTO EJERCICIOS (idEjercicio,nombreEjercicio,idParteDelCuerpo)
VALUES (3,'Low Plank',4);
INSERT INTO EJERCICIOS (idEjercicio,nombreEjercicio,idParteDelCuerpo)
VALUES (4,'Leg Raises',5);
INSERT INTO EJERCICIOS (idEjercicio,nombreEjercicio,idParteDelCuerpo)
VALUES (5,'Inchworms',3);

SELECT * FROM EJERCICIOS;

/*TABLA SUSCRIPCIONES_EJERCICIO*/
INSERT INTO SUSCRIPCIONES_EJERCICIO (idEjercicioFK,idSuscripcionFK,fechaInicio,fechaFin,repeticionEjercicio,secuenciaEjercicio)
VALUES (2,1,'2021-06-29','2021-07-29',2,3);
INSERT INTO SUSCRIPCIONES_EJERCICIO (idEjercicioFK,idSuscripcionFK,fechaInicio,fechaFin,repeticionEjercicio,secuenciaEjercicio)
VALUES (4,2,'2021-06-30','2021-07-30',2,3);
INSERT INTO SUSCRIPCIONES_EJERCICIO (idEjercicioFK,idSuscripcionFK,fechaInicio,fechaFin,repeticionEjercicio,secuenciaEjercicio)
VALUES (5,3,'2021-06-29','2021-07-29',2,3);

SELECT * FROM SUSCRIPCIONES_EJERCICIO;

/*TABLA IMAGENES*/
INSERT INTO IMAGENES (idImagen,urlImagen,descripcionImagen,idEjercicioFK)
VALUES (1,'www.imagen1.com','Se debe realizar con una correcta postura, sin sobrepasar la punta del pie',1);
INSERT INTO IMAGENES (idImagen,urlImagen,descripcionImagen,idEjercicioFK)
VALUES (2,'www.imagen2.com','Se debe realizar de pie, correcta postura y lentamente',2);
INSERT INTO IMAGENES (idImagen,urlImagen,descripcionImagen,idEjercicioFK)
VALUES (3,'www.imagen3.com','Espalda totalmente en el piso y levantar lo mas recto que se pueda mabos pies',4);

SELECT * FROM IMAGENES;

/*TABLA SERIE_DE_EJERCICIO*/
INSERT INTO SERIE_DE_EJERCICIO (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio)
VALUES (1,'Hit','Realizar los ejercicios propuestos');

SELECT * FROM SERIE_DE_EJERCICIO;

/*TABLA TIPO_RUTINAS_EJERCICIO*/
INSERT INTO TIPO_RUTINAS_EJERCICIO(idEjercicioFK,idSerieFK)
VALUES (1,1);

SELECT * FROM TIPO_RUTINAS_EJERCICIO;


/*PROCEDIMIENTOS ALMACENADOS*/
/*Procedimiento para la  validación del Login*/
USE `gimnasiobd`;
DROP procedure IF EXISTS `validar_login`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `validar_login` (IN `usuario` int(12), 
IN `password` VARCHAR(25), IN `rol` int(12), IN `estado` INT(1))
BEGIN
SELECT COUNT(*) AS RESULTADO FROM USUARIOS WHERE NumeroIdentificacion=usuario AND passwordUsuario=password AND idRolFK=rol AND estadoUsuario=estado;
END$$
DELIMITER;
/*Procedimiento para registrar clientes*/
USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarCliente`;
DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarCliente`  (	in nombrec VARCHAR(35), 
                                        in apellidoc VARCHAR(35),
                                        in fnacimientoc DATE,
                                        in correoc VARCHAR(100),
                                        in telefonoc VARCHAR(11),
                                        in estadoc INT)
BEGIN
INSERT INTO CLIENTES SELECT MAX(idCliente) + 1,nombrec,apellidoc,fnacimientoc,correoc,telefonoc,estadoc,(SELECT MAX(idUsuario)FROM USUARIOS)FROM CLIENTES;
END$$

DELIMITER ;

/*Procedimiento para consultar los instructores*/
USE `gimnasiobd`;
DROP procedure IF EXISTS `consultarInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarInstructor` ()
BEGIN
Select I.idInstructor,U.NumeroIdentificacion, I.nombreInstructor, I.apellidoInstructor, I.correoInstructor, I.telefonoInstructor 
FROM USUARIOS AS U 
JOIN INSTRUCTORES AS I 
ON U.idUsuario=I.idUsuarioFK Where U.estadoUsuario='1';
END$$

DELIMITER ;
/*Procedimiento para registrar instructores*/
USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarInstructor`  (in nombrei VARCHAR(35), 
                                        in appellidoi VARCHAR(35),
                                        in correoi VARCHAR(100),
                                        in telefonoi VARCHAR(11),
                                        in estadoi INT)
BEGIN
INSERT INTO INSTRUCTORES SELECT MAX(idInstructor) + 1,nombrei,appellidoi,correoi,telefonoi,estadoi,(SELECT MAX(idUsuario)FROM USUARIOS)FROM INSTRUCTORES;
END$$

DELIMITER ;
/*Procedimiento para registrar ususario*/
USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarUsuario`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarUsuario`  (in numeroiu VARCHAR(35), 
										in passwordu VARCHAR(35), 
                                        in estadou INT(1),
                                        in rolu INT(1),
                                        in iddocu INT(1))
BEGIN
INSERT INTO USUARIOS SELECT MAX(idUsuario) + 1,numeroiu,passwordu,estadou,rolu,iddocu FROM USUARIOS;
END$$

DELIMITER ;




DROP procedure IF EXISTS `consultarUsuario`;
USE `gimnasiobd`$$
DELIMITER $$
CREATE PROCEDURE `consultarUsuario` ()
BEGIN

SELECT MAX(idUsuario) AS idUsuario FROM USUARIOS;
END$$

DELIMITER ;
USE `gimnasiobd`;
DROP procedure IF EXISTS `actualizarCliente`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `actualizarCliente` (IN id int(10), IN correo VARCHAR(50), IN tel VARCHAR(12))
BEGIN
update clientes set correoCliente=correo , telefonoCliente = tel where idCliente = id;  
END$$

DELIMITER ;
DELIMITER ;
USE `gimnasiobd`;
DROP procedure IF EXISTS `actualizarInstructor`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `actualizarInstructor` (IN id int(10), IN correo VARCHAR(50), IN tel VARCHAR(12))
BEGIN
update instructores set correoInstructor=correo , telefonoInstructor = tel where idInstructor = id;  
END$$

DELIMITER ;
USE `gimnasiobd`;
DROP procedure IF EXISTS `validar_login2`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `validar_login2` (IN NumiD Varchar(15))
BEGIN
Select idRolFK From USUARIOS where NumeroIdentificacion= Numid;
END$$

DELIMITER ;
/* Consulta Ficha antropométrica*/
SELECT U.NumeroIdentificacion,C.nombreCliente,C.apellidoCliente,FA.fechaFicha, PC.nombreParteCuerpo,FM.medida,FA.idFicha,S.valorSuscripcion FROM clientes C JOIN ficha_antropometrica FA JOIN usuarios U Join parte_del_cuerpo PC Join ficha_medida FM JOIN suscripciones S ON C.idUsuarioFK=U.idUsuario and FM.idParteDelCuerpoFK=PC.idParteDelCuerpo 
and FM.idFichaFK=FA.idFicha and FA.idSuscripcionFK=S.idSuscripcion and S.idClienteFK = C.idCliente WHERE U.NumeroIdentificacion =  '1004529460';
/*Consulta Metodologia*/
SELECT U.NumeroIdentificacion, C.nombreCliente, C.apellidoCliente,C.correoCliente, C.telefonoCliente, M.nombreMetodologia FROM Clientes C JOIN usuarios U JOIN metodologia m JOIN suscripciones s on C.idUsuarioFK = U.idUsuario and s.idClienteFK = C.idCliente and s.idMetodologiaFK=m.idMetodologia order by nombreMetodologia asc;
/*Consultar angenda*/
SELECT c.nombreCliente,u.NumeroIdentificacion,h.horaInicioHorario, h.horaFinHorario, h.semanaDiaHorario from horarios AS h JOIN programacion_horario AS ph JOIN programacion AS p JOIN usuarios AS u JOIN clientes AS c on ph.idHorarioFK = h.idHorario and p.idUsuarioFK = u.idUsuario and ph.idProgramacionFK=p.idProgramacion and c.idUsuarioFK=u.idUsuario where u.NumeroIdentificacion='1001299203';
CALL consultarUsuario();
describe clientes;


DELIMITER ;
USE `gimnasiobd`;
DROP procedure IF EXISTS `consultarSuscripcion`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarSuscripcion` (IN NumiD Varchar(15))
BEGIN
SELECT c.nombreCliente, m.nombreMetodologia, s.valorSuscripcion, s.fechaSuscripcion FROM  Suscripciones AS s
JOIN Metodologia AS m ON s.idMetodologiaFK=m.idMetodologia
JOIN Usuarios AS u 
JOIN Clientes AS c ON u.idUsuario=c.idUsuarioFK AND s.idClienteFK=c.idCliente
WHERE u.numeroIdentificacion=NumiD;
END$$
DELIMITER ;

call consultarSuscripcion('1001299203');


USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarProgramacion`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarProgramacion` (IN fechaInicioPro DATE,
												IN fechaFinPro DATE,
                                                IN numid VARCHAR(25))
BEGIN
	INSERT INTO PROGRAMACION SELECT MAX(idProgramacion) + 1 ,fechaInicioPro,fechaFinPro, 
    (SELECT idUsuario FROM USUARIOS WHERE numeroIdentificacion=numid) 
    FROM PROGRAMACION;
END$$

DELIMITER ;
call registrarProgramacion('2021-08-04','2021-09-10','1001299203');


Select * From Programacion where idUsuarioFK= '5';

USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarAsistencia`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarAsistencia` (IN fechaAsistencia DATE)
BEGIN
	INSERT INTO ASISTENCIAS SELECT MAX(idAsistencia) + 1 ,fechaAsistencia 
    FROM ASISTENCIAS;
END$$

DELIMITER ;


call registrarAsistencia('2021-04-08');

select * from asistencias;
USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarAsistenciaCliente`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarAsistenciaCliente` (IN horaIngreso DATETIME,
												IN horaSalida DATETIME)
BEGIN
	INSERT INTO PROGRAMACION_ASISTENCIA SELECT MAX(idProgramacion) ,(SELECT MAX(idAsistencia) FROM ASISTENCIAS),horaIngreso, horaSalida
    FROM PROGRAMACION;
END$$

DELIMITER ;

call registrarAsistenciaCliente('2021-04-08 05:00','2021-09-10 08:00');

select * from programacion_asistencia;

USE `gimnasiobd`;
DROP procedure IF EXISTS `consultarAsistenciaCliente`;

DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `consultarAsistenciaCliente` ()
BEGIN
SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', pa.horaIngreso, pa.horaSalida 
FROM Programacion AS p 
JOIN Usuarios AS  u 
JOIN Clientes AS c 
JOIN Asistencias AS a
JOIN programacion_asistencia AS pa ON pa.idAsistenciaFK=a.idAsistencia AND u.idUsuario=p.idUsuarioFK 
AND u.idUsuario=c.idUsuarioFK  AND pa.idProgramacionFK=p.idProgramacion;
END$$
DELIMITER ;

CALL consultarAsistenciaCliente();
USE `gimnasiobd`;
DROP procedure IF EXISTS `registrarSerie`;
DELIMITER $$
USE `gimnasiobd`$$
CREATE PROCEDURE `registrarSerie` (IN nombreSerieEjercicio varchar(60), IN descripcionSerieEjercicio text)
BEGIN
INSERT INTO serie_de_ejercicio SELECT MAX(idSerie) + 1,nombreSerieEjercicio,descripcionSerieEjercicio FROM serie_de_ejercicio;
END$$
DELIMITER ;

Create view Aforos
AS
Select idHorario,horaInicioHorario, horaFinHorario, aforoHorario from horarios ;



/*CALL registrarAsistenciaCliente('2021-08-10 06:00','2021-08-10 22:00');*/

select * from programacion union select * from programacion_asistencia;

/*INSERT INTO ASISTENCIAS (SELECT MAX(idAsistencia) + 1,fechaAsistencia);
  SELECT MAX(idAsistencia) + 1,fechaAsistencia
  FROM ASISTENCIAS AS A LEFT JOIN PROGRAMACION_ASISTENCIA AS PA ON PA.idAsistenciaFK = A.idAsistencia;*/


SELECT c.nombreCliente, m.nombreMetodologia, s.valorSuscripcion, s.fechaSuscripcion FROM  Suscripciones AS s
JOIN Metodologia AS m ON s.idMetodologiaFK=m.idMetodologia
JOIN Usuarios AS u 
JOIN Clientes AS c ON u.idUsuario=c.idUsuarioFK AND s.idClienteFK=c.idCliente
WHERE u.numeroIdentificacion='1001299203';

SELECT * FROM programacion_asistencia; 
SELECT * FROM asistencias; 
SELECT * FROM programacion;
SELECT * FROM horarios;
SELECT * FROM usuarios;

SELECT  c.nombreCliente,u.NumeroIdentificacion,h.horaInicioHorario, h.horaFinHorario, h.semanaDiaHorario 
from horarios AS h 
JOIN programacion_horario AS ph 
JOIN programacion AS p 
JOIN usuarios AS u 
JOIN clientes AS c on ph.idHorarioFK = h.idHorario and p.idUsuarioFK = u.idUsuario 
and ph.idProgramacionFK=p.idProgramacion and c.idUsuarioFK=u.idUsuario 
where u.NumeroIdentificacion='10203040';

SELECT u.numeroIdentificacion, CONCAT(c.nombreCliente ,' ', c.apellidoCliente) AS 'Nombre Completo', pa.horaIngreso, pa.horaSalida 
FROM Programacion AS p 
JOIN Usuarios AS  u 
JOIN Clientes AS c 
JOIN Asistencias AS a
JOIN programacion_asistencia AS pa ON pa.idAsistenciaFK=a.idAsistencia AND u.idUsuario=p.idUsuarioFK 
AND u.idUsuario=c.idUsuarioFK AND pa.idProgramacionFK=p.idProgramacion
WHERE u.NumeroIdentificacion='1001299203';


/*INSERT INTO ASISTENCIAS SELECT MAX(idAsistencia) + 1,fechaA FROM ASISTENCIAS;*/

/*Consulta mostrar aforos para actualizar*/
SELECT * FROM Aforos WHERE idHorario = 1;
/*Consulta mostrar aforos en tabla*/
Select * From Aforos;
/*Consultar serie*/
SELECT U.NumeroIdentificacion, S.nombreSerieEjercicio,S.descripcionSerieEjercicio,I.nombreInstructor From serie_de_ejercicio S JOIN USUARIOS U JOIN INSTRUCTORES I ON I.idUsuarioFK=U.idUsuario where U.NumeroIDentificacion='26794281';
/*Consulta editar aforos*/
/*Update Horarios set aforoHorario="6" where idHorario = "1";*/
 

