/*REGISTROS*/
USE gimnasiobd;

/*TABLA ROL*/
INSERT INTO rol (idRol,nombreRol) VALUES (1,'Recepcionista');
INSERT INTO rol (idRol,nombreRol) VALUES (2,'Instructor');
INSERT INTO rol (idRol,nombreRol) VALUES (3,'Cliente');

SELECT * FROM rol;

/*TABLA TIPO IDENTIFICACION*/
INSERT INTO tipo_identificacion (idTipoDocumento,nombreDocumento) VALUES (1,'Cedula de cuidadania');
INSERT INTO tipo_identificacion (idTipoDocumento,nombreDocumento) VALUES (2,'Tarjeta de identidad');
INSERT INTO tipo_identificacion (idTipoDocumento,nombreDocumento) VALUES (3,'Cedula extranjera');
INSERT INTO tipo_identificacion (idTipoDocumento,nombreDocumento) VALUES (4,'Pasaporte');

SELECT * FROM tipo_identificacion;

/*TABLA USUARIOS*/
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (1,1032480756,'1345ElmejorGrupo',1,1,1);
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (2,1000713178,'andrea12334',1,2,1);
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (3,1004529469,'anaMaria890',1,2,2);
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK)
VALUES (4,1000213057,'Mariaaa789',1,3,2);
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (5,1001299203,'260421Paulita',1,3,1);
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (6,1028481864,'pruebaValentina234',1,3,4);
INSERT INTO usuarios (idUsuario,numeroIdentificacion,passwordUsuario,estadoUsuario,idRolFK,idTipoDocumentoFK) 
VALUES (7,1000216054,'danielamora1',1,3,1);

SELECT * FROM usuarios;

/*TABLA INSTRUCTORES*/
INSERT INTO instructores (idInstructor,nombreInstructor,apellidoInstructor,correoInstructor,telefonoInstructor,estadoInstructor,idUsuarioFK)
VALUES (1,'Andrea','Sastoque','andreas@gmail.com',321348028,1,2);
INSERT INTO instructores (idInstructor,nombreInstructor,apellidoInstructor,correoInstructor,telefonoInstructor,estadoInstructor,idUsuarioFK)
VALUES (2,'Ana Maria','Valencia','anaMaria@gmail.com',300535096,1,3);

SELECT * FROM instructores;

/*TABLA CLIENTES*/
INSERT INTO clientes (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (1,'Maria','Castillo','2002-05-12','mariacastillo@hotmail.com',302455687,1,4);
INSERT INTO clientes (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (2,'Paula Catalina','Delgado','2002-10-27','kimikta45@gmail.com',3123617109,1,5);
INSERT INTO clientes (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (3,'Valentina','Prueba','2000-02-25','prueba@hotmail.com',300230005,1,6);
INSERT INTO clientes (idCliente,nombreCliente,apellidoCliente,fechaNacimientoCliente,correoCliente,telefonoCliente,estadoCliente,idUsuarioFK)
VALUES (4,'Daniela','Mora','2002-12-10','danielamora20022@gmail.com',3053714069,1,7);

SELECT * FROM clientes;

/*TABLA PROGRAMACION*/
INSERT INTO programacion (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (1,'2021-06-28','2021-07-28',2);
INSERT INTO programacion (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (2,'2021-09-05','2021-10-05',3);
INSERT INTO programacion (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (3,'2021-09-21','2021-10-21',4);
INSERT INTO programacion (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (4,'2021-09-16','2021-10-16',5);
INSERT INTO programacion (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (5,'2021-09-09','2021-10-09',6);
INSERT INTO programacion (idProgramacion,fechaInicioPro,fechaFinPro,idUsuarioFK)
VALUES (6,'2021-09-27','2021-10-27',7);

SELECT * FROM programacion;

/*TABLA ASISTENCIAS*/
INSERT INTO asistencias (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (1,'2021-06-28T08:00:00','2021-06-28T09:10:00',1);
INSERT INTO asistencias (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (6,'2021-06-29T08:30:40','2021-06-29T09:15:00',1);
INSERT INTO asistencias (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (2,'2021-09-05T14:00:00','2021-09-05T15:00:00',2);
INSERT INTO asistencias (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (3,'2021-09-30T12:30:00','2021-09-30T13:50:00',3);
INSERT INTO asistencias (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (4,'2021-10-05T10:45:00','2021-10-05T13:00:00',4);
INSERT INTO asistencias (idAsistencia,fechaHoraIngreso,fechaHoraSalida,idProgramacionFK)
VALUES (5,'2021-09-29T11:45:50','2021-09-29T13:10:00',5);

SELECT * FROM asistencias;

/*TABLA SUSCRIPCIONES*/
INSERT INTO suscripciones (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (1,39900,'2021-09-29',1,'Ninguna',3);
INSERT INTO suscripciones (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (2,79800,'2021-09-28',1,'Ninguna',2);
INSERT INTO suscripciones (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (3,39900,'2021-07-10',1,'Ninguna',1);
INSERT INTO suscripciones (idSuscripcion,valorSuscripcion,fechaSuscripcion,estadoSuscripcion,descripcionNovedad,idClienteFK)
VALUES (4,39900,'2021-09-05',1,'Ninguna',4);

SELECT * FROM suscripciones;

/*TABLA METODOLOGIA*/
INSERT INTO metodologia (idMetodologia,nombreMetodologia)
VALUES (1,'Disminuir de peso');
INSERT INTO metodologia (idMetodologia,nombreMetodologia)
VALUES (2,'Aumentar masa muscular');
INSERT INTO metodologia (idMetodologia,nombreMetodologia)
VALUES (3,'2X1');

SELECT * FROM metodologia;

/*TABLA SUSCRIPCION_METODOLOGIA*/
INSERT INTO suscripcion_metodologia (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (1,3,'2021-09-29','2021-10-29');
INSERT INTO suscripcion_metodologia (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (2,1,'2021-09-28','2021-10-28');
INSERT INTO suscripcion_metodologia (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (3,2,'2021-07-10','2021-09-30');
INSERT INTO suscripcion_metodologia (idSuscripcionFK,idMetodologiaFK,fechaMetodologiaInicio,fechaMetodologiaFin)
VALUES (4,3,'2021-09-05','2021-10-05');


SELECT * FROM suscripcion_metodologia;

/*TABLA PAGOS*/
INSERT INTO pagos (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (1,'2021-09-29',200000,'Pago la mitad de su suscripcion, debe $19.950','Pago 1.jpeg',1);
INSERT INTO pagos (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (2,'2021-09-28',180000,'Pago por dos meses (septiembre y octubre)','Pago 2.jpeg',2);
INSERT INTO pagos (idPago,fechaPago,valorPago,descripcionPago,urlSoportePago,idSuscripcionFK)
VALUES (3,'2021-09-05',250000,'Pago por un mes (septiembre)','Pago 3.jpeg',4);

SELECT * FROM pagos;

/*TABLA FICHA_ANTROPOMETRICA*/
INSERT INTO ficha_antropometrica (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (1,'2021-09-29',1.65,56,'Sin novedad',1);
INSERT INTO ficha_antropometrica (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (2,'2021-09-28',1.81,74.3,'Tiene lesion rodilla derecha',2);
INSERT INTO ficha_antropometrica (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (3,'2021-07-10',1.54,55,'Sin novedad',3);
INSERT INTO ficha_antropometrica (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (4,'2021-09-05',1.79,85,'Sin novedad',4);
INSERT INTO ficha_antropometrica (idFicha,fechaFicha,EstaturaCliente,pesoCliente,descripcionFicha,idSuscripcionFK)
VALUES (5,'2021-09-10',1.54,52,'A disminuido su grasa corporal en comparacion con su ultima ficha',3);

SELECT * FROM ficha_antropometrica;

/*TABLA PARTE_DEL_CUERPO*/
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (1,'Craneo');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (2,'Bicep Derecho');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (3,'Bicep Izquierdo');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (4,'Muslo Derecho');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (5,'Muslo Izquierdo');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (6,'Cintura');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (7,'Brazo Derecho');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (8,'Brazo Izquierdo');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (9,'Pierna Derecha');
INSERT INTO parte_del_cuerpo (idParteDelCuerpo,nombreParteCuerpo)
VALUES (10,'Pierna Izquierda');

SELECT * FROM parte_del_cuerpo;

/*TABLA PARTE_CUERPO_EJERCICIO*/
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,1,65.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,2,65.5);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,3,65);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,4,40);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,5,74.6);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,6,26.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,7,85.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,8,65);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,9,66);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (1,10,65.2);
/*1000216054*/
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (4,1,14);
/*1000213057 con la ficha id 3*/
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,1,65.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,2,65.5);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,3,65);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,4,40);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,5,74.6);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,6,26.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,7,85.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,8,65);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,9,66);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (3,10,65.2);
/*1000213057 con la ficha id 5*/
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,1,65.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,2,65.5);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,3,65);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,4,40);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,5,74.6);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,6,26.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,7,85.2);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,8,65);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,9,66);
INSERT INTO parte_cuerpo_ejercicio (idFichaFK,idParteDelCuerpoFK,medida)
VALUES (5,10,65.2);

SELECT * FROM parte_cuerpo_ejercicio;

/*TABLA EJERCICIOS*/
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (1,1,'Movimientos circulares');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (2,2,'Press');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (3,3,'Curl con mancuernas');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (4,4,'Lagartijas');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (5,5,'Sentadilla');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (7,7,'Curl de un solo brazo dr');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (8,8,'Curl de un solo brazo izq');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (9,9,'Press a una pierna dr');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (10,10,'Press a una pierna dr');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (11,11,'Low plank');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (12,12,'Press de hombro dr');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (13,13,'Press de hombros dr');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (14,14,'Inchworms');
INSERT INTO ejercicios (idEjercicio,idParteDelCuerpoFK,nombreEjercicio)
VALUES (15,15,'Pesas');

SELECT * FROM ejercicios;

/*TABLA SERIE_DE_EJERCICIO*/
INSERT INTO serie_de_ejercicio (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (1,'Disminuir de peso principiante','Realizar los ejercicios propuestos',4,12,'Ejercicio 1.jpeg',1);
INSERT INTO serie_de_ejercicio (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (2,'Disminuir de peso intermedio','Realizar los ejercicios propuestos',5,10,'Ejercicio 2.jpeg',1);
INSERT INTO serie_de_ejercicio (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (3,'Aumentar masa muscular principante','Realizar los ejercicios propuestos',4,15,'Ejercicio 3.jpeg',2);
INSERT INTO serie_de_ejercicio (idSerie,nombreSerieEjercicio,descripcionSerieEjercicio,repeticionEjercicio,secuenciaEjercicio,urlImagen,idMetodologiaFK)
VALUES (4,'Dos objetivos','Realizar los ejercicios propuestos',6,8,'Ejercicio 4.jpeg',3);

SELECT * FROM serie_de_ejercicio;

/*TABLA TB_SERIES_EJERCICIOS*/
INSERT INTO tb_series_ejercicios (idEjercicioFK,idSerieFK)
VALUES (1,1);
INSERT INTO tb_series_ejercicios (idEjercicioFK,idSerieFK)
VALUES (2,1);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (3,1);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (4,1);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (5,1);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (1,2);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (3,2);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (4,2);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (5,2);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (10,3);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (9,3);
INSERT INTO tb_series_ejercicios(idEjercicioFK,idSerieFK)
VALUES (7,3);

SELECT * FROM tb_series_ejercicios;