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
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacioFK)
VALUES (1,'2021-06-28 08:00','2021-06-28 09:10',1);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacioFK)
VALUES (2,'2021-07-04 14:00','2021-07-04 15:00',2);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacioFK)
VALUES (3,'2021-07-05 12:30','2021-07-05 13:50',3);
INSERT INTO ASISTENCIAS (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacioFK)
VALUES (4,'2002-09-12 10:45','2002-09-12 13:00',4);

SELECT * FROM ASISTENCIAS;

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
