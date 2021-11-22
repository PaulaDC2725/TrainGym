CREATE DATABASE gimnasiobd;
USE gimnasiobd;
/*DROP DATABASE gimnasiobd;*/

/*CREACION TABLA ROL*/
CREATE TABLE rol(
	idRol INT(12) NOT NULL,
	nombreRol VARCHAR(20) NOT NULL
);

/*CREACION TABLA TIPO IDENTIFICACION*/
CREATE TABLE tipo_identificacion(
	idTipoDocumento INT(12) NOT NULL,
	nombreDocumento VARCHAR(25) NOT NULL
);

/*CREACION TABLA USUARIOS*/
CREATE TABLE usuarios(
	idUsuario INT(12) NOT NULL,
	NumeroIdentificacion VARCHAR(12) NOT NULL ,
	passwordUsuario VARCHAR(20) NOT NULL,
	estadoUsuario INT NOT NULL,
	idRolFK INT(12) NOT NULL,
	idTipoDocumentoFK INT(12) NOT NULL
);

/*CREACION TABLA INSTRUCTORES*/
CREATE TABLE instructores(
	idInstructor INT(12) NOT NULL ,
    nombreInstructor VARCHAR(35) NOT NULL,
    apellidoInstructor VARCHAR(35) NOT NULL,
    correoInstructor VARCHAR(100) NOT NULL,
    telefonoInstructor VARCHAR(11) NOT NULL,
    estadoInstructor INT NOT NULL, 
    idUsuarioFK INT(12) NOT NULL 
);

/*CREACION TABLA CLIENTES*/
CREATE TABLE clientes(
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
CREATE TABLE programacion(
	idProgramacion INT(12) NOT NULL ,
	fechaInicioPro DATE NOT NULL,
    fechaFinPro DATE NOT NULL,
    idUsuarioFK INT(12) NOT NULL
);

/*CREACION TABLA ASISTENCIA*/
CREATE TABLE asistencias(
	idAsistencia INT(12) NOT NULL,
    fechaHoraIngreso DATETIME NOT NULL,
    fechaHoraSalida DATETIME NOT NULL,
    idProgramacionFK INT(12) NOT NULL
);

/*CREACION TABLA METODOLOGIA*/
CREATE TABLE metodologia(
	idMetodologia INT(12) NOT NULL,
    nombreMetodologia VARCHAR(50) NOT NULL
);

/*CREACION TABLA SUSCRIPCION_METODOLOGIA*/
CREATE TABLE suscripcion_metodologia(
	idSuscripcionFK INT(12) NOT NULL,
    idMetodologiaFK INT(12) NOT NULL,
    fechaMetodologiaInicio DATE NOT NULL,
    fechaMetodologiaFin DATE NOT NULL
);

/*CREACION TABLA SUSCRIPCIONES*/
CREATE TABLE suscripciones(
	idSuscripcion INT(12) NOT NULL,
    valorSuscripcion FLOAT NOT NULL,
    fechaSuscripcion DATE NOT NULL,
    estadoSuscripcion INT NOT NULL,
    descripcionNovedad VARCHAR(500),
    idClienteFK INT(12) NOT NULL
);

/*CREACION TABLA PAGOS*/
CREATE TABLE pagos(
	idPago INT(12) NOT NULL,
    fechaPago DATE NOT NULL,
    valorPago FLOAT NOT NULL,
    descripcionPago VARCHAR(200) NOT NULL,
    urlSoportePago VARCHAR(500) NOT NULL,
    idSuscripcionFK INT(12) NOT NULL
);

/*CREACION TABLA FICHA ANTROPOMETRICA*/
CREATE TABLE ficha_antropometrica(
	idFicha INT(12) NOT NULL,
    fechaFicha DATE NOT NULL,
    EstaturaCliente FLOAT NOT NULL,
    pesoCliente FLOAT NOT NULL,
    descripcionFicha VARCHAR(200) NOT NULL,
    idSuscripcionFK INT(12) NOT NULL
);

/*CREACION TABLA PARTES DEL CUERPO*/
CREATE TABLE parte_del_cuerpo(
	idParteDelCuerpo INT(12) NOT NULL,
    nombreParteCuerpo VARCHAR(35) NOT NULL
);


/*CREACION TABLA PARTE_CUERPO_EJERCICIO*/
CREATE TABLE parte_cuerpo_ejercicio(
	idFichaFK INT(12) NOT NULL,
    idParteDelCuerpoFK INT(12) NOT NULL,
    medida FLOAT NOT NULL
);

/*CREACION TABLA EJERCICIOS*/
CREATE TABLE ejercicios(
	idEjercicio INT(12) NOT NULL,
    idParteDelCuerpoFK INT(12) NOT NULL,
    nombreEjercicio VARCHAR(50) NOT NULL,
    urlImagen VARCHAR(500) NOT NULL
);

/*CREACION TABLA SERIES DE EJERCICIO*/
CREATE TABLE serie_de_ejercicio(
	idSerie INT(12) NOT NULL,
    nombreSerieEjercicio VARCHAR(50) NOT NULL,
    descripcionSerieEjercicio VARCHAR(300) NOT NULL,
	repeticionEjercicio INT NOT NULL,
    secuenciaEjercicio INT NOT NULL,
    urlImagen VARCHAR(500) NOT NULL,
    idMetodologiaFK INT NOT NULL
);

/*CREACION TABLA DE SERIES_EJERCICIOS*/
CREATE TABLE tb_series_ejercicios(
	idEjercicioFK INT(12) NOT NULL,
    idSerieFK INT(12) NOT NULL
);

/*--------------------------------INDICES----------------------------*/

/*INDICES DE TABLA USUARIOS*/
ALTER TABLE usuarios		
ADD PRIMARY KEY (idUsuario),
ADD  KEY  FK_idTipoDocumentoFK_usuarios_idx (idTipoDocumentoFK),
ADD  KEY  FK_idRolFK_usuarios_idx (idRolFK);

/*INDICES DE TABLA ROL*/
ALTER TABLE rol
ADD PRIMARY KEY (idRol);

/*INDICES DE TABLA TIPO IDENTIFICACION*/
ALTER TABLE tipo_identificacion
ADD PRIMARY KEY (idTipoDocumento);

/*INDICES DE TABLA INSTRUCTORES*/
ALTER TABLE instructores
ADD PRIMARY KEY (idInstructor),
ADD  KEY  FK_idUsuarioFK_instructores_idx (idUsuarioFK);

/*INDICES DE TABLA CLIENTES*/
ALTER TABLE clientes
ADD PRIMARY KEY (idCliente),
ADD  KEY  FK_idUsuarioFK_clientes_idx (idUsuarioFK);

/*INDICES DE TABLA PROGRAMACION*/
ALTER TABLE programacion
ADD PRIMARY KEY (idProgramacion),
ADD  KEY  FK_idUsuarioFK_programacion_idx (idUsuarioFK);

/*INDICES DE TABLA ASISTENCIAS*/
ALTER TABLE asistencias
ADD PRIMARY KEY (idAsistencia),
ADD  KEY  FK_idProgramacionFK_asistencias_idx (idProgramacionFK);

/*INDICES DE TABLA METODOLOGIA*/
ALTER TABLE metodologia
ADD PRIMARY KEY (idMetodologia);

/*INDICES SUSCRIPCION_METODOLOGIA*/
ALTER TABLE suscripcion_metodologia
ADD PRIMARY KEY (idMetodologiaFK,idSuscripcionFK),
ADD  KEY  FK_idMetodologiaFK_suscripcion_metodologia_idx (idMetodologiaFK),
ADD  KEY  FK_idSuscripcionFK_suscripcion_metodologia_idx (idSuscripcionFK);

/*INDICES DE TABLA SUSCRIPCIONES*/
ALTER TABLE suscripciones
ADD PRIMARY KEY (idSuscripcion),
ADD  KEY  FK_idClienteFK_suscripciones_idx (idClienteFK);

/*INDICES DE TABLA PAGOS*/
ALTER TABLE pagos
ADD PRIMARY KEY (idPago),
ADD  KEY  FK_idSuscripcionFK_pagos_idx (idSuscripcionFK);

/*INDICES DE TABLA FICHA_ANTROPOMETRICA*/
ALTER TABLE ficha_antropometrica
ADD PRIMARY KEY (idFicha),
ADD  KEY  FK_idSuscripcionFK_ficha_antropometrica_idx (idSuscripcionFK);

/*INDICES DE TABLA PARTES DEL CUERPO*/
ALTER TABLE parte_del_cuerpo
ADD PRIMARY KEY (idParteDelCuerpo);

/*INDICES DE PARTE_CUERPO_EJERCICIO*/
ALTER TABLE parte_cuerpo_ejercicio
ADD PRIMARY KEY (idFichaFK,idParteDelCuerpoFK),
ADD  KEY  FK_idFichaFK_parte_cuerpo_ejercicio_idx (idFichaFK),
ADD  KEY  FK_idParteDelCuerpoFK_parte_cuerpo_ejercicio_idx (idParteDelCuerpoFK);

/*INDICES DE TABLA EJERCICIOS*/
ALTER TABLE ejercicios
ADD PRIMARY KEY (idEjercicio);

/*INDICES DE TABLA SERIE_DE_EJERCICIO*/
ALTER TABLE serie_de_ejercicio
ADD PRIMARY KEY (idSerie),
ADD  KEY  FK_idMetodologiaFK_serie_de_ejercicio_idx (idMetodologiaFK);

/*INDICES DE TABLA TB_SERIES_EJERCICIOS*/
ALTER TABLE tb_series_ejercicios
ADD PRIMARY KEY (idSerieFK,idEjercicioFK),
ADD  KEY  FK_idSerieFK_tb_series_ejercicios_idx (idSerieFK),
ADD  KEY  FK_idEjercicioFK_tb_series_ejercicios_idx (idEjercicioFK);

/*-------------------------------------------FILTROS----------------------------*/

/*FILTROS PARA LA TABLA USUARIOS*/
ALTER TABLE usuarios
ADD CONSTRAINT FK_idTipoDocumentoFK_usuarios FOREIGN KEY (idTipoDocumentoFK)
REFERENCES tipo_identificacion (idTipoDocumento) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idRolFK_usuarios FOREIGN KEY (idRolFK)
REFERENCES rol (idRol) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA INSTRUCTORES*/
ALTER TABLE instructores
ADD CONSTRAINT FK_idUsuarioFK_instructores FOREIGN KEY (idUsuarioFK)
REFERENCES usuarios (idUsuario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PROGRAMACION*/
ALTER TABLE programacion
ADD CONSTRAINT FK_idUsuarioFK_programacion FOREIGN KEY (idUsuarioFK)
REFERENCES usuarios (idUsuario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA CLIENTES*/
ALTER TABLE clientes
ADD CONSTRAINT FK_idUsuarioFK_clientes FOREIGN KEY (idUsuarioFK)
REFERENCES usuarios (idUsuario) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA ASISTENCIAS*/
ALTER TABLE asistencias
ADD CONSTRAINT FK_idProgramacionFK_asistencias FOREIGN KEY (idProgramacionFK)
REFERENCES programacion (idProgramacion) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA SUSCRIPCIONES*/
ALTER TABLE suscripciones
ADD CONSTRAINT FK_idClienteFK_suscripciones FOREIGN KEY (idClienteFK)
REFERENCES clientes (idCliente) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA SUSCRIPCION_METODOLOGIA*/
ALTER TABLE suscripcion_metodologia
ADD CONSTRAINT FK_idMetodologiaFK_suscripcion_metodologia FOREIGN KEY(idMetodologiaFK)
REFERENCES metodologia (idMetodologia) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idSuscripcionFK_suscripcion_metodologia FOREIGN KEY(idSuscripcionFK)
REFERENCES suscripciones (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PAGOS*/
ALTER TABLE pagos
ADD CONSTRAINT FK_idSuscripcionFK_pagos FOREIGN KEY (idSuscripcionFK)
REFERENCES suscripciones (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA FICHA_ANTROPOMETRICA*/
ALTER TABLE ficha_antropometrica
ADD CONSTRAINT FK_idSuscripcionFK_ficha_antropometrica FOREIGN KEY (idSuscripcionFK)
REFERENCES suscripciones (idSuscripcion) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA PARTE_CUERPO_EJERCICIO*/
ALTER TABLE parte_cuerpo_ejercicio
ADD CONSTRAINT FK_idFichaFK_parte_cuerpo_ejercicio FOREIGN KEY (idFichaFK)
REFERENCES ficha_antropometrica (idFicha) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idParteDelCuerpoFK_parte_cuerpo_ejercicio FOREIGN KEY (idParteDelCuerpoFK)
REFERENCES parte_del_cuerpo (idParteDelCuerpo) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA LA TABLA TB_SERIES_EJERCICIOS*/
ALTER TABLE tb_series_ejercicios
ADD CONSTRAINT FK_idSerieFK_tb_series_ejercicios FOREIGN KEY (idSerieFK)
REFERENCES serie_de_ejercicio (idSerie) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT FK_idEjercicioFK_tb_series_ejercicios FOREIGN KEY (idEjercicioFK)
REFERENCES ejercicios (idEjercicio) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*FILTROS PARA TABLA SERIE DE EJERCICIO*/
ALTER TABLE serie_de_ejercicio
ADD CONSTRAINT FK_idMetodologiaFK_serie_de_ejercicio FOREIGN KEY (idMetodologiaFK)
REFERENCES metodologia (idMetodologia) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*-----------------------------VALORES UNICOS----------------------------------------------*/

/*VALORES UNICOS PARA LA TABLA INSTRUCTORES*/
CREATE UNIQUE INDEX IND_correoInstructor ON instructores (correoInstructor);
CREATE UNIQUE INDEX IND_telefonoInstructor ON instructores (telefonoInstructor);
CREATE UNIQUE INDEX IND_idInstructor ON instructores (idInstructor);
CREATE UNIQUE INDEX IND_idUsuarioFK ON instructores (idUsuarioFK);

/*VALORES UNICOS PARA LA TABLA CLIENTES*/
CREATE UNIQUE INDEX IND_correoCliente ON clientes (correoCliente);
CREATE UNIQUE INDEX IND_telefonoCliente ON clientes (telefonoCliente);
CREATE UNIQUE INDEX IND_idCliente ON clientes (idCliente);
CREATE UNIQUE INDEX IND_idUsuarioFK ON clientes (idUsuarioFK);

/*VALORES UNICOS PARA LA TABLA USUARIOS*/
CREATE UNIQUE INDEX IND_NumeroIdentificacion ON usuarios (NumeroIdentificacion);

