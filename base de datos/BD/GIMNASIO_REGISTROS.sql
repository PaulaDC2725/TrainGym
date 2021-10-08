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
VALUES (1,1032480756,'1345ElmejorGrupo',1,1,1);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (2,1000713178,'andrea12334',1,2,1);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (3,1004529469,'anaMaria890',1,2,2);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK)
VALUES (4,1000213057,'Mariaaa789',1,3,2);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (5,1001299203,'260421Paulita',1,3,1);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (6,1028481864,'pruebaValentina234',1,3,4);
INSERT INTO USUARIOS (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (7,1000216054,'danielamora1',1,3,1);

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
VALUES (2,'Paula Catalina','Delgado','2002-10-27','kimikta45@gmail.com',3123617109,1,5);
INSERT INTO CLIENTES (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (3,'Valentina','Prueba','2000-02-25','prueba@hotmail.com',300230005,1,6);
INSERT INTO CLIENTES (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (4,'Daniela','Mora','2002-12-10','danielamora20022@gmail.com',3053714069,1,7);

SELECT * FROM CLIENTES;

/*TABLA PROGRAMACION*/
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (1,'2021-06-28','2021-07-28',2);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (2,'2021-09-05','2021-10-05',3);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (3,'2021-09-21','2021-10-21',4);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (4,'2021-09-16','2021-10-16',5);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (5,'2021-09-09','2021-10-09',6);
INSERT INTO PROGRAMACION (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (6,'2021-09-27','2021-10-27',7);

SELECT * FROM PROGRAMACION;

/*TABLA ASISTENCIAS*/
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (1,'2021-06-28T08:00:00','2021-06-28T09:10:00',1);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (6,'2021-06-29T08:30:40','2021-06-29T09:15:00',1);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (2,'2021-09-05T14:00:00','2021-09-05T15:00:00',2);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (3,'2021-09-30T12:30:00','2021-09-30T13:50:00',3);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (4,'2021-10-05T10:45:00','2021-10-05T13:00:00',4);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (5,'2021-09-29T11:45:50','2021-09-29T13:10:00',5);

SELECT * FROM ASISTENCIAS;

/*TABLA SUSCRIPCIONES*/
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (1,39.900,'2021-09-29',1,'Ninguna',3);
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (2,79.800,'2021-09-28',1,'Ninguna',2);
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (3,39.900,'2021-07-10',1,'Ninguna',1);
INSERT INTO SUSCRIPCIONES (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (4,39.900,'2021-09-05',1,'Ninguna',4);

SELECT * FROM SUSCRIPCIONES;

/*TABLA METODOLOGIA*/
INSERT INTO METODOLOGIA (idMetodologia,nombreMetodologia)
VALUES (1,'Disminuir de peso');
INSERT INTO METODOLOGIA (idMetodologia,nombreMetodologia)
VALUES (2,'Aumentar masa muscular');
INSERT INTO METODOLOGIA (idMetodologia,nombreMetodologia)
VALUES (3,'2X1');

SELECT * FROM METODOLOGIA;

/*TABLA SUSCRIPCION_METODOLOGIA*/
INSERT INTO SUSCRIPCION_METODOLOGIA (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (1,3,'2021-09-29','2021-10-29');
INSERT INTO SUSCRIPCION_METODOLOGIA (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (2,1,'2021-09-28','2021-10-28');
INSERT INTO SUSCRIPCION_METODOLOGIA (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (3,2,'2021-07-10','2021-09-30');
INSERT INTO SUSCRIPCION_METODOLOGIA (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (4,3,'2021-09-05','2021-10-05');
INSERT INTO SUSCRIPCION_METODOLOGIA (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (4,2,'2021-10-05','2021-11-04');

SELECT * FROM SUSCRIPCION_METODOLOGIA;

/*TABLA PAGOS*/
INSERT INTO PAGOS (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (1,'2021-09-29',200000,'Pago la mitad de su suscripcion, debe $19.950','2021-02-15 12_00_33-Window.png',1);
INSERT INTO PAGOS (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (2,'2021-09-28',180000,'Pago por dos meses (septiembre y octubre)','2021-02-15 12_00_33-Window.png',2);
INSERT INTO PAGOS (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (3,'2021-09-05',250000,'Pago por un mes (septiembre)','2021-02-15 12_00_33-Window.png',4);

SELECT * FROM PAGOS;

/*TABLA FICHA_ANTROPOMETRICA*/
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (1,'2021-09-29',1.65,56,'Sin novedad',1);
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (2,'2021-09-28',1.81,74.3,'Tiene lesion rodilla derecha',2);
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (3,'2021-07-10',1.54,55,'Sin novedad',3);
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (4,'2021-09-05',1.79,85,'Sin novedad',4);
INSERT INTO FICHA_ANTROPOMETRICA (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (5,'2021-09-10',1.54,52,'A disminuido su grasa corporal en comparacion con su ultima ficha',3);

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
VALUES (11,'Espalda');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (12,'Brazo Derecho');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (13,'Brazo Izquierdo');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (14,'Pierna Derecha');
INSERT INTO PARTE_DEL_CUERPO (idParteDelCuerpo,nombreParteCuerpo)
VALUES (15,'Pierna Izquierda');

SELECT * FROM PARTE_DEL_CUERPO;

/*TABLA PARTE_CUERPO_EJERCICIO*/
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,1,65.2);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,2,65.5);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,3,65);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,4,40);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,5,74.6);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,6,26.2);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,7,85.2);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,8,65);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,9,66);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,10,65.2);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,11,81);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,12,20);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,13,43);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,14,65.2);
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,15,65.2);
/*1000216054*/
INSERT INTO PARTE_CUERPO_EJERCICIO (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (4,1,14);

SELECT * FROM PARTE_CUERPO_EJERCICIO;

/*TABLA EJERCICIOS*/
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (1,1,'Movimientos circulares');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (2,2,'Press');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (3,3,'Curl con mancuernas');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (4,4,'Lagartijas');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (5,5,'Sentadilla');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (7,7,'Curl de un solo brazo dr');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (8,8,'Curl de un solo brazo izq');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (9,9,'Press a una pierna dr');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (10,10,'Press a una pierna dr');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (11,11,'Low plank');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (12,12,'Press de hombro dr');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (13,13,'Press de hombros dr');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (14,14,'Inchworms');
INSERT INTO EJERCICIOS (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (15,15,'Pesas');

SELECT * FROM EJERCICIOS;

/*TABLA SERIE_DE_EJERCICIO*/
INSERT INTO SERIE_DE_EJERCICIO (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (1,'Disminuir de peso principiante','Realizar los ejercicios propuestos',4,12,'2021-02-15 12_00_33-Window.png',1);
INSERT INTO SERIE_DE_EJERCICIO (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (2,'Disminuir de peso intermedio','Realizar los ejercicios propuestos',5,10,'2021-02-15 12_00_33-Window.png',1);
INSERT INTO SERIE_DE_EJERCICIO (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (3,'Aumentar masa muscular principante','Realizar los ejercicios propuestos',4,15,'2021-02-15 12_00_33-Window.png',2);
INSERT INTO SERIE_DE_EJERCICIO (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (4,'Dos objetivos','Realizar los ejercicios propuestos',6,8,'2021-02-15 12_00_33-Window.png',3);

SELECT * FROM SERIE_DE_EJERCICIO;

/*TABLA TB_SERIES_EJERCICIOS*/
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (1,1);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (2,1);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (3,1);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (4,1);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (5,1);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (1,2);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (3,2);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (4,2);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (5,2);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (10,3);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (12,3);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (9,3);
INSERT INTO TB_SERIES_EJERCICIOS(idEjercicioFK,idSerieFK)
VALUES (7,3);

SELECT * FROM TB_SERIES_EJERCICIOS;