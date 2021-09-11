<?php
require_once('../Modelo/class.conexion.php');
require_once('../Modelo/class.consulta.asistencias.php');

if(isset($_GET['NumeroIdentificacion'])){
$ConsultasAsistencias = new ConsultasAsistencias();
$numid=$_GET['NumeroIdentificacion'];
$fechaInicioPro=$_POST['ingresopro'];
$fechaFinPro=$_POST['salidapro'];

$ConsultasAsistencias->registrarProgramacion($fechaInicioPro,$fechaFinPro,$numid); 
header('location: ../../../views/inicioRecepcionista.php');
}

