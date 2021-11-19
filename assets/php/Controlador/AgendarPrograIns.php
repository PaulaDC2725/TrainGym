<?php
 error_reporting(E_ERROR | E_PARSE);
 include '../modelo/class.conexion.php';
 session_start();
 $numDoc = $_SESSION["NumeroIdentificacion"];
 $rolRec = $_SESSION["rolRecepcionista"];
 if ($rolRec != 1 ) {
    header('location: ../../../Views/Error.php');
     
 } 
require_once('../modelo/class.consulta.asistencias.php');

if(isset($_GET['NumeroIdentificacion'])){
$ConsultasAsistencias = new ConsultasAsistencias();
$numid=$_GET['NumeroIdentificacion'];
$fechaInicioPro=$_POST['ingresopro'];
$fechaFinPro=$_POST['salidapro'];

$ConsultasAsistencias->registrarProgramacion($fechaInicioPro,$fechaFinPro,$numid); 
header('location: ../../../views/inicioRecepcionista.php');
}

